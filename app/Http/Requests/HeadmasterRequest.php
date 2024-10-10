<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeadmasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'headmaster_name' => 'required',
            'headmaster_content' => 'required',
            'headmaster_image' => 'image|mimes:jpg,jpeg,png,bmp,tiff'
        ];
    }

    public function messages()
    {
        return [
            'headmaster_name.required' => 'Nama Kepala Sekolah Harus Diisi',
            'headmaster_content.required' => 'Isi Sambutan Harus Diisi',
            'headmaster_image.image' => 'Foto Kepala Sekolah Harus Berupa Gambar',
            'headmaster_image.mimes' => 'Foto Kepala Sekolah Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF'
        ];
    }
}
