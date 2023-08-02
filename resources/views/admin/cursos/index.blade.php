@extends('admin.template.app')

@section('title', 'Listagem de cursos')

@section('header')
    @include('admin.cursos.partials.header', compact('cursos'))
@endsection

@section('content')
    @include('admin.cursos.partials.content', compact('cursos'));

    <x-pagination :paginator="$cursos" :appends="$filters" />
@endsection
