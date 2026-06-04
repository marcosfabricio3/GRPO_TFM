@extends('layouts.auth-container')
@section('auth_subtitle','Recuperar contraseña')
@section('auth_content')
    <p class="text-center fw-bold">Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Correo Electrónico" required autofocus>
            <label for="floatingInput">Correo Electrónico</label>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <button type="button" class="btn btn-success w-100 mt-2">Recuperar contraseña</button>
        <a class="btn btn-link w-100 mt-2" href="{{ route('login') }}">Volver al inicio</a>
    </form>
@endsection