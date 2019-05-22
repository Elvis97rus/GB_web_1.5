"use strict";

//остановка отправки формы или другого процесса если требуется
document.querySelector('button')
    .addEventListener('click',
        function(event){event.preventDefault();
        validate();
    });

// const form = document.querySelector('.inputForm');
// const inputName = document.querySelector('.inputName');
// const inputTel = document.querySelector('.inputTel');
// const inputPass = document.querySelector('.inputPassword');
// const inputPassConfirm = document.querySelector('.inputPasswordConfirm');
let isCorrect = 0;
const formControl = document.querySelectorAll('.form-control');
const errTxtName = 'Имя от 1 до 50 символов';
const errTxtTel = 'номер должен содержать 11 цифр';
const errTxtPass = 'пароль должен быть длиной от 5 до 50 символов';
const errTxtPassConf = 'введенные пароли не совпадают';
let passV ='';
function validate() {
    let elemCount = 0;
    for (const elem of formControl) {
        switch (elem.name) {
            case 'name':
                isValideName(elem, errTxtName);
                break;
            case 'phone':
                isValideTel(elem,errTxtTel);
                break;
            case 'password':
                isValidePass(elem,errTxtPass);
                break;
            case 'password_repeat':
                isValidePassConf(elem,errTxtPassConf);
                break;
        }
        elemCount++;
    }
    if (isCorrect === (formControl.length)){
          formControl.submit();
    }
}
    function postErr(elem, errTxt) {
    let errMsg = document.createElement("span");
    errMsg.innerHTML = errTxt;
    elem.parentElement.appendChild(errMsg);
    elem.style.border = '1px solid red';
}

    function isValideName(elem, errTxt) {
        if (elem.value.length > 0 && elem.value.length <= 50){
         elem.style.border = '1px solid green';
         isCorrect++;
        } else{
            postErr(elem, errTxt);
        }
    }

    function isValideTel(elem, errTxt) {
        if (elem.value !== 'undefined' && Number.isInteger(elem.value)) {
            if (elem.length === 11) {
         elem.style.border = '1px solid green';
         isCorrect++;
        } else {
            postErr(elem, errTxt);
        }
       }
    }

    function isValidePass(elem, errTxt) {
        if (elem.value.length >= 5 && elem.value.length <= 50) {
            elem.style.border = '1px solid green';
            isCorrect++;
            passV = elem.value;
        } else {
            postErr(elem, errTxt);
        }
    }

    function isValidePassConf(elem, errTxt) {
        if (elem.value === passV){
         elem.style.border = '1px solid green';
         isCorrect++;
        } else{
            postErr(elem, errTxt);
        }
    }



    //
    // if (inputName.value.length > 0 && inputName.value.length <= 50) {
    //     inputName.style.border = '1px solid green';
    //     isCorrect++;
    // } else {
    //    document.querySelector('.errInputName').textContent = 'Имя от 1 до 50 символов';
    //     inputName.style.border = '1px solid red';
    // }
    //
    // if(inputTel.value!=='undefined') {
    //     if (inputTel.value.length === 11 && Number.isInteger(inputTel.value)) {
    //         inputTel.style.border = '1px solid green';
    //         isCorrect++;
    //     } else {
    //         document.querySelector('.errInputTel').textContent = 'номер должен содержать 11 цифр';
    //         inputTel.style.border = '1px solid red';
    //     }
    // }
    // if (inputPass.value.length >= 5 && inputPass.value.length <= 50) {
    //     inputPass.style.border = '1px solid green';
    //     isCorrect++;
    // } else {
    //     document.querySelector('.errInputPassword').textContent = 'пароль должен быть длиной от 5 до 50 символов';
    //     inputPass.style.border = '1px solid red';
    // }
    //
    // if (inputPassConfirm.isEqualNode(inputPass)||inputPassConfirm.value===inputPass.value) {
    //     inputPassConfirm.style.border = '1px solid green';
    //     isCorrect++;
    // } else {
    //     document.querySelector('.errInputPasswordConfirm').textContent = 'введенные пароли не совпадают';
    //     inputPassConfirm.style.border = '1px solid red';
    // }
    //
    // if (isCorrect === (form.length - 1)){
    //   form.submit();
    // }