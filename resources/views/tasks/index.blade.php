<h1>Tareas</h1>

<form action="{{ route('tasks.index') }}">
 
    <input type="text" name="search" value="{{ $search }}">
    <button type="submit">Buscar</button>

</form>
@foreach ($tasks as $task)
    <li><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></li>
@endforeach