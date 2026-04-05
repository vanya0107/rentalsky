function scrollHeader() {
    const header = document.querySelector('.rs-header');
    const scrollClass = 'scrollable';
    if(window.scrollY > 50) {
        header.classList.add(scrollClass);
    } else {
        header.classList.remove(scrollClass);
    }
}
window.addEventListener('scroll', scrollHeader);