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