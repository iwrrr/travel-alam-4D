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
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function toolImages()
    {
        return $this->hasMany('App\Models\ToolImage')->orderBy('id', 'DESC');
    }
}
