const allAnimationNumbersWrap = document.querySelectorAll('[data-anim-num]');

// Функция анимации
function animateNumber(el) {
    const target = +el.textContent;
    const duration = 1000;
    const startTime = performance.now();

    function animate(time) {
        const progress = Math.min((time - startTime) / duration, 1);
        el.textContent = Math.floor(progress * target);
        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            el.textContent = target;
        }
    }

    requestAnimationFrame(animate);
}

// Наблюдатель за вхождением в область видимости
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const wrap = entry.target;
            const animationNumbers = wrap.querySelectorAll('span');

            animationNumbers.forEach(animationNumber => {
                // Чтобы не запускалось повторно при скролле вверх/вниз
                if (!animationNumber.dataset.animated) {
                    animationNumber.dataset.animated = 'true';
                    animateNumber(animationNumber);
                }
            });

            // Можно отключить наблюдение, если анимация однократная
            observer.unobserve(wrap);
        }
    });
}, {
    threshold: 0.3 // запуск, когда 30% блока видно на экране
});

// Подключаем наблюдение
allAnimationNumbersWrap.forEach(wrap => observer.observe(wrap));
