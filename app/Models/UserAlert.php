<?php

namespace App\Models;

use Carbon\Carbon;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class UserAlert extends Model
{
    public $table = 'user_alerts';

    public const TYPE_SELECT = [
        'personal'   => '',
        'reservation'  => '',
        'patient_package' => '',
        'student_group' => '',
        'payment' => '',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'alert_text',
        'alert_link',
        'type',
        'seen',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format') . ' ' .  config('panel.time_format')) : null;
    }
}
