<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'header_logo_white' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'header_logo_black' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'psb_name' => 'required',
            'psb_link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'header_logo_white.image' => '[Header] Logo Versi Putih Harus Berupa Gambar',
            'header_logo_white.mimes' => '[Header] Logo Versi Putih Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'header_logo_black.image' => '[Header] Logo Versi Hitam Harus Berupa Gambar',
            'header_logo_black.mimes' => '[Header] Logo Versi Hitam Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'psb_name.required' => 'PSB Tombol Harus Diisi',
            'psb_link.required' => 'PSB Tombol Link Harus Diisi'
        ];
    }
}
