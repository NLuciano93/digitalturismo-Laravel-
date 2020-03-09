<section class="col-12">
    <div class="col-12">
      <h2>
        <i class="fas fa-plane-departure"></i>Destinos
      </h2> 
    </div>
    <div class="img-cont-destino d-flex flex-wrap">
      @foreach ($destinos as $destino)
      <article class="col-12 col-md-6 col-xl-4  flex-sm-shrink-0">
        <div class="card carta-promocion">
          @guest
              <button type="submit" class="favorito" title="Agregar Favorito"><i class="fas fa-heart"></i></button>
              @else
              {{-- Devuelvo posicion del id favorito tener cuidado que puede dar cero comprobar con false --}}
                @if(Auth::user()->idFavoritos()->search($destino->id_destino) !== false)
                <form action="/quitarFavorito" method="post">
                  @csrf
                <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                  <button type="submit" class="favorito-red" title="Eliminar Favorito" name="quitarFav" value="{{$destino->id_destino}}"><i class="fas fa-heart"></i></button>
                </form>
                @else 
                <form action="/agregarFavorito" method="post">
                  @csrf
                  <input type="hidden" name="usuario" value="{{Auth::user()->id}}">
                <button type="submit" class="favorito" title="Agregar Favorito" name="agregarFav" value="{{$destino->id_destino}}"><i class="fas fa-heart"></i></button>
                </form>
                @endif
              @endguest
          <div class="imagen-articulo-contenedor">
          <a href="/detalleDestino/{{$destino->id_destino}}" class="acceso-carrito" title="Más información">
            <h3>{{$destino->nombre_destino}}</h3>
             
              <h4>$ {{$destino->precio}}</h4>
            </a> 
          </div>
          <img src="{{asset('images/destinos/'.$destino->avatar_destino)}}" class="card-img-top avatar" alt="...">
          <div class="fondo-coment">
            <div class="puntuacion">
                <small>{{ round($destino->comentarios()->avg('puntuacion'), 2) }}</small>
                <img class="estrella" src=
                "{{ asset('images/iconoEstrella.png') }}"
                alt="Estrellas">
            </div>
            <div class="coment">
                <small>comentarios ({{$destino->comentarios->count()}})
                </small>
            </div>
        </div>
        </div>
      </article>
      @endforeach 
      

    </div>
  </section>