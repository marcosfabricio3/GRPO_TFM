@extends('layouts.app')

@section('content')

    @vite([
        'resources/css/login.css',
        'resources/js/login.js'
    ])

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gym Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="min-vh-100 d-flex justify-content-center align-items-center">

    <canvas id="background"></canvas>

    <main class="container position-relative">

        <div class="row justify-content-center">

            <div class="col-11 col-sm-8 col-md-6 col-lg-4 col-xl-3">

                <div class="card shadow-lg border-0">

                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">
                            Gym Manager
                        </h2>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="floatingInput"
                                    name="email"
                                    placeholder="Correo Electrónico"
                                    required
                                    autofocus>

                                <label for="floatingInput">
                                    Correo Electrónico
                                </label>
                            </div>

                            <div class="form-floating mb-3">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="floatingPassword"
                                    name="password"
                                    placeholder="Contraseña"
                                    required>

                                <label for="floatingPassword">
                                    Contraseña
                                </label>
                            </div>


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <button
                                class="btn btn-primary w-100"
                                type="submit">

                                Ingresar

                            </button>
                            <button 
                                type="button" class="btn btn-success"
                                onclick="window.location='{{route('register')}}'">
                            Registrarse
                        </button>

                        </form>

                        <div class="text-center mt-4">
                            <small class="text-muted">
                                &copy; Gym 2026
                            </small>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</body>
</html>

@endsection
