<x-app-layout>

    <x-slot name="header">
        @include('admin.cursos.partials.header', compact('cursos'))
    </x-slot>

    @include('admin.cursos.partials.content', compact('cursos'));
    
    <x-pagination :paginator="$cursos" :appends="$filters" />

</x-app-layout>
