<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function location()
    {
        return $this->hasMany(Location::class, 'tour_id');
    }
}
