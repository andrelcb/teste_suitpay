@extends('admin.template.app')

@section('title', 'Detalhes')

@section('header')
    <h1 class="text-lg text-black-500">Detalhes do curso: {{ $curso->name }}</h1>
@endsection


@section('content')
    <ul>
        <li>Tipo do curso: {{ $curso->type }}</li>
        <li>Quantidade maxima de cadastro: {{ $curso->maximum_number__enrollments }}</li>
        <li>Data maxima de cadastro: {{ $curso->allowed_registration_date }}</li>
    </ul>

    <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
        @csrf()
        @method('delete')
        <button class="bg-red-500 border-b-4 p-3 hover:bg-red-400 text-white" type="submit">Deletar</button>
    </form>
@endsection
