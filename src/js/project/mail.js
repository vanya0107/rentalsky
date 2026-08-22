function loadRecaptcha() {
    if (window.__recaptchaLoaded) return;
    window.__recaptchaLoaded = true;
    var s = document.createElement('script');
    s.src = 'https://www.google.com/recaptcha/api.js';
    s.async = true;
    s.defer = true;
    document.head.appendChild(s);
}

(function() {
    var triggers = document.querySelectorAll('form input, form textarea, form, [data-popup]');
    triggers.forEach(function(el) {
        var evt = (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') ? 'focus' : 'click';
        el.addEventListener(evt, loadRecaptcha, { once: true, passive: true });
    });
})();

const allForm = document.querySelectorAll('[data-form]');
if(allForm.length > 0) {
    allForm.forEach(form => {
        form.addEventListener('submit', function(e) {
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
    fetch('./template/server/mail.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams(new FormData(form))
    }).then(function(response) {
        if (!response.ok) throw new Error('server error');
        var callbackPopup = document.querySelector('.rs-popup-form.callback');
        if(callbackPopup) {
            callbackPopup.classList.remove('active');
        }
        resetInput(form);
        var successPopup = document.querySelector('.rs-popup-form.success');
        if(successPopup) {
            successPopup.classList.add('active');
        }
    }).catch(function() {
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
