@extends('admin.template.app')

@section('title', 'Cadastro de cursos')

@section('header')
    <h1 class="text-lg text-black-500">Novo curso</h1>
@endsection

@section('content')
    <x-alert />
    <form action="{{ route('cursos.store') }}" method="POST">
        @include('admin.cursos.partials.form')
    </form>
@endsection
