<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:permissions'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Permission Harus Diisi',
            'name.unique' => 'Nama Permission Sudah Dipakai'
        ];
    }
}
