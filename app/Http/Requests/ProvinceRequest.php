<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvinceRequest extends FormRequest
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
            $nama_provinsi = 'required|unique:provinces,nama_provinsi,' . $id;
            $slug = 'unique:provinces,slug,' . $id;
        } else {
            $nama_provinsi = 'required|unique:provinces,nama_provinsi';
            $slug = 'unique:provinces,slug';
        }

        return [
            'nama_provinsi' => $nama_provinsi,
            'slug' => $slug
        ];
    }
}
