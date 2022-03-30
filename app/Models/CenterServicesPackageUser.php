<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class CenterServicesPackageUser extends Model
{

    public $table = 'center_services_package_user';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'user_id',
        'center_services_package_id',
        'sessions',
        'free_sessions',
        'remaining_sessions',
        'remaining_free_sessions',
        'package_value',
        'created_at',
        'updated_at',
    ];

    public function payments(){
        return $this->morphMany('App\Models\Payment','paymentable');
    }

    public function calculate_payments(){
        return $this->payments()->where('payment_status','paid')->sum('amount');
    }

    public function package(){
        return $this->belongsTo(CenterServicesPackage::class,'center_services_package_id');
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
