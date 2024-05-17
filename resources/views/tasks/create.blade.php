<h1>Creado una tarea</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('tasks.store') }}" method="post">
    @csrf
    <div>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>

    </div>
    <button type="submit">Crear tarea</button>
</form>