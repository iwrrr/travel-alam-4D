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
            $provinsi = 'required|unique:provinces,provinsi,' . $id;
            $slug = 'unique:provinces,slug,' . $id;
        } else {
            $provinsi = 'required|unique:provinces,provinsi';
            $slug = 'unique:provinces,slug';
        }

        return [
            'provinsi' => $provinsi,
            'slug' => $slug
        ];
    }
}
