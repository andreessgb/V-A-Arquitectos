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
            border-radius: 8px;
            height: auto;
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
                        <a href="{{ url('/proyectos') }}">Proyectos</a>
                        <a href="{{ url('/contacto') }}">Contacto</a>
                        @if(auth()->user()->projects->count() > 0)
                            <a href="{{ route('cliente.proyectos') }}">Mis proyectos</a>
                        @endif
                        @if(auth()->user()->roles->contains('name', 'admin'))
                            <a href="{{ route('admin.dashboard') }}">Administración</a>
                        @endif
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

            <!-- Contenedor principal -->
            <div class="main-container" id="sobre-nosotros">
                <h1>V-A-Arquitectos</h1>
                <p class="intro-text">Bienvenidos a V-A-Arquitectos, un estudio de arquitectura dedicado a crear espacios innovadores y funcionales. Nuestro objetivo es ofrecer soluciones personalizadas para cada cliente, con un enfoque en la calidad, el diseño y la sostenibilidad. ¡Explora nuestros servicios y proyectos!</p>
                
                <!-- Imagen de bienvenida -->
                <div class="image-container">
                    <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2FzYSUyMG1vZGVybmF8ZW58MHx8MHx8fDA%3D" alt="Imagen de arquitectura">
                </div>

                <!-- Sección de servicios -->
                <h2>Servicios que ofrecemos</h2>
                <div class="services">
                    <div class="service">
                        <img src="https://dgdesignmodeling.com/wp-content/uploads/2024/04/diseno-arquitectonico.png" alt="Diseño arquitectónico">
                        <h3>Diseño Arquitectónico</h3>
                        <p>Creación de planos y diseños arquitectónicos a medida, adaptados a las necesidades de nuestros clientes.</p>
                    </div>
                    <div class="service">
                        <img src="https://arm-actuarios.com/wp-content/uploads/2022/06/consultores-2.jpg" alt="Consultoría">
                        <h3>Consultoría</h3>
                        <p>Asesoramiento en todo el proceso de construcción, desde la idea inicial hasta la ejecución del proyecto.</p>
                    </div>
                    <div class="service">
                        <img src="https://arqcos.com/wp-content/uploads/2020/03/arquitectura-sostenible2-1024x683-1.jpg" alt="Sostenibilidad">
                        <h3>Sostenibilidad</h3>
                        <p>Soluciones arquitectónicas y urbanísticas orientadas hacia la sostenibilidad y el respeto por el medio ambiente.</p>
                    </div>
                </div>
            </div>

            <!-- Sección sobre nosotros -->
            <div class="about-us">
                <h2>Sobre Nosotros</h2>
                <p>V-A-Arquitectos es un estudio joven, con una gran pasión por el diseño arquitectónico. A pesar de haber comenzado recientemente, contamos con una amplia experiencia en proyectos innovadores y creativos, que demuestran nuestra capacidad para adaptarnos a las necesidades de cada cliente. Estamos comprometidos con la calidad y la sostenibilidad en cada proyecto que emprendemos.</p>
            </div>
        </div>
    </div>

    <!-- Scripts de Laravel Breeze -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
