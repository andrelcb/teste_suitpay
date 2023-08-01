<h1>Listagem dos cursos</h1>

<a href="{{ route('cursos.create') }}">Adicionar novo curso</a>


<table>
    <thead>
        <th>Nome</th>
        <th>Tipo de curso</th>
        <th>Maximo de cadastro</th>
        <th>Data maxima para cadastro</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->name }}</td>
                <td>{{ $curso->type }}</td>
                <td>{{ $curso->maximum_number__enrollments }}</td>
                <td>{{ $curso->allowed_registration_date }}</td>
                <td> <a href="{{ route('cursos.show', $curso->id) }}">Detalhes</a></td>
                <td> <a href="{{ route('cursos.edit', $curso->id) }}">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
