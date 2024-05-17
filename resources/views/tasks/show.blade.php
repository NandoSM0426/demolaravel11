<h1>Tarea # {{ $task->id }}</h1>
<div>
    {{ $task->name }}
    <p>{{ $task->created_at }}</p>

    <a href="{{ route('tasks.edit', $task) }}">Editar</a>
    <form action="{{ route('tasks.destroy', $task) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
</div>