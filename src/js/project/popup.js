const allBtnPopup = document.querySelectorAll('[data-popup]');
if(allBtnPopup) {
    allBtnPopup.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const dataBtn = this.dataset.popup;
            document.body.classList.toggle('rs-hidden');
            if(this.closest(dataBtn)) {
                this.closest(dataBtn).classList.toggle('active');
            } else {
                document.querySelector(dataBtn).classList.toggle('active');
            }
        });
    });
}