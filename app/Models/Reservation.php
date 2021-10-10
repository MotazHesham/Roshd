<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    public const PAYMENT_STATUS_SELECT = [
        'not_paid' => 'لم يتم السداد',
        'paid'     => 'تم السداد',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'bank'    => 'تحويل بنكي',
        'cash'    => 'نقدي',
        'package' => 'باقة',
    ];

    public const STATUSE_SELECT = [
        'attended'  => 'تم الحضور',
        'pending'   => 'قيد الإنتظار',
        'cancelled' => 'تم الإلغاء',
        'postponed' => 'تم التأجيل',
    ];

    public $table = 'reservations';

    protected $dates = [
        'reservation_date',
        'reservation_time',
        'delay_date',
        'delay_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reservation_date',
        'reservation_time',
        'statuse',
        'delay_date',
        'delay_time',
        'cancel_reason',
        'cost',
        'condation',
        'user_id',
        'doctor_id',
        'clinic_id',
        'notes',
        'payment_status',
        'payment_type',
        'transfer_name',
        'reference_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getReservationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setReservationDateAttribute($value)
    {
        $this->attributes['reservation_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDelayDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDelayDateAttribute($value)
    {
        $this->attributes['delay_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getReservationTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.time_format')) : null;
    }

    public function setReservationTimeAttribute($value)
    {
        $this->attributes['reservation_time'] = $value ? Carbon::createFromFormat(config('panel.time_format'), $value)->format('H:i:s') : null;
    }

    public function getDelayTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.time_format')) : null;
    }

    public function setDelayTimeAttribute($value)
    {
        $this->attributes['delay_time'] = $value ? Carbon::createFromFormat(config('panel.time_format'), $value)->format('H:i:s') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
