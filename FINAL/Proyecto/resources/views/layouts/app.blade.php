
<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
	@vite(['resources/js/app.js','resources/js/modal-handler.js','resources/js/loading-overlay.js','resources/css/app.css'])
</head>
<body>
    <div id="loadingOverlay">
        <div class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <div class="mt-3">
                Cargando...
            </div>
        </div>
    </div>
	@yield('content')
	<x-modal-base />
</body>
</html>