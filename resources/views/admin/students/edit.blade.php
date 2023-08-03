<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Aluno: {{ $student->name }}
        </h2>
    </x-slot>

    <x-alert />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form action="{{ route('cursos.update', $student->id) }}" method="POST">
                    @csrf()
                    @method('PUT')
                    @include('admin.cursos.partials.form', ['student' => $student])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
