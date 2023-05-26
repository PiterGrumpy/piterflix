<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Piterflix') }}</title>

        <script src=""></script>
        
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <header> 
          @include('layouts.layout-navigation') 
        </header>
            @yield('cabecera')
            @if (session('success'))
                <br/><br/>
                <div class="alert alert-success m-auto my-login">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        <!-- Footer -->
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 bg-dark">
            @include('layouts.footer')
        </footer>
        @vite(['resources/js/app.js'])
    </body>
</html>
