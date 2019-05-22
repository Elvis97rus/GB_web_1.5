'use strict';

class Validator {

    inputFields = document.querySelectorAll('input');
    buttonField = document.querySelector('button');
    inputForm = document.getElementById('inputForm');

    regPatterns = {
        username: /^[a-z\d]{2,12}$/,
        telephone: /^\+7\((\d{3})\)(\d{3})-(\d{4})$/,
        email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/i,
        textarea: /^[a-z]{0,200}$/i,
    };

    constructor(){
        this.init();
    }

    validate(e,field,regex){
        if (regex.exec(field.value)){
            field.classList.add('valid');
            field.classList.remove('invalid');
        } else {
            field.classList.add('invalid');
            field.classList.remove('valid');
        }
    }

    init(){
        this.inputFields.forEach((field)=>{
            field.addEventListener('keyup', (e) =>{
                this.validate(e,e.target,this.regPatterns[`${e.target.attributes.name.value}`]);
            });
        });
        this.buttonField.addEventListener('click', (e)=> {
            this.inputFields.forEach((field) => {
                if (field.classList.contains('invalid')){
                    e.preventDefault();
                }
                else {
                    this.inputForm.submit();
                }
            })
        });

    }
}
let validator = new Validator();
