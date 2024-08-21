<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'name' => ['required',  'min:3', 'max:255'],
        ];
    }

    // public function messages()
    // {
    //Traduzindo as mensagens de erro:
    // return [
    //     'nome.required' => 'O campo nome é obrigatório.',
    //     'nome.min' => 'O campo nome deve ter pelo menos :min caracteres.',
    //     'nome.max' => 'O campo nome deve ter no máximo :max caracteres.',
    // ];
    // }
}
