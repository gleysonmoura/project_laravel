<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Anotacao extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'titulo_anotacao' => 'required',
            'texto_anotacaco' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'required' => ':attribute é obrigatório'
        ];
    }
}
