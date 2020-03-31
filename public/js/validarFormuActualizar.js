$('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
});

 let formulario = document.getElementById("formuActualizarUser");
 console.log(formulario);
 
 let email = document.getElementById("email");
 let nombre = document.getElementById("nombre");
 let avatar = document.getElementById("avatar");
let errores= 0;
const regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/;
const allowedExtensions = /(.jpg|.jpeg|.png|.svg|.bmp|.webp)$/i;

formulario.addEventListener('submit', function (e) {
  e.preventDefault();
  email.classList.remove('is-invalid');
  nombre.classList.remove('is-invalid');
  avatar.classList.remove('is-invalid');
  let mensajes = {
    nombre: false,
    email: false,
    avatar:false
  }

  let losAlert = document.querySelectorAll('.alert');

  if (losAlert.length) {
    for (let elemento of losAlert) {
       elemento.remove();
    }                    
  }
 
  
  if (nombre.value.trim().length <2) {
      mensajes.nombre = "El campo nombre tiene que tener al menos dos caracteres";
  }
  if (!regexMail.test(email.value)) {
    mensajes.email = "El valor ingresado no corresponde a un mail";
  }
  if (avatar.value) {
    if (!allowedExtensions.exec(avatar.value)) {
    mensajes.avatar = "La imagen debe tener extensión .jpg o .jpeg o .png o .svg o .bmp o .webp";
    }
  }
  for (let mensaje in mensajes) {
    let input = document.getElementById(mensaje);
    if (mensajes[mensaje]) {
      let elementoPadre = input.parentElement;
      console.log(elementoPadre);
     input.classList.add('is-invalid');
      let alert = document.createElement('div');
      alert.classList.add('alert', 'alert-danger');
      alert.innerText= mensajes[mensaje];
      elementoPadre.appendChild(alert);
      errores++; 
    
    }

  }
 if (!errores) {
    formulario.submit();
  } 
})