<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'alat',
        'slug',
        'kategori_id',
        'harga',
        'stok'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
