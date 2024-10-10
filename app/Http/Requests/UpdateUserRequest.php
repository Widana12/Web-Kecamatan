<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'slug' => 'required',
            'username' => ['required', Rule::unique('users', 'username')->ignore($this->user)],
            'password' => 'required|same:confirm_password',
            'last_login' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama Lengkap Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'username.unique' => 'Username Sudah Dipakai',
            'slug.required' => 'Slug Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'password.same' => 'Password dan Ulangi Password Tidak Sama'
        ];
    }
}
