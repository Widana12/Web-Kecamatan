<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users',
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
            'slug' => 'Slug Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'password.same' => 'Password dan Ulangi Password Tidak Sama'
        ];
    }
}
