@extends('layout.plantilla')

@section('css')
     {{ asset('css/style.css') }}
@endsection

@section('principal')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
            <h2>Comprobar compra</h2>
            <h4>El total es: ${{$total}}</h4>
            </div>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-offset-6">
            <form action="" method="post" id="checkoutCarritoForm">
                @csrf
                <div class="form-group">
                    <label for="name"><b>Nombre</b></label>
                    <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
                </div>
                <div class="form-group">
                    <label for="direccion"><b>Dirección</b></label>
                    <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" required>
                </div>
                <div class="form-group">
                    <label for="nameCard"><b>Nombre Tarjeta</b></label>
                    <input type="text" class="form-control" id="nameCard" placeholder="Nombre Tarjeta" name="nameCard" required>
                </div>
                <div class="form-group">
                    <label for="cardNumber"><b>Número de tarjeta</b></label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="Número" name="cardNumber" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-6">
                        <label for="expirationMonth"><b>Expiration Month</b></label>
                        <input class="form-control" type="text" name="expirationMonth" id="expirationMonth" required>
                    </div>

                    <div class="form-group col-xs-6">
                        <label for="expirationYear"><b>Expiration Year</b></label>
                        <input class="form-control" type="text" name="expirationYear" id="expirationYear" required>

                    </div>
                </div>
                <div class="form-group">
                    <label for="cvc"><b>CVC</b></label>
                    <input type="text" class="form-control" id="cvc" placeholder="CVC" name="cvc" required>
                </div>
                
                

                <button type="submit" class="btn btn-success">Comprar</button>
            </form>
            </div>
        </div>
    </div>

@endsection