<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('post_categories', 'name')->ignore($this->category)],
            'slug' => ['required', Rule::unique('post_categories', 'slug')->ignore($this->category)],
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
