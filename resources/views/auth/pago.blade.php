@extends('layouts.layout')
@php 
    $nombre = session('nuevo_usuario')['nombre'];
    $anoNacimiento = session('nuevo_usuario')['anoNacimiento'];
    $avatar = session('nuevo_usuario')['avatar'];
    $email = session('datos_cuenta')['email'];
    $password = session('datos_cuenta')['password'];
    $plan = session('datos_cuenta')['plan']; 
@endphp
@section('content')

@if($errors->any())
    <h1 class="titulo"></h1>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger my-form-item">{{ $error }}</div>
    @endforeach
@endif
<form action="{{ route('confirmacionCuenta') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <!-- Datos prevenientes del formulario anterior-->
    <input type="text" name="nombre" id="nombreUsuario" value="{{ old('nombre', $nombre) }}" hidden/>
    <input type="text" name="anoNacimiento" value="{{ old('anoNacimiento', $anoNacimiento) }}" hidden/>
    <input type="text" name="avatar" value="{{ old('avatar', $avatar) }}" hidden/>
    <input type="text" name="email" value="{{ old('email', $email) }}" hidden/>
    <input type="password" name="password" value="{{ old('password', $password) }}" hidden/>
    <input type="text" name="plan" value="{{ old('plan', $plan) }}" hidden/>
    <div class="col-sm-6 my-pago">
        
        <hr class="my-4">
            <h4 class="mb-3">Código de promoción</h4>
            <div class="row gy-3">
                <div class="col-md-6">
                    <label for="codigo_promocion" class="form-label">Introduce tu código</label>
                    <input type="text" class="form-control" id="codigo_promocion" name="codigo_promocion" placeholder="por ejemplo; zs125ASd55" required>
                    <div class="invalid-feedback">El código no es válido</div>
                </div>
            </div>
        <!---->
        <hr class="my-4">
        <h4 class="mb-3">Pago</h4>
        <div class="my-3">
            <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" value="credito" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Tarjeta de crédito</label>
            </div>
            <div class="form-check">
                <input id="debit" name="paymentMethod" type="radio" value="debito" class="form-check-input" required>
                <label class="form-check-label" for="debit">Tarjeta de débito</label>
            </div>
            <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" value="paypal" class="form-check-input" required>
                <label class="form-check-label" for="paypal">PayPal</label>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-md-6">
                <label for="cc_name" class="form-label">Nombre en la tarjeta</label>
                <input type="text" class="form-control" id="cc_name" name="cc_name" value="{{ old('cc_name') }}" required>
                <small class="my-text">Nombre completo como se muestra en la tarjeta</small>
                <div class="invalid-feedback">Se requiere el nombre en la tarjeta</div>
            </div>
            <div class="col-md-6">
                <label for="cc_number" class="form-label">Número de tarjeta de crédito</label>
                <input type="text" class="form-control" id="cc_number" name="cc_number" value="{{ old('cc_number') }}" placeholder="0000 0000 0000 0000" required>
                <div class="invalid-feedback">Se requiere número de tarjeta de crédito</div>
            </div>
            <div class="col-md-3">
                <label for="cc_expiration" class="form-label">Vencimiento</label>
                <input type="text" class="form-control" id="cc_expiration" name="cc_expiration" value="{{ old('cc_expiration') }}" placeholder="MM/AA" required>
                <div class="invalid-feedback">Fecha de vencimiento requerida</div>
            </div>
            <div class="col-md-3">
                <label for="cc_cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc_cvv" name="cc_cvv" value="{{ old('cc_cvv') }}" placeholder="3 dígitos" required>
                <div class="invalid-feedback">Código de seguridad requerido</div>
            </div>
        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-success" type="submit">Continuar con el pago</button>
    </div>
</form>
<script>
    console.log(document.getElementById("nombreUsuario").value);
</script>
@endsection