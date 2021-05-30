<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi',
        'slug',
        'wisata_id',
        'provinsi_id',
        'deskripsi',
        'jenis',
        'jalur_pendakian',
        'rute_termudah',
        'rute_normal'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'wisata_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi_id');
    }

    public function locationImages()
    {
        return $this->hasMany(LocationImage::class)->orderBy('id', 'ASC');
    }

    public static function types()
    {
        return [
            'pegunungan' => 'Pegunungan',
            'non-pegunungan' => 'Non-Pegunungan'
        ];
    }
}
