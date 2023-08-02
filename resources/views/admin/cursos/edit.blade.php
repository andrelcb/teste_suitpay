@extends('admin.template.app')

@section('title', 'Cadastro de cursos')

@section('header')
    <h1 class="text-lg text-black-500">Novo curso Curso: {{ $curso->name }}</h1>
@endsection

@section('content')
    <x-alert />
    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
        @csrf()
        @method('PUT')
        @include('admin.cursos.partials.form', ['curso' => $curso])
    </form>
@endsection
