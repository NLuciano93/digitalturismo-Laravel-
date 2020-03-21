$('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
}); 

var nombre = document.querySelector('input[name=nombre]');
var detalle = document.querySelector('input[name=detalle]');
var descripcion = document.querySelector('textarea[name=descripcion]');
var precio = document.querySelector('input[name=precio]');
var promocion = document.querySelector('input[name=promocion]');
var provincia = document.querySelector('select[name=provincia]');
var imagenPerfil = document.querySelector('input[name=imagenPerfil]');
var elFormulario= document.querySelector('.fomularioDestinoAlta');
var allowedExtensions = /(.jpg|.jpeg|.png|.svg|.bmp|.webp)$/i;
var errores= 0;


elFormulario.addEventListener('submit', function (event) {
    event.preventDefault();
    var mensajes ={
                            nombre: false,
                            detalle: false,
                            descripcion: false,
                            precio: false,
                            promocion: false,
                            provincia: false
                            
                };

    for (let mensaje in mensajes) {
        let spanError = document.querySelector('#span-'+mensaje);
        spanError.innerText = '';
    }
    nombre.classList.remove('is-invalid');
    detalle.classList.remove('is-invalid');
    descripcion.classList.remove('is-invalid');
    precio.classList.remove('is-invalid');
    promocion.classList.remove('is-invalid');
    provincia.classList.remove('is-invalid');
    

    
    
            if (nombre.value.trim().length < 3) {
                mensajes.nombre = "El campo nombre debe contener 3 caracteres mínimo";
            }
            if (detalle.value.trim().length < 10 ) {
                mensajes.detalle = "El campo detalle debe contener 10 caracteres mínimo"
            }
            if (descripcion.value.trim().length < 10) {
                mensajes.descripcion = "El campo descripción debe contener 10 caracteres mínimo";
            }
            if (precio.value == '') {
                mensajes.precio = "El campo precio es obligatorio";
            }else if(isNaN(precio.value) || precio.value <0){
                mensajes.precio = "El campo precio debe ser un número";
            }
            if (promocion.value < 0 || promocion.value >100 || promocion.value =='' || isNaN(promocion.value)) {
                mensajes.promocion = "El campo promocion debe estar entre 0 y 100";
            }
            if (provincia.value < 0 || provincia.value == '') {
                mensajes.provincia = "Elija una provincia correcta";
            }
           

            for (let mensaje in mensajes) {
                let input = document.querySelector('#'+mensaje);
                console.log(input);
                if (mensajes[mensaje]) {
                    input.classList.add('is-invalid');
                    let spanError = document.querySelector('#span-'+mensaje);
                    console.log(spanError);
                    spanError.innerText = mensajes[mensaje];
                    errores++;
                }
            }

            if (!errores) {
                elFormulario.submit(); 
                        }


})