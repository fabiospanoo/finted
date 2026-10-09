const carousel = document.getElementById('article-carousel');

if (carousel) {
    const counter = carousel.querySelector('#carousel-counter');
    const thumbs = document.querySelectorAll('.show-thumb-btn');
    const total = carousel.querySelectorAll('.carousel-item').length;

    carousel.addEventListener('slid.bs.carousel', (event) => {
        if (counter) {
            counter.textContent = `${event.to + 1}/${total}`;
        }

        thumbs.forEach((thumb, index) => {
            thumb.classList.toggle('active', index === event.to);
        });
    });
}
