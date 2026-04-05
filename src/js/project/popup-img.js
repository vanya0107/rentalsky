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