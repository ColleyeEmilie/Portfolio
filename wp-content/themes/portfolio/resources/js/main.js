class Portfolio_Controller {
    constructor() {
        this.body = document.body
    }

    static run() {
        document.body.classList.add('js-enabled');
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5,
        }

        let aTargets = document.querySelectorAll('.slide-in');
        let observer = new IntersectionObserver(callback, options);
        for (const target of aTargets) {
            observer.observe(target);
            target.addEventListener('load', (event) => {
            })
        }

        function callback(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }
    }
}

Portfolio_Controller.run();