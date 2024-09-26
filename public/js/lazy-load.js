document.addEventListener('DOMContentLoaded', function() {
    function lazyload() {
        const lazyLoadElements = document.querySelectorAll('.lazy');

        const elementObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const lazyElement = entry.target;

                    // Show the actual content and hide the skeleton loader
                    const card = lazyElement.querySelector('.card');

                    if (card) {
                        card.style.display = 'block';
                    }

                    lazyElement.classList.remove('lazy');
                    elementObserver.unobserve(lazyElement);
                }
            });
        });

        lazyLoadElements.forEach((lazyElement) => {
            elementObserver.observe(lazyElement);
        });
    }

    lazyload(); // Initialize lazy loading
});
