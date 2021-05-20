<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'slug'
    ];

    public function category()
    {
        return $this->hasMany(Category::class, 'kategori_id');
    }
}
