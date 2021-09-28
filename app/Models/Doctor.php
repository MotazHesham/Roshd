<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    public $table = 'doctors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'years_experience',
        'user_id',
        'specialization_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
