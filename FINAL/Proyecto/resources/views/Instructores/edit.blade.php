<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Editar Instructor</h1>

    <form action="{{ route('instructores.update', $instructor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $instructor->nombre }}" required>

        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" value="{{ $instructor->especialidad }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $instructor->email }}" required>

        <label for="telefono">Telefono:</label>
        <input type="tel" id="telefono" name="telefono" value="{{ $instructor->telefono }}" required>

        <label for="activo">Activo:</label>
        <input type="checkbox" id="activo" name="activo" {{ $instructor->activo ? 'checked' : '' }}>

        <button type="submit">Actualizar Instructor</button>
    </form>
    <a href="{{ route('instructores.index') }}">Volver a la lista de instructores</a> 
    
</body>
</html>