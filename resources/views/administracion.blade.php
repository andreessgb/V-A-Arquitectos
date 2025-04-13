<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración | V-A-Arquitectos</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
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

        h1, h2 {
            color: #111827;
            text-align: center;
            margin-top: 2rem;
        }

        .form-wrapper {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        form {
            display: grid;
            gap: 1rem;
            max-width: 800px;
            width: 100%;
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        input, select, textarea {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2563eb;
        }

        .success {
            color: green;
            margin-top: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 3rem;
        }

        th, td {
            padding: 12px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        .table-wrapper {
            width: 100%;
            max-width: 1000px;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    @if (Route::has('login'))
        <div class="auth-links">
            @auth
                <a href="{{ url('/') }}">Inicio</a>
                @if(auth()->user()->projects->count() > 0)
                    <a href="{{ route('cliente.proyectos') }}">Mis proyectos</a>
                @endif
                <a href="{{ url('/proyectos') }}">Proyectos</a>
                <a href="{{ url('/contacto') }}">Contacto</a>
                <a href="{{ url('/profile') }}">Perfil</a>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrarse</a>
                @endif
            @endauth
        </div>
    @endif

    <h1>Panel de Administración</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <h2>Crear nuevo proyecto</h2>
    <div class="form-wrapper">
        <form method="POST" action="{{ route('admin.projects.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Nombre del proyecto" required>
            <textarea name="description" placeholder="Descripción del proyecto" required></textarea>
            <input type="text" name="location" placeholder="Localización" required>
            <input type="number" name="square_meters" placeholder="Metros cuadrados">
            <input type="text" name="type" placeholder="Tipo (residencial, comercial, etc.)" required>
            <input type="text" name="status" placeholder="Estado (en diseño, construcción...)" required>
            <input type="number" step="0.01" name="budget" placeholder="Presupuesto">
            <input type="url" name="main_image" placeholder="URL de la imagen principal">
            <input type="date" name="start_date" required>
            <input type="date" name="end_date">

            <select name="user_id">
                <option value="">Asignar a usuario (opcional)</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                @endforeach
            </select>

            <button type="submit">Crear Proyecto</button>
        </form>
    </div>

    <div class="table-wrapper">
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
