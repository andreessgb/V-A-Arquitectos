<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>V-A-Arquitectos</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Estilos -->
    <style>
        /* Estilos personalizados de los enlaces */
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
            color: #6b7280; /* Gris */
            transition: background-color 0.2s;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            margin: 0 8px;
        }

        /* Cambiar color de fondo a gris oscuro en hover */
        .auth-links a:hover {
            background-color: #4b5563; /* Gris más oscuro */
            color: white; /* Cambio de texto a blanco para mayor contraste */
        }

        .auth-links a:focus {
            outline: 2px solid #ef4444;
            border-radius: 4px;
        }

        /* Estilos globales */
        * {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb;
        }

        body {
            margin: 0;
            line-height: 1.5;
            font-family: 'Figtree', sans-serif;
        }

        .container {
            margin-left: auto;
            margin-right: auto;
            padding: 16px;
        }

        h1, h2 {
            color: #111827;
            text-align: center;
            margin-top: 2rem;
        }

        h1 {
            font-size: 3rem;
        }

        h2 {
            font-size: 2rem;
            color: #3b82f6;
        }

        /* Sección de bienvenida */
        .main-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 4rem;
            border-radius: 8px;
            max-width: 1200px;
            margin: auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .intro-text {
            font-size: 1.3rem;
            color: #4b5563;
            margin-bottom: 2rem;
            text-align: justify;
        }

        .image-container {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .image-container img {
            width: 80%;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Sección de servicios */
        .services {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .service {
            background: #f9fafb;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .service img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .service img:hover {
            transform: scale(1.05);
        }

        .service h3 {
            margin-top: 1rem;
            font-size: 1.5rem;
            color: #111827;
        }

        .service p {
            font-size: 1rem;
            color: #4b5563;
        }
        .service ul {
            list-style: none;
            padding: 0;
            
        }

        .service li span {
            color: #3b82f6; /* Azul vivo */
            font-weight: 600;
        }


        /* Sección de contacto */
        .contact-section {
            margin-top: 4rem;
            padding: 2rem;
            background: #f3f4f6;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-section h2 {
            font-size: 2rem;
            color: #111827;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
        }

        .contact-form input, .contact-form textarea {
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }

        .contact-form button {
            padding: 1rem;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
        }

        .contact-form button:hover {
            background-color: #2563eb;
        }

        /* Sección sobre nosotros */
        .about-us {
            background: #f9fafb;
            padding: 3rem 0;
            margin-top: 3rem;
            text-align: center;
        }

        .about-us p {
            font-size: 1.2rem;
            color: #4b5563;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            
            @if (Route::has('login'))
                <div class="auth-links">
                    @auth
                        <a href="{{ url('/') }}">Inicio</a>
                        <span class="mx-2"> <!-- Añade espacio horizontal entre enlaces -->
                            <a href="{{ url('/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Perfil </a>
                        </span>
                    @else
                        <a href="{{ route('login') }}">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <h1>Nuestros Proyectos</h1>
        @php
         // Array con URLs de imágenes de arquitectura (opcional)
            $imagenesDemo = [
            'https://i.pinimg.com/736x/2b/57/0b/2b570b0129ea9d17f362fb6b17be13da.jpg',
            'https://plus.unsplash.com/premium_photo-1687960116228-13d383d20188?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGhlcm1vc2ElMjBjYXNhfGVufDB8fDB8fHww',
            'https://source.unsplash.com/600x400/?modern-house',
            'https://source.unsplash.com/600x400/?interior',
            'https://source.unsplash.com/600x400/?design',
            ];
        @endphp

        @if ($proyectos->count())
            <div class="services">
                @foreach ($proyectos as $index => $proyecto)
                    <div class="service">
                        <img src="{{ $proyecto->main_image }}" alt="Imagen de proyecto">
                        <h3>{{ $proyecto->name }}</h3>
                        <p>{{ $proyecto->description }}</p>
                        <strong><p>Especificaciones:</p></strong>
                        <ul>
                        <li><span>Localización:</span> {{ $proyecto->location }}</li>
                        <li><span>Metros cuadrados:</span> {{ $proyecto->square_meters }}</li>
                        <li><span>Tipo:</span> {{ $proyecto->type }}</li>
                        <li><span>Estado:</span> {{ $proyecto->status }}</li>
                        <li><span>Presupuesto:</span> {{ $proyecto->budget }}€</li>
                        <li><span>Fecha de inicio:</span> {{ $proyecto->start_date }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        @else
            <p style="text-align: center; color: #6b7280; font-size: 1.2rem;">No hay proyectos disponibles por el momento.</p>
        @endif


    </div>

    <!-- Scripts de Laravel Breeze -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
