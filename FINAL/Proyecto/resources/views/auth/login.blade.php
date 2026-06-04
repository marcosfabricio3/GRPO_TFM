@extends('layouts.auth-container')
@section('auth_subtitle','Iniciar sesión')
@section('auth_content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-floating mb-3">
            <input type="login" class="form-control @error('login') is-invalid @enderror" id="login" name="login" placeholder="Ingrese su Usuario o Correo Electrónico" required autofocus autocomplete="username">
            <label for="login" class="form-label">Login</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Contraseña" required>
            <label for="floatingPassword">Contraseña</label>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <a class="btn btn-link w-100 mt-2" href="{{ route('password.request') }}">Recuperar Contraseña</a>
        <button class="btn btn-primary w-100" type="submit">Ingresar</button>
        <button type="button" class="btn btn-secondary w-100 mt-2" onclick="window.location='{{route('dashboard')}}'">Ingresar como invitado</button>
        <button type="button" class="btn btn-success w-100 mt-2" onclick="window.location='{{route('register')}}'">Registrarse </button>
    </form>
@endsection