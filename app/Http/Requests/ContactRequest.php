<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'background' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'address' => 'required',
            'address_link' => 'required',
            'email' => 'required',
            'phone1' => 'required',
            'phone2' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'background.image' => 'Background Harus Berupa Gambar',
            'background.mimes' => 'Background Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'address.required' => 'Alamat Sekolah Harus Diisi',
            'address_link.required' => 'Link Alamat Sekolah Harus Diisi',
            'email.required' => 'Email Sekolah Harus Diisi',
            'phone1.required' => 'Nomor Telepon Sekolah Harus Diisi',
            'phone2.required' => 'Nomor Handphone Sekolah Harus Diisi'
        ];
    }
}
