<h1>Novo curso</h1>

<x-alert />
<form action="{{ route('cursos.store') }}" method="POST">
    @include('admin.cursos.partials.form')
</form>
