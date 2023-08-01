<h1>Curso: {{ $curso->id }}</h1>

<x-alert />

<form action="{{ route('cursos.update', $curso->id) }}" method="POST">
    @csrf()
    @method('PUT')
    @include('admin.cursos.partials.form', ['curso' => $curso])
</form>
