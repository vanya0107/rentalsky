document.addEventListener("DOMContentLoaded", function() {
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
    const allSliders = document.querySelectorAll('[data-slider]');
    if(allSliders.length) {
        allSliders.forEach(slider => {
            const sliderId = slider.dataset.slider;
            if(sliderId === 'catalog') {
                if(window.innerWidth > 1024)
                {
                    const swiper = new Swiper(slider, {
                        loop: true,
                        slidesPerView: 3,
                        spaceBetween: 60,
                        centeredSlides: true,
                        initialSlide: 1,
                        autoplay: {
                            delay: 4000,
                            pauseOnMouseEnter: true
                        },
                        speed: 2000
                    });
                    const allSlides = slider.querySelectorAll('.swiper-slide');
                    allSlides.forEach(slide => {
                        slide.classList.add('transition');
                    });
                }
            }
            if(sliderId === 'reviews') {
                const swiper = new Swiper(slider, {
                    autoplay: {
                        delay: 4000,
                        pauseOnMouseEnter: true
                    },
                    speed: 2000,
                    slidesPerView: 1,
                    spaceBetween: 36,
                    pagination: {
                        el: slider.querySelector('.swiper-pagination'),
                        type: 'bullets',
                        clickable: true
                    },
                    breakpoints: {
                        1024: {
                            slidesPerView: 2,
                            spaceBetween: 132
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 72,
                        }
                    }
                });
            }
            if(sliderId === 'avtovishka') {
                const sliderSmall = document.querySelector('.rs-avtovishka__slider-small');
                const swiper2 = new Swiper(sliderSmall, {
                    spaceBetween: 12,
                    slidesPerView: 3,
                    freeMode: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        640: {
                            spaceBetween: 18,
                            slidesPerView: 4
                        }
                    }
                });
                const swiper = new Swiper(slider, {
                    spaceBetween: 10,
                    navigation: {
                        nextEl: slider.querySelector('.swiper-button-next'),
                        prevEl: slider.querySelector('.swiper-button-prev'),
                    },
                    thumbs: {
                        swiper: swiper2,
                    },
                });
            }
        });
    }
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
    const allForm = $('[data-form]');
    if(allForm.length > 0) {
        allForm.each((i, form) => {
            $(form).on('submit', function (e) {
                e.preventDefault();
                let validate = false;
                const allInputForm = form.querySelectorAll('input');
                allInputForm.forEach(input => {
                    const inputWrap = input.parentElement;
                    inputWrap.classList.remove('active');
                    if(input.name === 'name') {
                        if(input.value.trim().length > 1) {
                            validate = true;
                        } else {
                            validate = false;
                            inputWrap.classList.add('active');
                        }
                    }
                    if(input.name === 'phone') {
                        if(input.value.trim().length > 11) {
                            validate = true;
                        } else {
                            validate = false;
                            inputWrap.classList.add('active');
                        }
                    }
                    if(input.name === 'email') {
                        if(validateEmail(input.value.trim())) {
                            validate = true;
                        } else {
                            validate = false;
                            inputWrap.classList.add('active');
                        }
                    }
                });
                if(validate) {
                    submitHandler(form);
                }
            });
        });
    }
    const validateEmail = email => {
        return String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
    };
    function submitHandler(form) {
        $.ajax({
            type: "POST",
            url: './template/server/mail.php',
            data: $(form).serialize()
        }).done(function (data) {
            var callbackPopup = document.querySelector('.rs-popup-form.callback');
            if(callbackPopup) {
                callbackPopup.classList.remove('active');
            }
            resetInput(form);
            var successPopup = document.querySelector('.rs-popup-form.success');
            if(successPopup) {
                successPopup.classList.add('active');
            }
        }).fail(function (jqXHR, text, error) {
            var errorPopup = document.querySelector('.rs-popup-form.error');
            if(errorPopup) {
                errorPopup.classList.add('active');
            }
        });
        document.body.classList.add('rs-hidden');
    }
    function resetInput(form) {
        const allInput = form.querySelectorAll('input');
        allInput.forEach(input => {
            input.value = '';
        });
    }
    const popupForImg = document.querySelector('[data-popup-img]');
    const allEventPopupImg = document.querySelectorAll('[data-popup-imgs]');
    if(allEventPopupImg) {
        allEventPopupImg.forEach(imgWrap => {
            const allImg = imgWrap.querySelectorAll('[data-popup-img-src]');
            allImg.forEach(img => {
                img.addEventListener('click', (e) => {
                    e.preventDefault();
                    document.body.classList.add('na-o-hidden');
                    popupForImg.classList.add('active');
    
                    let layoutImg = '';
                    allImg.forEach(img => {
                        layoutImg += `
                                <div class="rs-popup-img__slider_item swiper-slide">
                                    <img src="${img.src}" alt="">
                                </div>
                            `;
                    });
                    popupForImg.querySelector('.rs-popup-img__slider').innerHTML = `
                            <div class="swiper-wrapper">
                                ${layoutImg}
                            </div>
                        `;
    
                    let initialSlide;
                    allImg.forEach((img, index) => {
                        if(img.src === e.target.src) {
                            initialSlide = index;
                        }
                    });
                    window.sliderImg = new Swiper(popupForImg.querySelector(".rs-popup-img__slider"), {
                        initialSlide: initialSlide,
                        centeredSlides: true,
                        spaceBetween: 5,
                        navigation: {
                            prevEl: popupForImg.querySelector('.rs-popup-img__slider_arrow.prev'),
                            nextEl: popupForImg.querySelector('.rs-popup-img__slider_arrow.next')
                        }
                    });
                });
            });
        });
    }
    const allPopupImgClose = document.querySelectorAll('[data-popup-close]');
    if(allPopupImgClose) {
        allPopupImgClose.forEach(btn => {
            btn.addEventListener('click', e => {
                e.target.closest('[data-popup-img]').classList.remove('active');
                document.body.classList.remove('na-o-hidden');
                if(window.sliderImg) {
                    window.sliderImg.destroy();
                }
            });
        });
    }
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
});