<x-app-layout>

    <x-slot name="header">
        @include('admin.students.partials.header', compact('students'))
    </x-slot>

    @include('admin.students.partials.content', compact('students'));
    
    <x-pagination :paginator="$cursos" :appends="$filters" />

</x-app-layout>
