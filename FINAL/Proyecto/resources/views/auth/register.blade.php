@extends('layouts.auth-container')
@section('auth_subtitle','Registrarse')
@section('auth_content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- Nombre --}}
    <div class="form-floating mb-3">
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            id="name"
            name="name"
            placeholder="Ingrese su Nombre"
            value="{{ old('name') }}"
            required
            autofocus
        >
        <label for="name">Nombre</label>
    </div>

    @error('name')
        <div class="invalid-feedback d-block mb-3">
            {{ $message }}
        </div>
    @enderror

    {{-- Email --}}
    <div class="form-floating mb-3">
        <input
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            id="email"
            name="email"
            placeholder="Ingrese su Correo Electrónico"
            value="{{ old('email') }}"
            required
        >
        <label for="email">Correo Electrónico</label>
    </div>

    @error('email')
        <div class="invalid-feedback d-block mb-3">
            {{ $message }}
        </div>
    @enderror

    {{-- Contraseña --}}
    <div class="form-floating mb-3">
        <input
            type="password"
            class="form-control @error('password') is-invalid @enderror"
            id="password"
            name="password"
            placeholder="Ingrese su Contraseña"
            required
            autocomplete="new-password"
        >
        <label for="password">Contraseña</label>
    </div>

    @error('password')
        <div class="invalid-feedback d-block mb-3">
            {{ $message }}
        </div>
    @enderror

    {{-- Confirmar contraseña --}}
    <div class="form-floating mb-3">
        <input
            type="password"
            class="form-control @error('password_confirmation') is-invalid @enderror"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Confirme su Contraseña"
            required
            autocomplete="new-password"
        >
        <label for="password_confirmation">Confirmar contraseña</label>
    </div>

    @error('password_confirmation')
        <div class="invalid-feedback d-block mb-3">
            {{ $message }}
        </div>
    @enderror

    <a class="btn btn-link w-100 mt-2" href="{{ route('login') }}">
        ¿Ya se encuentra registrado?
    </a>

    <button class="btn btn-primary w-100" type="submit">
        Crear usuario
    </button>
</form>
@endsection
