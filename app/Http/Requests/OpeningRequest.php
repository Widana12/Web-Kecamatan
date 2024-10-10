<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpeningRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'opening_content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'opening_content.required' => 'Opening Konten Harus Diisi'
        ];
    }
}
