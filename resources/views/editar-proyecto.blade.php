<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto</title>
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

        h1 {
            color: #111827;
            margin-bottom: 2rem;
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
            width: 100%;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            padding: 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #2563eb;
        }

        a {
            margin-top: 2rem;
            text-decoration: none;
            color: #4b5563;
            font-weight: 600;
            transition: color 0.2s;
        }

        a:hover {
            color: #111827;
        }
    </style>
</head>
<body>
    <h1>Editar Proyecto</h1>

    <form method="POST" action="{{ route('admin.projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $project->name }}" placeholder="Nombre" required>
        <textarea name="description" placeholder="Descripción" required>{{ $project->description }}</textarea>
        <input type="text" name="location" value="{{ $project->location }}" required>
        <input type="number" name="square_meters" value="{{ $project->square_meters }}">
        <input type="text" name="type" value="{{ $project->type }}" required>
        <input type="text" name="status" value="{{ $project->status }}" required>
        <input type="number" step="0.01" name="budget" value="{{ $project->budget }}">
        <input type="url" name="main_image" value="{{ $project->main_image }}">
        <input type="date" name="start_date" value="{{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}" required>
        <input type="date" name="end_date" value="{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}" >

        <select name="user_id">
            <option value="">Asignar usuario (opcional)</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $project->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('admin.dashboard') }}">← Volver a Administración</a>
</body>
</html>
