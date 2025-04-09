<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Estilos de Laravel Breeze (si no los has agregado, asegúrate de que los assets están compilados) -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-center text-3xl">Bienvenido a la página de inicio</h1>

        <div class="flex justify-end mt-4">
            @if (Route::has('login'))
                <div class="hidden sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Iniciar sesión</a>
                        <span class="mx-4">|</span>
                        <a href="{{ route('register') }}" class="text-sm text-gray-700 underline">Registrar</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <!-- Scripts de Laravel Breeze -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
