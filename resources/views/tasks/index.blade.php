<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #ff4444;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333333;
        }
        td.actions {
            text-align: center;
        }
        .completed {
            color: green;
        }
        .pending {
            color: red;
        }
        .btn-completed {
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .btn-incomplete {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Lista de Tareas</h1>
    <a href="/tasks/create" style="color: indigo;">Crear nueva tarea</a>
    <form action="{{ route('tasks.index') }}">
        <input type="text" name="search" value="{{ $search }}" placeholder="Buscar...">
        <select name="user_id" id="user_id">
            <option value="">Todos los usuarios</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == request('user_id') ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit">Buscar</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td><a href="{{ $task->path() }}">{{ $task->name }}</a></td>
                    <td>{{ $task->user->name }}</td>
                    <td class="{{ $task->completed ? 'completed' : 'pending' }}">{{ $task->completed ? 'Completada' : 'Pendiente' }}</td>
                    <td class="actions">
                        @if ($task->completed)
                            <form action="{{ route('tasks.incomplete', $task) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-incomplete">Pendiente</button>
                            </form>
                        @else
                            <form action="{{ route('tasks.complete', $task) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-completed">Completada</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
