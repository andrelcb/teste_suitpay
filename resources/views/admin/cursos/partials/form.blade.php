@csrf()
<input value="{{ $curso->name ?? old('name') }}" type="text" placeholder="Nome" name="name">
<select name="type" value="{{ $curso->type ?? old('name') }}">
    <option value="InPerson">Presencial</option>
    <option value="Online">On-line</option>
</select>
<input type="number" value="{{ $curso->maximum_number__enrollments ?? old('name') }}"
    placeholder="Número maximo de matriculas" name="maximum_number__enrollments">
<input type="date" value="{{ $curso->allowed_registration_date ?? old('name') }}" placeholder="Data até a matricula"
    name="allowed_registration_date">
<button type="submit">
    Salvar
</button>
