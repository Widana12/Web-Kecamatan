<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'footer_logo' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'footer_content' => 'required',
            'facebook_link' => 'required',
            'instagram_link' => 'required',
            'youtube_link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'footer_logo.image' => '[Footer] Logo Harus Berupa Gambar',
            'footer_logo.mimes' => '[Footer] Logo Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'footer_content.required' => '[Footer] Konten Harus Diisi',
            'facebook_link.required' => 'Link Facebook Harus Diisi',
            'instagram_link.required' => 'Link Facebook Harus Diisi',
            'youtube_link.required' => 'Link Facebook Harus Diisi'
        ];
    }
}
