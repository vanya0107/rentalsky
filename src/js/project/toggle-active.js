const allBtnToggle = document.querySelectorAll('[data-toggle-active]');
if(allBtnToggle) {
    allBtnToggle.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            btn.classList.toggle('active');
            const dataBtn = btn.dataset.toggleActive;
            const target = btn.closest(dataBtn) || btn.parentNode.querySelector(dataBtn) || document.querySelector(dataBtn);
            if(target) target.classList.toggle('active');
        });
    });
}