<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col"
                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Nome do curso
                        </th>

                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Tipo de curso
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Quantidade maxima de alunos.
                        </th>
                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Data maxima de cadastro.
                        </th>
                        <th scope="col" class="relative py-3.5 px-4">
                            <span class="sr-only">Ver</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                    @foreach ($cursos->items() as $curso)
                        <tr>
                            <td class="px-4 py-2 text-sm font-medium whitespace-nowrap dark:text-white">
                                {{ $curso->name }}
                            </td>
                            <td class="px-12 py-2 text-sm font-medium whitespace-nowrap">
                                <x-types-curso :type="$curso->type"></x-types-curso>
                            </td>
                            <td class="px-4 py-2 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                {{ $curso->maximum_number__enrollments }}
                            </td>
                            <td class="px-4 py-2 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                {{ $curso->allowed_registration_date }}
                            </td>
                            <td class="px-4 py-2 text-sm whitespace-nowrap flex gap-2">
                                {{-- @can('owner', $curso->user_id) --}}
                                <a href="{{ route('cursos.edit', $curso->id) }}"
                                    class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                    Editar
                                </a>
                                {{-- @endcan --}}
                                <a href="{{ route('cursos.show', $curso->id) }}"
                                    class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                    Detalhes
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
