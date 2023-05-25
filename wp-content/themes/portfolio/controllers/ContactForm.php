<?php

namespace Portfolio;

class ContactForm
{
    protected array $config;
    protected array $data;
    protected string $referrer;
    public function __construct(array $config, array $data)
    {
        $this->config = $config;
        $this->data = $data;
        $this->referrer = wp_get_referer();
    }
    public function validate(array $rules): static
    {
        if(! $this->verifyNonce()) {
            die('Invalid request.');
        }

        if($errors = $this->applyValidationRules($rules)) {
            dwp_session_flash($this->config['nonce_identifier'] . '_errors', $errors);
            wp_safe_redirect($this->referrer);
            exit;
        }

        return $this;
    }

    protected function verifyNonce(): bool
    {
        $nonce = $this->data[$this->config['nonce_field']] ?? null;
        $identifier = $this->config['nonce_identifier'];

        return (wp_verify_nonce($nonce, $identifier) === 1);
    }

    protected function applyValidationRules(array $rules): array
    {
        $errors = [];

        foreach($rules as $field => $checks) {
            $value = $this->data[$field] ?? null;
            $errors[$field] = $this->applyFieldValidation($field, $value, $checks);
        }

        return array_filter($errors);
    }

    protected function applyFieldValidation(string $field, mixed $value, array $rules): ?string
    {
        foreach ($rules as $rule) {
            $check = 'check' . ucfirst($rule);
            $errorMessage = 'get' . ucfirst($rule) . 'ErrorMessage';

            $error = $this->$check($field, $value)
                ? false
                : $this->$errorMessage($field);

            if($error) return $error;
        }

        return null;
    }

    protected function checkRequired(string $field, mixed $value): bool
    {
        return ($value || $value === 0);
    }

    protected function getRequiredErrorMessage(string $field): string
    {
        return 'Le champ ' . $field . ' est requis.';
    }

    protected function checkEmail(string $field, mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function getEmailErrorMessage(string $field): string
    {
        return 'Veuillez fournir une adresse mail valide.';
    }

    public function sanitize(array $methods): static
    {
        foreach ($methods as $field => $method) {
            $method = 'sanitize_' . $method;
            $this->data[$field] = $method($this->data[$field] ?? '');
        }

        return $this;
    }
    public function save(callable $title, callable $content): static
    {
        wp_insert_post([
            'post_type' => 'message',
            'post_status' => 'publish',
            'post_title' => $title($this->data),
            'post_content' => $content($this->data),
        ]);

        return $this;
    }
    public function send(callable $title, callable $content): static
    {
        wp_mail(get_bloginfo('admin_email'), $title($this->data), $content($this->data));

        return $this;
    }

    public function feedback(): void
    {
        dwp_session_flash($this->config['nonce_identifier'] . '_feedback', true);
        wp_safe_redirect($this->referrer);
        exit;
    }
}