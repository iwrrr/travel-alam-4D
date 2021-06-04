<?php

namespace App\Models;

use App\Helpers\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengguna',
        'nama_depan',
        'nama_belakang',
        'email_pelanggan',
        'no_telepon',
        'kode',
        'status',
        'tanggal_pemesanan',
        'batas_pembayaran',
        'status_pembayaran',
        'provinsi',
        'lokasi',
        'tanggal',
        'hari',
        'subtotal',
        'total',
        'diterima_oleh',
        'diterima_pada',
        'ditolak_oleh',
        'ditolak_pada',
        'ditolak_pada',
        'pesan_ditolak'
    ];

    public const CREATED = 'created';
    public const CONFIRMED = 'confirmed';
    public const COMPLETED = 'completed';
    public const CANCELLED = 'cancelled';

    public const ORDERCODE = 'TA';

    public const PAID = 'paid';
    public const UNPAID = 'unpaid';

    /**
     * Define relationship with the User
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    /**
     * Define relationship with the User
     *
     * @return void
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_pesanan');
    }

    /**
     * Generate order code
     *
     * @return string
     */
    public static function generateCode()
    {
        $dateCode = self::ORDERCODE . '/' . date('Ymd') . '/' . General::integerToRoman(date('m')) . '/' . General::integerToRoman(date('d')) . '/';

        $lastOrder = self::select([DB::raw('MAX(orders.kode) AS last_code')])
            ->where('kode', 'like', $dateCode . '%')
            ->first();

        $lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;

        $orderCode = $dateCode . '00001';
        if ($lastOrderCode) {
            $lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
            $nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);

            $orderCode = $dateCode . $nextOrderNumber;
        }

        if (self::_isOrderCodeExists($orderCode)) {
            return generateOrderCode();
        }

        return $orderCode;
    }

    /**
     * Check if the generated order code is exists
     *
     * @param string $orderCode order code
     *
     * @return void
     */
    private static function _isOrderCodeExists($orderCode)
    {
        return Order::where('kode', '=', $orderCode)->exists();
    }

    public function isPaid()
    {
        return $this->status_pembayaran == self::PAID;
    }
}
