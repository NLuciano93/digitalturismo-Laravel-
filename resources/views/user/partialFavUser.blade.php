<div class="tab-pane fade @if(session('favorito')) show active @endif" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
    <section class="section pb-3 text-center">               
      <div class="row">
        
        @forelse ($favoritos as $favorito)
        <div class="col-lg-4 col-md-12 mb-4 card-favorito-user">                      
          <div class="card testimonial-card">
            <form action="/quitarFavoritoUser" method="POST" class="form-fav">
              @csrf
            <button type="submit" class="boton-fav" name="quitarFav" value="{{$favorito->id_destino}}" title="Eliminar Favorito"><i class="fas fa-times"></i></button>  
            </form>
          <a class="detalleDestinoRedireccion" href="/detalleDestino/{{$favorito->id_destino}}">
            <div>                       
            <div class="card-up teal lighten-2">
            </div>                        
            <div class="avatar mx-auto white"><img src="{{asset('images/destinos/'. $favorito->avatar_destino)}}"
              alt="avatar mx-auto white" class="rounded-circle img-fluid">
            </div></a>                        
            <div class="card-body">
              <h4 class="card-title mt-1"><strong>{{$favorito->nombre_destino}}</strong></h4>
              <hr>
               @if ($favorito->promocion > 0)
            <h5><span class="precio-promo">${{$favorito->precio}}</span> {{$favorito->promocion}}%OFF</h5>
            <h5>Ahora ${{$favorito->precio - ($favorito->precio *($favorito->promocion / 100))}}</h5>
              @else
              <h5>${{$favorito->precio}}</h5>  
              @endif                        
              <small>{{$favorito->descripcion}}</small>
            </div>
          </div> 
          
          </div>                      
        </div>
        @empty
        <div>
            <h3>No hay favoritos</h3>
        </div>
        @endforelse
        <div class="container">
          <div class="row">
                {{$favoritos->links()}}
          </div>

        </div>

         </section>                                     
      </div> 