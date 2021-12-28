<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pesanan',
        'id_peralatan',
        'nama_peralatan',
        'harga_peralatan',
        'jumlah',
        'subtotal'
    ];

    /**
     * Define relationship with the Tool
     *
     * @return void
     */
    public function tool()
    {
        return $this->belongsTo(Tool::class, 'id_peralatan');
    }

    /**
     * Define relationship with the Tool
     *
     * @return void
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_pesanan');
    }
}
