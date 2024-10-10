<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($this->post)],
            'image' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'content' => 'required',
            'create_by' => 'required',
            'isPublish' => 'nullable',
            'publish_by' => 'nullable',
            'publish_at' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Nama Kategori Berita / Artikel Harus Diisi',
            'title.required' => 'Judul Berita / Artikel Harus Diisi',
            'slug.required' => 'Slug Berita / Artikel Harus Diisi',
            'slug.unique' => 'Slug Berita / Artikel Sudah Digunakan',
            'image.image' => 'Gambar Utama Harus Berupa Gambar',
            'image.mimes' => 'Gambar Utama Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'content.required' => 'Konten Berita / Artikel Harus Diisi',
            'create_by.required' => 'Pembuat Berita / Artikel Harus Diisi',
        ];
    }
}
