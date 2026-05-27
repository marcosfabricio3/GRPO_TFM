<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Editar Clase</h1>

    <form action="{{ route('clases.update', $clase->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $clase->nombre }}" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required>{{ $clase->descripcion }}</textarea>

        <button type="submit">Actualizar Clase</button>
    </form>
    <a href="{{ route('clases.index') }}">Volver a la lista de clases</a>

</body>
</html>