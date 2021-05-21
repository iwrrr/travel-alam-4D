<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = (int) $this->get('id');

        if ($this->method() == 'PUT') {
            $kategori = 'required|unique:categories,kategori,' . $id;
            $slug = 'unique:categories,slug,' . $id;
        }

        $kategori = 'required|unique:categories,kategori';
        $slug = 'unique:categories,slug';

        return [
            'kategori' => $kategori,
            'slug' => $slug
        ];
    }
}
