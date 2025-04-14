<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Proyectos - V-A-Arquitectos</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Estilos -->
    <style>
        /* Estilos generales */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Figtree', sans-serif;
        }

        body {
            background-color: #f3f4f6;
            color: #111827;
            line-height: 1.5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Barra de navegación de autenticación */
        .auth-links {
            position: fixed;
            top: 0;
            right: 0;
            padding: 16px;
            text-align: right;
            z-index: 10;
        }

        .auth-links a {
            font-weight: 600;
            color: #6b7280;
            transition: background-color 0.2s;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            margin: 0 8px;
        }

        .auth-links a:hover {
            background-color: #4b5563;
            color: white;
        }

        .auth-links a:focus {
            outline: 2px solid #ef4444;
            border-radius: 4px;
        }

        /* Títulos */
        h1, h2 {
            text-align: center;
            margin-top: 40px;
            font-size: 2.5rem;
            color: #111827;
        }

        /* Contenedor principal de proyectos */
        .main-container {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Contenedor de cada proyecto */
        .project-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: box-shadow 0.3s;
        }

        .project-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .project-card img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 8px;
        }

        .project-title {
            font-size: 1.8rem;
            color: #111827;
            margin-top: 10px;
        }

        .project-description {
            font-size: 1rem;
            color: #4b5563;
            margin-top: 10px;
        }

        .project-details ul {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }

        .project-details li {
            margin-bottom: 8px;
            color: #6b7280;
        }

        .project-details li span {
            font-weight: bold;
            color: #3b82f6;
        }

        .empty-state {
            text-align: center;
            font-size: 1.2rem;
            color: #6b7280;
            margin-top: 40px;
        }

    </style>
</head>
<body>
    <div class="container">

        <!-- Barra de autenticación -->
        @if (Route::has('login'))
            <div class="auth-links">
                @auth
                    <a href="{{ url('/') }}">Inicio</a>
                    <a href="{{ url('/proyectos') }}">Proyectos</a>
                    <a href="{{ url('/contacto') }}">Contacto</a>
                    @if(auth()->user()->roles->contains('name', 'admin'))
                        <a href="{{ route('admin.dashboard') }}">Administración</a>
                     @endif
                    <span class="mx-2">
                        <a href="{{ url('/profile') }}" class="font-semibold">Perfil</a>
                    </span>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif

        <h1>Mis Proyectos</h1>

        <div class="main-container">

            <!-- Si no hay proyectos -->
            @if ($proyectos->isEmpty())
                <p class="empty-state">No tienes proyectos asignados actualmente.</p>
            @else
                <!-- Si hay proyectos -->
                @foreach ($proyectos as $proyecto)
                    <div class="project-card">
                        <img src="{{ $proyecto->main_image }}" alt="Imagen del proyecto">
                        <h2 class="project-title">{{ $proyecto->name }}</h2>
                        <p class="project-description">{{ $proyecto->description }}</p>

                        <div class="project-details">
                            <ul>
                                <li><span>Localización:</span> {{ $proyecto->location }}</li>
                                <li><span>Metros cuadrados:</span> {{ $proyecto->square_meters }} m²</li>
                                <li><span>Tipo:</span> {{ $proyecto->type }}</li>
                                <li><span>Estado:</span> {{ ucfirst($proyecto->status) }}</li>
                                <li><span>Presupuesto:</span> €{{ number_format($proyecto->budget, 2) }}</li>
                                <li><span>Fecha de inicio:</span> {{ \Carbon\Carbon::parse($proyecto->start_date)->format('d/m/Y') }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
