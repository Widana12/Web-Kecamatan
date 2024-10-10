<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSchoolActivityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('school_activities', 'slug')->ignore($this->school_activity)],
            'sub_name' => 'required',
            'background' => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul Kegiatan Sekolah Harus Diisi',
            'slug.required' => 'Slug Kegiatan Sekolah Harus Diisi',
            'slug.unique' => 'Slug Kegiatan Sekolah Sudah Digunakan',
            'sub_name.required' => 'Sub Judul Kegiatan Sekolah Harus Diisi',
            'background.image' => 'Background Harus Berupa Gambar',
            'background.mimes' => 'Background Harus Berekstensi JPG/JPEG/PNG/BMP/TIFF',
            'content.required' => 'Konten Kegiatan Sekolah Harus Diisi'
        ];
    }
}
