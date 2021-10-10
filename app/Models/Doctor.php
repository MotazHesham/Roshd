<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Doctor extends Model
{
    use SoftDeletes;

    public const WORK_DAYS_SELECT = [
        [
            'day_ar' => 'الأحد',
            'day' => 'Sun',
            'value' => null,
            'start_time' => null,
            'end_time' => null,
        ],
        [
            'day_ar' => 'الأثنين',
            'day' => 'Mon',
            'value' => null,
            'start_time' => null,
            'end_time' => null,
        ],
        [
            'day_ar' => 'الثلاثاء',
            'day' => 'Tue',
            'value' => null,
            'start_time' => null,
            'end_time' => null,
        ],
        [
            'day_ar' => 'الأربعاء',
            'day' => 'Wed',
            'value' => null,
            'start_time' => null,
            'end_time' => null,
        ],
        [
            'day_ar' => 'الخميس',
            'day' => 'Thu',
            'value' => null,
            'start_time' => null,
            'end_time' => null,
        ],
        [
            'day_ar' => 'الجمعة',
            'day' => 'Fri',
            'value' => null,
            'start_time' => null,
            'end_time' => null,
        ],
        [
            'day_ar' => 'السبت',
            'day' => 'Sat',
            'value' => null,
            'start_time' => null,
            'end_time' => null,
        ],
    ];

    public $table = 'doctors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'years_experience',
        'cost',
        'user_id',
        'specialization_id',   
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.time_format')) : null;
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat(config('panel.time_format'), $value)->format('H:i:s') : null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.time_format')) : null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat(config('panel.time_format'), $value)->format('H:i:s') : null;
    }

    public function doctorSalaryContracts()
    {
        return $this->hasMany(SalaryContract::class, 'doctor_id', 'id');
    }

    public function doctorPrecentageContracts()
    {
        return $this->hasMany(PrecentageContract::class, 'doctor_id', 'id');
    }

    public function doctorExperiences()
    {
        return $this->hasMany(Experience::class, 'doctor_id', 'id');
    }

    public function doctorEducation()
    {
        return $this->hasMany(Education::class, 'doctor_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class,'doctor_clinic')->withPivot(['day','start_time','end_time']);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

