<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lokasi',
        'slug',
        'id_provinsi',
        'kabupaten',
        'map',
        'deskripsi',
        'jalur_pendakian',
        'rute_termudah',
        'rute_normal'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'id_provinsi');
    }

    public function locationImages()
    {
        return $this->hasMany(LocationImage::class, 'id_lokasi')->orderBy('id', 'ASC');
    }
}
