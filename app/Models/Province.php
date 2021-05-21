<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'provinsi',
        'slug'
    ];

    public function location()
    {
        return $this->hasMany(Location::class, 'provinsi_id');
    }
}
