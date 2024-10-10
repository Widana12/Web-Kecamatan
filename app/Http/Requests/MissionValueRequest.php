<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionValueRequest extends FormRequest
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
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Harus Diisi',
            'content.required' => 'Deskripsi Harus Diisi'
        ];
    }
}
