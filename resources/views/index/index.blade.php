@extends('layout.plantilla')

 @section('css')
     {{ asset('css/style.css') }}
 @endsection

@section('principal')


@include('index.partialCarrusel')
  
  <!------------------ SECCION DE PRODUCTOS  ----------------- -->
  <div class="container-fluid ">
    <div class="row contenedor_seccion_productos">
      
      @include('index.partialPromociones')
      <!--------------------- DESTACADOS---------------------------->
      @include('index.partialDestacados')
               
      <!--------------------- DESTINOS---------------------------->
      @include('index.partialDestinosComunes')
      
    </div>
  </div>
  </div>
  
  
  
  
  <!--------------FOOTER------------------------------->
  
  <div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <footer>
              <div class="social d-flex flex-wrap">
                <div class="mision col-12 row justify-content-center">
                  <div class="col-sm-6">
                    <h2>Nuestra Misión</h2>
                    <h5 class="mt-3">DigitalTurismo busca fomentar el turismo en Argentina, para que crezca el sector, trayéndole a los usuarios los más lindos paisajes para visitar.</h5>
                </div>
                </div>
                
                <div id="contacto" class="contacto mt-5 col-md-6">
                  <h3>Contacto</h3>
                  <form action="/contacto" method="POST" id="formuMensaje">
                    @csrf
                    <div class="form-group" id="email-group">
                      <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter email..." name="email" value="{{old('email')}}">
                      
                    </div>
                    @error('email')
                      <div class="alert alert-danger"> <strong>{{$message}}</strong></div>                        
                    @enderror
                    
                    <div class="form-group" id="comentario-group">
                      <label for="exampleFormControlTextarea1">Mensaje</label>
                    <textarea class="form-control @error('mensaje') is-invalid @enderror" id="comentario" rows="5" placeholder="Mensaje..." name="mensaje">{{old('mensaje')}}</textarea>
                      
                    </div>
                    @error('mensaje')
                      <div class="alert alert-danger"> <strong>{{$message}}</strong></div>                        
                    @enderror
                    <button type="submit" class="btn btn-info btn-block">Enviar</button>
                  </form>
                </div>
              <!-- ICONOS DE RED SOCIAL !-->
                <div class="red-social mt-5 col-md-6">
                  <h3 class="mb-4">Visitanos</h3>
                  <a class="a-iconos" href="#"><i class="fab fa-facebook-f icono-facebook mb-5"></i></a>
                  <a class="a-iconos" href="#"><i class="fab fa-instagram mb-5"></i></a>
                  <a class="a-iconos" href="#"><i class="fab fa-twitter mb-5"></i></a> 
                </div>
              </div>  
              
              <div class="copyright p-5 bg-dark">
                <span>Design DigitalTeam<i class="far fa-copyright"></i> 2020</span>
              </div>
            </footer>
            
          </div>
    </div>
    
  </div>
  
  

@endsection

@section('script')
  <script src="{{asset('js/validarMensajeIndex.js')}}"></script>
@endsection