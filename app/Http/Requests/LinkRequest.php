<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'web_link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Link Harus Diisi',
            'web_link.required' => 'Link Tujuan Harus Diisi'
        ];
    }
}
