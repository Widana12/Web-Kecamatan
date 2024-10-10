<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:roles'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Role Harus Diisi',
            'name.unique' => 'Nama Role Sudah Dipakai'
        ];
    }
}
