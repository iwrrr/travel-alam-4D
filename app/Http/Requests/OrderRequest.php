<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $rules = [
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'email_pelanggan' => 'required|string|email',
            'no_telepon' => 'required|string',
            'provinsi' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
        ];

        return $rules;
    }
}
