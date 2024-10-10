<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'password' => 'required|same:confirm_password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama Lengkap Harus Diisi',
            'slug.required' => 'Slug Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'password.same' => 'Password dan Ulangi Password Tidak Sama'
        ];
    }
}
