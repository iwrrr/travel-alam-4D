<?php

namespace App\Models;

use App\Helpers\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, SoftDeletes;

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
        'dibatalkan_oleh',
        'dibatalkan_pada',
        'dibatalkan_pada',
        'pesan_dibatalkan'
    ];

    public const CREATED = 'Dibuat';
    public const CONFIRMED = 'Diterima';
    public const COMPLETED = 'Selesai';
    public const CANCELLED = 'Dibatalkan';

    public const ORDERCODE = 'TA';

    public const PAID = 'Dibayar';
    public const UNPAID = 'Belum dibayar';

    public const STATUSES = [
        self::CREATED => 'Dibuat',
        self::CONFIRMED => 'Diterima',
        self::COMPLETED => 'Selesai',
        self::CANCELLED => 'Dibatalkan',
    ];

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
     * Define scope forUser
     *
     * @param Eloquent $query query builder
     * @param User     $user  limit
     *
     * @return void
     */
    public function scopeForUser($query, $user)
    {
        return $query->where('id_pengguna', $user->id);
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

    /**
     * Check order is paid or not
     *
     * @return boolean
     */
    public function isPaid()
    {
        return $this->status_pembayaran == self::PAID;
    }

    /**
     * Check order is created
     *
     * @return boolean
     */
    public function isCreated()
    {
        return $this->status == self::CREATED;
    }

    /**
     * Check order is confirmed
     *
     * @return boolean
     */
    public function isConfirmed()
    {
        return $this->status == self::CONFIRMED;
    }

    /**
     * Check order is completed
     *
     * @return boolean
     */
    public function isCompleted()
    {
        return $this->status == self::COMPLETED;
    }

    /**
     * Check order is cancelled
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return $this->status == self::CANCELLED;
    }
}
