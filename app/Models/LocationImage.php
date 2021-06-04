<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lokasi',
        'path',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'id_lokasi');
    }
}
