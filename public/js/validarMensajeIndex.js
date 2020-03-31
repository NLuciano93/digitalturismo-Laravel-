let formulario = document.getElementById('formuMensaje');
        let email = document.querySelector('input[name=email]');
        let comentario = document.getElementById('comentario');
        var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/;
        var errores= 0;

        formulario.addEventListener('submit', function(event){
          event.preventDefault();
          email.classList.remove('is-invalid');
          comentario.classList.remove('is-invalid');

          let mensajes={
            email: false,
            comentario: false
          }
          let losAlert = document.querySelectorAll('.alert');
          if(losAlert){
            for (let elemento of losAlert) {
                elemento.remove();
            }
          }

          if (!regexMail.test(email.value)) {
        mensajes.email = "El valor ingresado no corresponde a un mail";
          }
          if (comentario.value.length < 10) {
            mensajes.comentario= "El comentario debe ser por lo menos de 10 caracteres";
          }

          for (let mensaje in mensajes) {
           let input = document.getElementById(mensaje);
            if (mensajes[mensaje]) {
              let elementoPadre = document.querySelector('#'+mensaje+'-group');
              input.classList.add('is-invalid');
              elementoPadre.insertAdjacentHTML('afterend', `<div class="alert alert-danger"><strong>${mensajes[mensaje]}</strong></div>`);
              errores++;

            }
          }

          if (!errores) {
            formulario.submit();
          }
        })
