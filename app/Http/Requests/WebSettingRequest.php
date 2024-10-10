<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_author' => 'required',
            'modal_active' => 'required',
            'modal_link' => 'required',
            'modal_image' => 'image|mimes:jpg,jpeg,png,bmp,tiff'
        ];
    }

    public function messages()
    {
        return [
            'meta_description.required' => 'Meta Description Harus Diisi',
            'meta_keywords.required' => 'Meta Keywords Harus Diisi',
            'meta_author.required' => 'Meta Author Harus Diisi',
            'modal_active.required' => 'Modal Aktif Harus Diisi',
            'modal_link.required' => 'Modal Link Harus Diisi',
            'modal_image.image' => 'Modal Image Harus Berupa Gambar',
            'modal_image.mimes' => 'Modal Image Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF'
        ];
    }
}
