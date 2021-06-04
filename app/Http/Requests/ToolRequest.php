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
        $harga_peralatan = 'numeric';

        if ($this->method() == 'PUT') {
            $nama_peralatan = 'required|unique:tools,nama_peralatan,' . $id;
            $slug = 'unique:tools,slug,' . $id;
            $harga_peralatan .= '|required';
        } else {
            $nama_peralatan = 'required|unique:tools,nama_peralatan';
            $slug = 'unique:tools,slug';
        }

        return [
            'nama_peralatan' => $nama_peralatan,
            'slug' => $slug,
            'harga_peralatan' => $harga_peralatan,
        ];
    }
}
