<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiamValueRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'token' => 'nullable',
            'name' => 'required',
            'content' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Harus Diisi'
        ];
    }
}
