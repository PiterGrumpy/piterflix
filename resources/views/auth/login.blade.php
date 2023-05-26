@extends('layouts.layout')

@section('content')
    <div class="m-auto my-login">
        <form action="{{ route('login') }}" method="POST">
        @csrf
            <h1 class="h3 titulo">Bienvenido</h1>
            <div class="form-floating caja">
                <label for="floatingInput"  id="floatingEmailLabel">Email</label>
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                @error('email')
                    <span role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating caja">
                <label for="floatingPassword" id="floatingPasswordLabel">Password</label>
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">   
                @error('password')
                    <span role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="checkbox mb-3 my-text">
                <label><input class="my-text" type="checkbox" value="rememberme"> Recuérdame</label>
            </div>
            <button class="w-100 btn btn-success" type="submit">Log in</button>
            <p class="mt-5 mb-3 my-text">&copy; 2017–2022</p>
        </form>
    </div>
<script type="text/javascript">
    let label_email = document.getElementById("floatingEmailLabel");
    let label_password = document.getElementById("floatingPasswordLabel");
    let input_email = document.getElementById("floatingInput");
    let input_password = document.getElementById("floatingPassword");

    input_email.addEventListener('input', () =>hideLabel(label_email));
    input_password.addEventListener('input', () =>hideLabel(label_password));
    input_email.addEventListener('blur', () =>visibleLabel(label_email, input_email));
    input_password.addEventListener('blur', () =>visibleLabel(label_password, input_password));

    function hideLabel(element) {
        element.classList.add('label-hidden');
    }

    function visibleLabel(element, input) {
        if (input.value.trim() === '') {
            console.log(input.value);
            element.classList.remove('label-hidden');
        }
    }
</script>
@endsection