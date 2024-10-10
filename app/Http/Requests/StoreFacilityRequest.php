<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacilityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'token' => 'nullable',
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,tiff'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Nama Fasilitas Harus Diisi',
            'image.required' => 'Foto Harus Diisi',
            'image.image' => 'Foto Harus Berupa Gambar',
            'image.mimes' => 'Foto Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF'
        ];
    }
}
