<section class="col-12">
    <div class="col-12">
      <h2>
        <i class="fas fa-star"></i> Destacados
      </h2>
    </div>
    <div class="img-cont-destacado d-flex flex-wrap">
      @foreach ($destinosDestacados as $destinoDestacado)
        <article class="col-12 col-md-6 col-xl-4  flex-sm-shrink-0">
          <div class="card carta-promocion">
            @guest
                 <button class="favorito"><i class="fas fa-heart"></i></button>
                 @else
                 @if (Auth::user()->idFavoritos()->search($destinoDestacado->id_destino)!==false)
                 <form action="/quitarFavorito" method="post">
                  @csrf
                  <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                  <button type="submit" class="favorito-red" title="Eliminar Favorito" name="quitarFav" value="{{$destinoDestacado->id_destino}}"><i class="fas fa-heart"></i></button>
                </form>                        
                 @else
                 <form action="/agregarFavorito" method="post">
                  @csrf
                  <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                  <button type="submit" class="favorito" title="Agregar Favorito" name="agregarFav" value="{{$destinoDestacado->id_destino}}"><i class="fas fa-heart"></i></button>
                </form> 
                 @endif
            @endguest
           
            <img class="star-destacado" src="{{asset('images/stars.png')}}" alt="">
            <div class="imagen-articulo-contenedor">
            <a href="/detalleDestino/{{$destinoDestacado->id_destino}}" class="acceso-carrito" title="Más información">
                <h3>{{$destinoDestacado->nombre_destino}}</h3>
              
                @if ($destinoDestacado->promocion > 0 )
                    <h4 class="precio-promo">$ {{$destinoDestacado->precio}}</h4><span> {{$destinoDestacado->promocion}}%OFF</span>
                    <p><b>${{$destinoDestacado->precio - ($destinoDestacado->precio * ($destinoDestacado->promocion/100))}}</b></p>
                @else
                    <h4>${{$destinoDestacado->precio}}</h4>
                @endif
                
              </a> 
            </div>
            <img src="{{asset('images/destinos/'. $destinoDestacado->avatar_destino)}}" class="card-img-top avatar" alt="...">
              <div class="fondo-coment">
                <div class="puntuacion">
                    <small>{{round($destinoDestacado->promedio,2)}}</small>
                    <img class="estrella" src=
                    "{{ asset('images/iconoEstrella.png') }}"
                    alt="Estrellas">
                </div>
                <div class="coment">
                    <small>comentarios ({{$destinoDestacado->comentarios}})
                    </small>
                </div>
            </div>
          </div>
        </article>
      @endforeach
    </section>