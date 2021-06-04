<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_provinsi',
        'slug'
    ];

    public function location()
    {
        return $this->hasMany(Location::class, 'id_provinsi');
    }
}
