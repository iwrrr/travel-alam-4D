<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
        $id_provinsi = (int) $this->get('id_provinsi');
        $deskripsi = '';
        $jalur_pendakian = '';
        $rute_termudah = '';
        $rute_normal = '';

        if ($this->method() == 'PUT') {
            $nama_lokasi = 'required|unique:locations,nama_lokasi,' . $id;
            $slug = 'unique:locations,slug,' . $id;
            $provinsi = 'required:locations,id_provinsi,' . $id_provinsi;
            $deskripsi = 'required';
            $jalur_pendakian = '|required';
            $rute_termudah = '|required';
            $rute_normal = '|required';
        } else {
            $nama_lokasi = 'required|unique:locations,nama_lokasi';
            $slug = 'unique:locations,slug';
            $provinsi = 'required:locations,id_provinsi';
        }

        return [
            'nama_lokasi' => $nama_lokasi,
            'slug' => $slug,
            'id_provinsi' => $provinsi,
            'deskripsi' => $deskripsi,
            'jalur_pendakian' => $jalur_pendakian,
            'rute_termudah' => $rute_termudah,
            'rute_normal' => $rute_normal,
        ];
    }
}
