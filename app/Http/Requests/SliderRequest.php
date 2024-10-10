<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'sub_title1' => 'required',
            'sub_title2' => 'required',
            'button_name' => 'required',
            'button_link' => 'required',
            'background' => 'image|mimes:jpg,jpeg,png,bmp,tiff'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul Slider Harus Diisi',
            'sub_title1.required' => 'Sub Judul Slider Harus Diisi',
            'sub_title2.required' => 'Sub Judul Slider Harus Diisi',
            'button_name.required' => 'Nama Tombol Harus Diisi',
            'button_link.required' => 'Link Tombol Harus Diisi',
            'background.image' => 'Background Harus Berupa Gambar',
            'background.mimes' => 'Background Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF'
        ];
    }
}
