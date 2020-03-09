<section class="col-12">
    <div class="col-12">
      <h2>
        <i class="fas fa-percent"><span>off</span></i> Promociones
      </h2> 
    </div>
    
    <div class="img-cont-promo d-flex flex-wrap">
      @foreach ($destinosPromo as $destinoPromo)
        
          <article class="col-12 col-md-6 col-xl-4 flex-sm-shrink-0"> 
            <div class="card carta-promocion">
              @guest
              <button type="submit" class="favorito" title="Agregar Favorito"><i class="fas fa-heart"></i></button>
              @else
              {{-- Devuelvo posicion del id favorito tener cuidado que puede dar cero comprobar con false --}}
                @if(Auth::user()->idFavoritos()->search($destinoPromo->id_destino) !== false)
                <form action="/quitarFavorito" method="post">
                  @csrf
                <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                <button type="submit" class="favorito-red" title="Eliminar Favorito" name="quitarFav" value="{{$destinoPromo->id_destino}}"><i class="fas fa-heart"></i></button>
                </form>
                @else
                <form action="/agregarFavorito" method="post">
                  @csrf
                <input type="hidden" name="usuario" value="{{Auth::user()->id}}"> 
                <button type="submit" class="favorito" title="Agregar Favorito" name="agregarFav" value="{{$destinoPromo->id_destino}}"><i class="fas fa-heart"></i></button>
              </form>
                @endif
              @endguest
              <img src="{{asset('images/OfertaEspecial.png')}}" alt="promo" class="logo-promo">
              <div class="imagen-articulo-contenedor">
              <a href="/detalleDestino/{{$destinoPromo->id_destino}}" class="acceso-carrito" title="Más información">
                  <h3>{{$destinoPromo->nombre_destino}}</h3>
                  
                <h4 class="precio-promo">$ {{$destinoPromo->precio}}</h4><span> {{$destinoPromo->promocion}}%OFF</span>
                <p><b>${{$destinoPromo->precio - ($destinoPromo->precio * ($destinoPromo->promocion/100))}}</b></p>
                </a> 
              </div>
              <img src="{{asset('images/destinos/' .$destinoPromo->avatar_destino)}}" class="card-img-top avatar" alt="...">
              <div class="fondo-coment">
                <div class="puntuacion">
                    <small>{{ round($destinoPromo->comentarios()->avg('puntuacion'), 2) }}</small>
                    <img class="estrella" src=
                    "{{ asset('images/iconoEstrella.png') }}"
                    alt="Estrellas">
                </div>
                <div class="coment">
                    <small>comentarios ({{$destinoPromo->comentarios->count()}})
                    </small>
                </div>
            </div>
            </div>
      </article>
      @endforeach
    </div>  
  </section> 