<h1>Curso: {{ $curso->id }}</h1>


@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('cursos.update', $curso->id) }}" method="POST">
    @csrf()
    @method('PUT')
    <input type="text" placeholder="Nome" name="name" value="{{ $curso->name }}">
    <select name="type" value="{{ $curso->type }}">
        <option value="InPerson">Presencial</option>
        <option value="Online">On-line</option>
    </select>
    <input type="number" value="{{ $curso->maximum_number__enrollments }}" placeholder="Número maximo de matriculas"
        name="maximum_number__enrollments">
    <input type="date" value="{{ $curso->allowed_registration_date }}" placeholder="Data até a matricula"
        name="allowed_registration_date">
    <button type="submit">
        Salvar
    </button>

</form>
