<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{

    public $table = 'group_student';

    public const STATUS_SELECT = [
        'requested'    => 'طلب انضمام',
        'accepted'    => 'مقبول',
        'refused' => 'مرفوض',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'group_id',
        'student_id',
        'status',
        'course_cost',
        'created_at',
        'updated_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function payments(){
        return $this->morphMany('App\Models\Payment','paymentable');
    }
    public function frontend_delatable(){
        // if found any paid payments return false so he cant delete the reservation
        return $this->payments()->where('payment_status','paid')->first() ? false : true;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
