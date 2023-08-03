<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes do aluno: {{ $student->name }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="flex items-center justify-between p-4">
                    <ul class="list-none hover:list-disc text-gray-200">
                        <li>Nome: {{ $student->type }}</li>
                        <li>Idade: {{ $student->age }}</li>
                        <li>Data de nascimento: {{ $student->date_of_birth }}</li>
                    </ul>

                    <form action="{{ route('cursos.destroy', $student->id) }}" method="POST">
                        @csrf()
                        @method('delete')
                        <button class="bg-red-500 p-3 hover:bg-red-400 text-white" type="submit">
                            Deletar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
