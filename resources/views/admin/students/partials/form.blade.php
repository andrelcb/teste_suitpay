@csrf()
<input
    class="appearance-none block w-full placeholder-gray-300 bg-gray-500 text-gray-100 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-400 focus:border-gray-500"
    value="{{ $student->name ?? old('name') }}" type="text" placeholder="Digite o nome" name="name">

<input
    class="appearance-none block w-full placeholder-gray-300 bg-gray-500 text-gray-100 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-400 focus:border-gray-500"
    type="number" value="{{ $student->age ?? old('age') }}" placeholder="Digite a idade"
    name="age">
<input
    class="placeholder-gray-300 appearance-none block w-full bg-gray-500 text-gray-100 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-400 focus:border-gray-500"
    type="date" value="{{ $student->date_of_birth ?? old('date_of_birth') }}" 
    placeholder="Data de nascimento"
    name="date_of_birth">
<button
    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
    type="submit">
    Salvar
</button>
