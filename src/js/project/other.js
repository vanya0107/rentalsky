const header = document.querySelector('.rs-header');
const scrollClass = 'scrollable';
let scrollTicking = false;

function scrollHeader() {
    const isScrolled = window.scrollY > 50;
    const wasScrolled = header.classList.contains(scrollClass);
    if (isScrolled === wasScrolled) {
        scrollTicking = false;
        return;
    }
    if (isScrolled) {
        header.classList.add(scrollClass);
    } else {
        header.classList.remove(scrollClass);
        window.scrollTo(0, 0);
    }
    scrollTicking = false;
}

window.addEventListener('scroll', function() {
    if (!scrollTicking) {
        requestAnimationFrame(scrollHeader);
        scrollTicking = true;
    }
}, { passive: true });