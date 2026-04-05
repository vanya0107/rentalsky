const allBtnToggle = document.querySelectorAll('[data-toggle-active]');
if(allBtnToggle) {
    allBtnToggle.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            this.classList.toggle('active');
            const dataBtn = this.dataset.toggleActive;
            if(this.closest(dataBtn)) {
                this.closest(dataBtn).classList.toggle('active');
            } else if(this.parentNode.querySelector(dataBtn)) {
                this.parentNode.querySelector(dataBtn).classList.toggle('active');
            } else {
                document.querySelector(dataBtn).classList.toggle('active');
            }
        });
    });
}