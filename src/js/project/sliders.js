function initSliders() {
    const allSliders = document.querySelectorAll('[data-slider]');
    if(allSliders.length) {
        const viewportWidth = window.innerWidth;
        const pendingTransitionSlides = [];

        allSliders.forEach(slider => {
            const sliderId = slider.dataset.slider;
            if(sliderId === 'catalog') {
                if(viewportWidth > 1024) {
                    new Swiper(slider, {
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
                    slider.querySelectorAll('.swiper-slide').forEach(slide => {
                        pendingTransitionSlides.push(slide);
                    });
                }
            }
            if(sliderId === 'reviews') {
                new Swiper(slider, {
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
                new Swiper(slider, {
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

        if(pendingTransitionSlides.length) {
            requestAnimationFrame(() => {
                pendingTransitionSlides.forEach(slide => slide.classList.add('transition'));
            });
        }
    }
}
