<div class="flex flex-col mt-6 my-4">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
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
                                {{-- <td class="px-4 py-2 text-sm whitespace-nowrap">
                                <div class="flex items-center">
                                    @foreach ($curso->replies as $reply)
                                        @if ($loop->index < 4)
                                            <div class="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0 bg-green-500">{{ getInitials($reply['user']['name']) }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </td> --}}

                                <td class="px-4 py-2 text-sm whitespace-nowrap flex">
                                    {{-- @can('owner', $curso->user_id) --}}
                                    <a href="{{ route('cursos.edit', $curso->id) }}"
                                        class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                        Editar
                                    </a>
                                    {{-- @endcan --}}
                                    <a href="{{ route('cursos.show', $curso->id) }}"
                                        class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
