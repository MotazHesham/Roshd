<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Setting extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $table = 'settings';

    protected $appends = [
        'logo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'site_name',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'you_tube',
        'about_rosd',
        'familly_advice',
        'individual_advice',
        'el_gadaly_elsloky',
        'el_maarefe_elsloky',
        'art_therapy',
        'play_therapy',
        'message',
        'vision',
        'services',
        'why',
        'income_category_reservation_id',
        'income_category_package_id',
        'income_category_group_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function income_category_reservation()
    {
        return $this->belongsTo(IncomeCategory::class, 'income_category_reservation_id');
    }

    public function income_category_package()
    {
        return $this->belongsTo(IncomeCategory::class, 'income_category_package_id');
    }

    public function income_category_group()
    {
        return $this->belongsTo(IncomeCategory::class, 'income_category_group_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
