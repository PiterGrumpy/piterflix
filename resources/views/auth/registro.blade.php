@extends('layouts.layout')

@section('content')
    <h1 class="titulo">Formulario de registro</h1>
    <div class="formulario-registro">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger my-form-item">{{ $error }}</div>
    @endforeach
    @endif
        <form action="{{ route('pago') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group my-form-item">
                <input id="user_name" type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" placeholder="Nombre de usuario">
            </div>
            <div class="input-group my-form-item">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="input-group my-form-item">
                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Contraseña">
            </div>
            <div class="input-group my-form-item">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Repetir contraseña">
            </div>
            <label class="input-group my-form-item my-text" for="user_birth">Fecha de nacimiento del usuario principal</label>
            <div class="input-group my-form-item">
                <input id="user_birth" type="date" class="form-control" value="{{ old('user_birth') }}" name="user_birth">
            </div>
            <div class="container my-pricing">
                <div class="columns">
                    <ul id="selected_basic" class="price">
                        <li class="header">Basic</li>
                        <li class="grey">4.99€ / mes</li>
                        <li>Calidad <strong>HD</strong></li>
                        <li>Descargas <strong>NO</strong></li>
                        <li class="grey"><button id="btn-basic" type="button" class="btn btn-success">Elegir Plan</button></li>
                    </ul>
                </div>
    
                <div class="columns">
                    <ul id="selected_premium" class="price">
                        <li class="header">Premium</li>
                        <li class="grey">9.99€ / mes</li>
                        <li>Calidad <strong>4K</strong></li>
                        <li>Descargas <strong>SÍ</strong></li>
                        <li class="grey"><button id="btn-premium" type="button" class="btn btn-success">Elegir Plan</button></li>
                    </ul>
                </div>
                <input id="selected_plan" type="text" class="form-control" name="plan" value="basico" hidden/>
            </div>
            <div class="btn-pago">
                <input class="btn btn-success" type="submit" value="Seleccionar método de pago"/>
            </div>
        </form>
    </div>
    <script>
        let btn_basic = document.getElementById("btn-basic");
        let btn_premium = document.getElementById("btn-premium");
        btn_basic.addEventListener('click', function(){
            establecerPlan("basico");
        });
        btn_premium.addEventListener('click', function(){
            establecerPlan("premium");
        });
        function establecerPlan(plan) {
            if (plan === "basico") {
                document.getElementById("selected_plan").value = "basico";
                document.getElementById("selected_basic").classList.add("seleccionado");
                document.getElementById("selected_premium").classList.remove("seleccionado");
            }else if (plan === "premium") {
                document.getElementById("selected_plan").value = "premium";
                document.getElementById("selected_basic").classList.remove("seleccionado");
                document.getElementById("selected_premium").classList.add("seleccionado");
            }
        }
    </script>

  @endsection