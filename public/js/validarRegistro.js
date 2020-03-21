$('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
});
let formulario = document.querySelector('.formulario');
let name = document.querySelector('input[name=name]');
let email = document.querySelector('input[name=email]');
let password = document.querySelector('input[name=password]');
let pass_confirm = document.querySelector('input[name=password_confirmation]');
let avatar = document.querySelector('input[name=avatar]');
var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/;
var allowedExtensions = /(.jpg|.jpeg|.png|.svg|.bmp|.webp)$/i;
var errores = 0;



formulario.addEventListener('submit', function (event) {
    event.preventDefault();
    name.classList.remove('border', 'border-danger');
    email.classList.remove('border', 'border-danger');
    password.classList.remove('border', 'border-danger');
    avatar.classList.remove('border', 'border-danger');
    

    var mensajes ={
        name: false,
        email: false,
        password: false,
        avatar: false
    }
    let losAlert = document.querySelectorAll('.alert');
        if (losAlert) {
            for (let elemento of losAlert) {
                elemento.remove();
            }
        }
    if (name.value.trim().length < 2) {
        mensajes.name = "El campo nombre tiene que tener al menos dos caracteres";

       }
    if (!regexMail.test(email.value)) {
        mensajes.email = "El valor ingresado no corresponde a un mail";
    }
    if (password.value.length < 8) {
        mensajes.password = "La contraseña debe tener al menos 8 caracteres";
    }else if(password.value != pass_confirm.value){
        mensajes.password= "Las contraseñas no coinciden";
    }
    if (avatar.value) {
        if (!allowedExtensions.exec(avatar.value)) {
        mensajes.avatar = "La imagen debe tener extensión .jpg o .jpeg o .png o .svg o .bmp o .webp";
        }
    }
    for (let mensaje in mensajes) {       
        let input = document.querySelector('#contenedor-'+mensaje);
       console.log(input);                   
        if (mensajes[mensaje]) {
            console.log(mensaje);                                        
            let elementoPadre = document.querySelector('#'+mensaje+'-group');
            input.classList.add('border', 'border-danger');
            console.log(elementoPadre);                       
            elementoPadre.insertAdjacentHTML('afterend', `<div class="alert alert-danger"><strong>${mensajes[mensaje]}</strong></div>`);
            errores++;                        
        }

    }
    if (!errores) {
       formulario.submit(); 
    }

})