<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateCursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:3|max:255|unique:cursos',
            'type' => 'required',
            'maximum_number__enrollments' => 'required|int',
            'allowed_registration_date' => 'required',
        ];

        if ($this->method() === 'PUT') {
            $rules['name'] = [
                "required",
                "min:3",
                "max:255",
                Rule::unique('cursos')->ignore($this->curso ?? $this->id),
            ];
        }

        return $rules;
    }
}
