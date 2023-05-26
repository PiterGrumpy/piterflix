@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de administrador</h1>
    @if (session('success'))
        <br/><br/>
        <div class="alert alert-success m-auto my-login">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <br/><br/>
        <div class="alert alert-danger m-auto my-login">
            {{ session('error') }}
        </div>
    @endif
@stop
