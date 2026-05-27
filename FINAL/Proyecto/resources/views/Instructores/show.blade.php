<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Detalles del Instructor</h1>

    <p><strong>Nombre:</strong> {{ $instructor->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $instructor->apellido }}</p>
    <p><strong>Email:</strong> {{ $instructor->email }}</p>
    <p><strong>Telefono:</strong> {{ $instructor->telefono }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $instructor->fecha_nacimiento }}</p>
    <p><strong>Estado:</strong> {{ $instructor->estado }}</p>

    <a href="{{ route('instructores.index') }}">Volver a la lista de instructores</a>
    
</body>
</html>