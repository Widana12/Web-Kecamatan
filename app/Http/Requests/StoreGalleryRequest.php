<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:galleries',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,tiff',
            'create_by' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Nama Kategori Galeri Foto Harus Diisi',
            'title.required' => 'Judul Galeri Foto Harus Diisi',
            'slug.required' => 'Slug Galeri Foto Harus Diisi',
            'slug.unique' => 'Slug Galeri Foto Sudah Digunakan',
            'image.required' => 'Gambar Utama Harus Diisi',
            'image.image' => 'Gambar Utama Harus Berupa Gambar',
            'image.mimes' => 'Gambar Utama Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'create_by.required' => 'Pembuat Galeri Foto Harus Diisi'
        ];
    }
}
