<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAutorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'regex:/^[^\d]+$/'],
            'ano_nascimento' => 'required',
            'sexo' => 'required',
            'nacionalidade' => 'required',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.regex' => 'O campo Nome não pode conter números.',
            'ano_nascimento.required' => 'O campo Ano Nascimento é obrigatório.',
            'sexo.required' => 'O campo Sexo é obrigatório.',
            'nacionalidade.required' => 'O campo Nacionalidade é obrigatório.',
        ];
    }
}