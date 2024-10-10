<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
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
            'sub_name' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,tiff'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Lengkap Harus Diisi',
            'sub_name.required' => 'Sub Nama Harus Diisi',
            'content.required' => 'Isi Testimoni Harus Diisi',
            'image.required' => 'Foto Harus Diisi',
            'image.image' => 'Foto Harus Berupa Gambar',
            'image.mimes' => 'Foto Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF'
        ];
    }
}
