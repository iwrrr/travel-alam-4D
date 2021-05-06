<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'wisata_id',
        'provinsi_id'
    ];

    public function tours()
    {
        return $this->belongsTo(Tour::class);
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }
}
