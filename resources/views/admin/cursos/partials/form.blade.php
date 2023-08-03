@csrf()
<input
    class="appearance-none block w-full bg-gray-500 text-gray-100 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-400 focus:border-gray-500"
    value="{{ $curso->name ?? old('name') }}" type="text" placeholder="Nome" name="name">

<select
    class="appearance-none block w-full bg-gray-500 text-gray-100 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-400 focus:border-gray-500"
    name="type" value="{{ $curso->type ?? old('name') }}">
    <option value="InPerson">Presencial</option>
    <option value="Online">On-line</option>
</select>
<input
    class="appearance-none block w-full bg-gray-500 text-gray-100 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-400 focus:border-gray-500"
    type="number" value="{{ $curso->maximum_number__enrollments ?? old('name') }}"
    placeholder="Número maximo de matriculas" name="maximum_number__enrollments">
<input
    class="appearance-none block w-full bg-gray-500 text-gray-100 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-400 focus:border-gray-500"
    type="date" value="{{ $curso->allowed_registration_date ?? old('name') }}" placeholder="Data até a matricula"
    name="allowed_registration_date">
<button
    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
    type="submit">
    Salvar
</button>
