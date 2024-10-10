<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolAboutRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'content' => 'required',
            'background' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'image' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Harus Diisi',
            'content' => 'Konten Harus Diisi',
            'background.image' => 'Background Harus Berupa Gambar',
            'background.mimes' => 'Background Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'image.image' => 'Foto Harus Berupa Gambar',
            'image.mimes' => 'Foto Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF'
        ];
    }
}
