<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;

class Payment extends Model
{

    use Auditable;

    public $table = 'payments';

    public const PAYMENT_STATUS_SELECT = [
        'not_paid' => 'لم يتم التأكيد بعد',
        'paid'     => 'تم السداد',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'bank'    => 'تحويل بنكي',
        'cash'    => 'نقدي',
        'package' => 'باقة',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'paymentable_type',
        'paymentable_id',
        'payment_status',
        'payment_type',
        'amount',
        'transfer_name',
        'reference_number',
        'last_4_digits',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . ' ' .  config('panel.time_format')) : null;
    }

    public function paymentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
