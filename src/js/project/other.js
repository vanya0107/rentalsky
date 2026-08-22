const header = document.querySelector('.rs-header');
const scrollClass = 'scrollable';
let scrollTicking = false;

function scrollHeader() {
    if (window.scrollY > 50) {
        header.classList.add(scrollClass);
    } else {
        header.classList.remove(scrollClass);
    }
    scrollTicking = false;
}

window.addEventListener('scroll', function() {
    if (!scrollTicking) {
        requestAnimationFrame(scrollHeader);
        scrollTicking = true;
    }
}, { passive: true });