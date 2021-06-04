<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peralatan',
        'slug',
        'harga_peralatan',
    ];

    /**
     * Define relationship with the ToolImage
     *
     * @return void
     */
    public function toolImages()
    {
        return $this->hasMany(ToolImage::class, 'id_peralatan')->orderBy('id', 'DESC');
    }

    /**
     * Define relationship with the OrderItem
     *
     * @return void
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_peralatan');
    }
}
