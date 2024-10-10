<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('roles', 'name')->ignore($this->role)]
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
