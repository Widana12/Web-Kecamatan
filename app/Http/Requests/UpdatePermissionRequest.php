<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('permissions', 'name')->ignore($this->permission)]
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
