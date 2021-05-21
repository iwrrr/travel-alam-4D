<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            $wisata = 'required|unique:tours,wisata,' . $id;
            $slug = 'unique:tours,slug,' . $id;
        } else {
            $wisata = 'required|unique:tours,wisata';
            $slug = 'unique:tours,slug';
        }

        return [
            'wisata' => $wisata,
            'slug' => $slug
        ];
    }
}
