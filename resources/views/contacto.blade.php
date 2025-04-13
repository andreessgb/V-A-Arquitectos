<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | V-A-Arquitectos</title>

    <!-- Fuente Figtree -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
        }

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

        .container {
            max-width: 800px;
            margin: 6rem auto 4rem;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #111827;
        }

        .info {
            margin-bottom: 2rem;
            color: #4b5563;
        }

        .info p {
            margin: 0.3rem 0;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        input, textarea {
            padding: 1rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            background-color: #3b82f6;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #2563eb;
        }

        .success {
            display: none;
            background: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>

    {{-- Enlaces de login y navegación --}}
    @if (Route::has('login'))
        <div class="auth-links">
            @auth
                <a href="{{ url('/') }}">Inicio</a>
                <a href="{{ url('/proyectos') }}">Proyectos</a>
                @if(auth()->user()->projects->count() > 0)
                    <a href="{{ route('cliente.proyectos') }}">Mis proyectos</a>
                @endif
                @if(auth()->user()->roles->contains('name', 'admin'))
                    <a href="{{ route('admin.dashboard') }}">Administración</a>
                @endif
                <span class="mx-2">
                    <a href="{{ url('/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Perfil</a>
                </span>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4">Registrarse</a>
                @endif
            @endauth
        </div>
    @endif

    {{-- Contenido principal --}}
    <div class="container">
        <h1>Contáctanos</h1>

        <div class="info">
            <p><strong>Empresa:</strong> V-A-Arquitectos</p>
            <p><strong>Dirección:</strong> Calle de la Arquitectura 123, Madrid</p>
            <p><strong>Teléfono:</strong> +34 912 345 678</p>
            <p><strong>Email:</strong> contacto@vaarquitectos.com</p>
            <p><strong>Horario:</strong> Lunes a Viernes de 9:00 a 18:00</p>
        </div>
        <div class="info">
            <p>
                ¿Estás interesado en contratar un proyecto? Puedes ponerte en contacto con nosotros a través del siguiente formulario.
                Además, también tienes la posibilidad de solicitar un <strong>proyecto completamente personalizado</strong> adaptado a tus necesidades y preferencias.
            </p>
            <p>¡Estaremos encantados de ayudarte a hacer realidad tus ideas!</p>
        </div>      

        <form id="fakeForm">
            <input type="text" name="nombre" placeholder="Tu nombre" required>
            <input type="email" name="email" placeholder="Tu correo electrónico" required>
            <textarea name="mensaje" rows="5" placeholder="Escribe" required></textarea>
            <button type="submit">Enviar Mensaje</button>
        </form>

        <div class="success" id="mensajeExito">
            ¡Tu mensaje ha sido enviado con éxito! (Aunque no realmente 😄)
        </div>
    </div>

    <script>
        document.getElementById('fakeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            document.getElementById('mensajeExito').style.display = 'block';
            this.reset();
        });
    </script>

</body>
</html>
