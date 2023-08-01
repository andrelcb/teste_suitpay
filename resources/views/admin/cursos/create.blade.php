<h1>Novo curso</h1>


@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('cursos.store') }}" method="POST">
    @csrf()
    <input type="text" placeholder="Nome" name="name">
    <select name="type">
        <option value="InPerson">Presencial</option>
        <option value="Online">On-line</option>
    </select>
    <input type="number" placeholder="Número maximo de matriculas" name="maximum_number__enrollments">
    <input type="date" placeholder="Data até a matricula" name="allowed_registration_date">
    <button type="submit">
        Salvar
    </button>

</form>
