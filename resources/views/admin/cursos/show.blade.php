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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 my-5">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-4">
                    Matricular aluno
                </h2>
                <form action="{{ route('registration.store') }} " method="POST">
                    @csrf()
                    <input type="hidden" name="cursos_id" value="{{ $curso->id }}">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-20 p-4">
                        <select required
                            class="appearance-none placeholder-gray-300 block w-full bg-gray-500 text-gray-100 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-400 focus:border-gray-500"
                            name="students_id" id="">
                            <option value="">Selecione um aluno</option>
                            @foreach ($students as $student)
                                <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
                            @endforeach
                        </select>
                        <button class="bg-green-500 p-3 hover:bg-green-400 text-white" type="submit">
                            Matricular
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 my-5">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-4">
                    Alunos matriculados
                </h2>

                @include('admin.cursos.partials.students_registration')
            </div>
        </div>
</x-app-layout>
