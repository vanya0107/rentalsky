document.addEventListener("DOMContentLoaded", function() {
    //=include project/toggle-active.js
    //=include project/sliders.js
    //=include project/popup.js
    //=include project/mail.js
    //=include project/popup-img.js
    //=include project/animation-number.js
    //=include project/other.js

    function loadSwiper(callback) {
        if (window.__swiperLoaded) {
            callback();
            return;
        }
        const swiperScript = document.createElement('script');
        swiperScript.src = '/js/swiper.js';
        swiperScript.async = true;
        swiperScript.onload = function() {
            window.__swiperLoaded = true;
            callback();
        };
        document.head.appendChild(swiperScript);
    }

    if (document.body.classList.contains('page-product')) {
        loadSwiper(function() {
            initSliders();
        });
    } else {
        const swiperTarget = document.querySelector('[data-slider]');
        if (swiperTarget) {
            const swiperObserver = new IntersectionObserver(function(entries) {
                if (entries[0].isIntersecting) {
                    loadSwiper(function() {
                        initSliders();
                    });
                    swiperObserver.disconnect();
                }
            });
            swiperObserver.observe(swiperTarget);
        }
    }
});
