<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreatePlano extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome_plano' => 'required',
            'data_plano' => 'required',
            'status_plano' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute é obrigatório'
        ];
    }
}
