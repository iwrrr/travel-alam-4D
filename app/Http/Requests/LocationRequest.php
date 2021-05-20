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
        $wisata_id = (int) $this->get('wisata_id');
        $provinsi_id = (int) $this->get('provinsi_id');
        $deskripsi = '';
        $jenis = '';
        $jalur_pendakian = '';
        $rute_termudah = '';
        $rute_normal = '';

        if ($this->method() == 'PUT') {
            $lokasi = 'required|unique:locations,lokasi,' . $id;
            $slug = 'unique:locations,slug,' . $id;
            $wisata = 'required:locations,wisata_id,' . $wisata_id;
            $provinsi = 'required:locations,provinsi_id,' . $provinsi_id;
            $deskripsi = 'required';
            $jenis = 'required';

            if ($this->get('jenis') == 'pegunungan') {
                $jalur_pendakian = '|required';
                $rute_termudah = '|required';
                $rute_normal = '|required';
            }
        } else {
            $lokasi = 'required|unique:locations,lokasi';
            $slug = 'unique:locations,slug';
            $wisata = 'required:locations,wisata_id';
            $provinsi = 'required:locations,provinsi_id';
            $jenis = 'required';
        }

        return [
            'lokasi' => $lokasi,
            'slug' => $slug,
            'wisata_id' => $wisata,
            'provinsi_id' => $provinsi,
            'deskripsi' => $deskripsi,
            'jenis' => $jenis,
            'jalur_pendakian' => $jalur_pendakian,
            'rute_termudah' => $rute_termudah,
            'rute_normal' => $rute_normal,
        ];
    }
}
