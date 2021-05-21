<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolRequest extends FormRequest
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
        $kategori_id = (int) $this->get('kategori_id');
        $harga = 'numeric';

        if ($this->method() == 'PUT') {
            $alat = 'required|unique:tools,alat,' . $id;
            $slug = 'unique:tools,slug,' . $id;
            $kategori = 'required:tools,kategori_id,' . $kategori_id;
            $harga .= '|required';
            $stok = 'required';
        } else {
            $alat = 'required|unique:tools,alat';
            $slug = 'unique:tools,slug';
            $kategori = 'required:tools,kategori_id';
            $stok = 'required';
        }

        return [
            'alat' => $alat,
            'slug' => $slug,
            'kategori_id' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
        ];
    }
}
