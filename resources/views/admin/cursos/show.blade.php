<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes do curso: {{ $curso->name }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="flex items-center justify-between p-4">
                    <ul class="list-none hover:list-disc text-gray-200">
                        <li>Tipo do curso: <x-types-curso :type="$curso->type"></x-types-curso></li>
                        <li>Quantidade maxima de cadastro: {{ $curso->maximum_number__enrollments }}</li>
                        <li>Data maxima de cadastro: {{ $curso->allowed_registration_date }}</li>
                    </ul>

                    <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
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
