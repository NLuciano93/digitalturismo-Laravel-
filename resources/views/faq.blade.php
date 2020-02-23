@extends('layout.plantilla')

@section('css')
    {{ asset('css/style-faqs.css') }}
@endsection

@section('principal')
<div class="container-fluid">
    <div class="row">
    <div class="col-12 p-0 m-0">
    
    
    <!-- Seccion Preguntas-->
    <div class="container-fluid contenedor-faq">
    
    
    <div class="container"> 
    <div class="titulo">
    <h2>Preguntas Frecuentes</h2>
    </div>
    <section>
    <div class="accordion md-accordion accordion-4" id="accordionEx2" role="tablist" aria-multiselectable="true">
    
            <div class="card">
          
              <div class="card-header z-depth-1 teal lighten-4" role="tab" id="heading10">
                <a data-toggle="collapse" data-parent="#accordionEx2" href="#collapse10" aria-expanded="true"
                  aria-controls="collapse10">
                  <h4 class="mb-0 black-text text-center font-weight-bold text-uppercase">
                    Que es DigitalTurismo
                  </h4>
                </a>
              </div>
                    <div id="collapse10" class="collapse show" role="tabpanel" aria-labelledby="heading10"
                data-parent="#accordionEx2">
                <div class="card-body rgba-teal-strong white-text">
                  <p>Digital turismo: es una agencia de turismo que opera 100% online. Los usuarios podrán contratar hoteles, autos,viajes, paquetes turísticos, cruceros; y elegir entre más de 100 líneas aéreas y entre más de 10.000 mil opciones en hoteles, casas y departamentos en alquiler, aprovechando las ofertas. Las personas que deseen contratar cualquiera de esos servicios de Digital Turismo, deberán generarse un usuario en el sitio web; podrán consultar el estado de la compra en “Digital Turismo” y una vez efectuado el viaje, podrán publicar en comentarios la experiencia de su viaje. Junto con Banco Galincia lanzaron "DIGITALQUIERO". Es una propuesta en la que permiten canjear puntos por pasajes; reservar hoteles en cualquier ciudad del mundo o acceder a paquetes turísticos. Además hay una opción de DTurismo Pymes con propuestas exclusivas.</p>
          
                </div>
              </div>
            </div>      
            <div class="card">
              <div class="card-header z-depth-1 teal lighten-3" role="tab" id="heading11">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapse11"
                  aria-expanded="false" aria-controls="collapse11">
                  <h4 class="mb-0 black-text text-center font-weight-bold text-uppercase">
                    Como Comprar
                  </h4>
                </a>
              </div>
          
              <div id="collapse11" class="collapse" role="tabpanel" aria-labelledby="heading11"
                data-parent="#accordionEx2">
                <div class="card-body rgba-teal-strong white-text">
                  <p>Te detallamos los pasos que deberás seguir para realizar tu compra: <br>
    
                    Hacé click sobre todos los productos que desees para conocer sus características . <br>
                    Subí al carrito los productos que te interesen comprar. <br>
                    Para iniciar el pago ingresá tu DNI y Clave Web. <br>
                    Completá los campos del Proceso de Pago. <br>
                    Podrás revisar tu pedido antes de confirmarlo y luego de aceptar los Términos y Condiciones hacé click en "Pagar". <br>
                    Las compras efectuadas se imputarán en tu Resumen de cuenta y podrás ver el comprobante de compra ingresando en la opción Mi Cuenta > Pedidos recientes. <br>
                                
                                ¿Qué tarjetas de crédito aceptan? <br>
                    Aceptamos Visa, Master Card y American Express y te ofrecemos múltiples opciones al momento de pagar tu reservación..</p>
                </div>
              </div>
            </div>
                  <div class="card">
                    <div class="card-header z-depth-1 teal lighten-2" role="tab" id="heading12">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapse12"
                  aria-expanded="false" aria-controls="collapse12">
                  <h4 class="mb-0 black-text text-center font-weight-bold text-uppercase">
                      Condiciones de uso
                </h4>
                </a>
              </div>
                    <div id="collapse12" class="collapse" role="tabpanel" aria-labelledby="heading12"
                data-parent="#accordionEx2">
                <div class="card-body rgba-teal-strong white-text">
                  <p>CONDICIONES ESPECIFICAS DE LAS OFERTAS CON PAGO ONLINE Estas ofertas son de pago online, se cobra el 100% del importe de la reserva en el momento de formalización de la misma. Cualquier modificación en una reserva presente, pasada o futura ya confirmada supondrá unos gastos de gestión de $400. La modificación deberá ser comunicada por e-mail al agente correspondiente, con 3 días laborables de antelación a la fecha de entrada. Se entenderá también como modificación la reducción en el número de habitaciones o de noches o el cambio de nombre del cliente y la modificación de las fechas del viaje. Asimismo, las cancelaciones supondrán unos gastos de gestión de ATRÁPALO de 1.300$. En cuanto a los gastos de cancelación por parte del proveedor de los servicios habrá que consultarlos en cualquier caso, aunque por norma general en las compras de "Escapadas en coche" las cancelaciones notificadas hasta 48 horas antes de la fecha de entrada no tendrán gastos por parte del hotel ( excepto condiciones de cancelación especiales indicadas en cada oferta ). Después de estas 48 horas, el hotel podrá facturar una noche tanto en concepto de cancelación de reserva como de no presentación ( no show ).
                    </p>
                </div>
              </div>
            </div>
                  <div class="card">
                    <div class="card-header z-depth-1 teal lighten-1" role="tab" id="heading13">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapse13"
                  aria-expanded="true" aria-controls="collapse13">
                  <h4 class="mb-0 black-text text-center font-weight-bold text-uppercase">
                    Problemas con la cuenta
                  </h4>
                </a>
              </div>
                    <div id="collapse13" class="collapse" role="tabpanel" aria-labelledby="heading13"
                data-parent="#accordionEx2">
                <div class="card-body rgba-teal-strong white-text">
                  <p>¿Cómo hago para cambiar mi email en la cuenta de Digital Turismo? Visita la página de tu Cuenta para editar tu información personal.
                        ¿Cómo desvinculo la cuenta de mi cuenta de Facebook? ¿Ya no quieres ser nuestro amigo? Es fácil: inicia sesión en Digital Turismo, haz clic en el enlace "Iniciar sesión" y escribe el mismo email que usas para iniciar sesión en Facebook. Luego, en vez de añadir más información, haz clic en "Restablecer contraseña". Entonces podrás crear una nueva contraseña y desvincular tu cuenta de Facebook.
                        ¿Cómo restablezco mi contraseña? En el inicio de sesión, haz clic en el enlace para restablecer la contraseña.</p>
                </div>
              </div>
            </div>
                  <div class="card">
                    <div class="card-header z-depth-1 teal" role="tab" id="heading14">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapse14"
                  aria-expanded="false" aria-controls="collapse14">
                  <h4 class="mb-0 black-text text-center font-weight-bold text-uppercase">
                    Contacto
                  </h4>
                </a>
              </div>
                    <div id="collapse14" class="collapse" role="tabpanel" aria-labelledby="heading14"
                data-parent="#accordionEx2">
                <div class="card-body rgba-teal-strong white-text">
                <div class="contenedor-contacto container-fluid ">
                  <div class="row">
                <div class="col-12 p-0 col-md-7">
                    <i class="fas fa-phone-alt"> Telefono</i> <h2> (011) 5263-7400</h2> 
                    <i class="far fa-clock">Horario de atencion </i> <h2>Lun a Vier 09:00hs a 17:30hs <br>
                      Sab 09:00 a 13:00</h2>
                      <i class="far fa-envelope">Mail</i> <h2>info@digitalturismo.com.ar</h2>
                </div>
                <div class="col-12 p-0 col-md-5 contenedor-mapa">
                  <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.3313139805828!2d-58.38386198468745!3d-34.62106686592359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb28ea8781cb%3A0x950feb519009506e!2sLima%201111%2C%20C1073AAW%20CABA!5e0!3m2!1ses-419!2sar!4v1573611372545!5m2!1ses-419!2sar" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                </div>
    
                </div>
              </div>
            </div>
          </div>
          </section>
        </div>
     </div>
     </div>
    
     </div>
    </div>
    </div>
@endsection

        
