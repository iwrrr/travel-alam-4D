<?php

namespace App\Models;

use App\Helpers\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pesanan',
        'nomor',
        'id_transaksi',
        'jumlah_pembayaran',
        'metode',
        'status',
        'token',
        'payloads',
        'jenis_pembayaran',
        'nomor_va',
        'nama_vendor',
        'kode_tagihan',
        'bill_key',
    ];

    public const PAYMENT_CHANNELS = [
        'credit_card',
        'mandiri_clickpay',
        'bca_klikbca',
        'bca_klikpay',
        'bri_epay',
        'bca_va',
        'bni_va',
        'gopay',
        'indomaret',
    ];

    public const EXPIRY_DURATION = 1;
    public const EXPIRY_UNIT = 'days';

    public const CHALLENGE = 'challenge';
    public const SUCCESS = 'success';
    public const SETTLEMENT = 'settlement';
    public const PENDING = 'pending';
    public const DENY = 'deny';
    public const EXPIRE = 'expire';
    public const CANCEL = 'cancel';

    public const PAYMENTCODE = 'PAY';

    /**
     * Generate order code
     *
     * @return string
     */
    public static function generateCode()
    {
        $dateCode = self::PAYMENTCODE . '/' . date('Ymd') . '/' . General::integerToRoman(date('m')) . '/' . General::integerToRoman(date('d')) . '/';

        $lastOrder = self::select([\DB::raw('MAX(payments.nomor) AS last_code')])
            ->where('nomor', 'like', $dateCode . '%')
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
        return self::where('nomor', '=', $orderCode)->exists();
    }
}
