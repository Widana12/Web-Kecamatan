<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:post_categories,name',
            'slug' => 'required|unique:post_categories,slug',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Kategori Harus Diisi',
            'name.unique' => 'Nama Kategori Sudah Digunakan',
            'slug.required' => 'Slug Kategori Harus Diisi',
            'slug.unique' => 'Slug Kategori Sudah Digunakan'
        ];
    }
}
