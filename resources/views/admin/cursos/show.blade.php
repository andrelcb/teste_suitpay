<h1>Detalhes do curso {{ $curso->name }}</h1>

<ul>
    <li>Tipo do curso: {{ $curso->type }}</li>
    <li>Quantidade maxima de cadastro: {{ $curso->maximum_number__enrollments }}</li>
    <li>Data maxima de cadastro: {{ $curso->allowed_registration_date }}</li>
</ul>

<form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
    @csrf()
    @method('delete')
    <button type="submit">Deletar</button>
</form>
