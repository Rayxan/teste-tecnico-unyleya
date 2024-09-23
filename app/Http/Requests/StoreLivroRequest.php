<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivroRequest extends FormRequest
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
            'titulo' => ['required', 'unique:livros,titulo'],
            'ano_lancamento' => 'required',
            'fk_autor' => 'required',
            'fk_editora' => 'required',
            'fk_genero' => 'required',
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
            'titulo.required' => 'O campo Título é obrigatório.',
            'titulo.unique' => 'Este titulo já está cadastrado no sistema.',
            'ano_lancamento.required' => 'O campo Ano Lançamento é obrigatório.',
            'fk_autor.required' => 'O campo Autor é obrigatório.',
            'fk_editora.required' => 'O campo Editora é obrigatório.',
            'fk_genero.required' => 'O campo Gênero é obrigatório.',
        ];
    }
}
