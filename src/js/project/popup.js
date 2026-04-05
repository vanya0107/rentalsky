const allBtnPopup = document.querySelectorAll('[data-popup]');
if(allBtnPopup) {
    allBtnPopup.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            document.body.classList.toggle('rs-hidden');
            const dataBtn = btn.dataset.popup;
            const target = btn.closest(dataBtn) || document.querySelector(dataBtn);
            if(target) target.classList.toggle('active');
        });
    });
}