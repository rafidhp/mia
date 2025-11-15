<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class Umkm extends Model
{
    use HasFactory;
    protected $table = 'umkms';
    protected $fillable = [
        'user_id',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'umkm_picture',
        'description',
        'type',
        'gmaps_link',
        'latitude',
        'longitude',
        'address',
        'phone_number',
        'open_days',
        'open_time',
        'close_time',
        'image',
        'average_rating',
        'is_open_for_collaboration'
    ];

    // ! relations
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function province() {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function district() {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function village() {
        return $this->belongsTo(Village::class, 'village_id');
    }

    // ! relations from other tables
    public function umkmRoute() {
        return $this->hasMany(UmkmRoute::class);
    }

    public function umkmCategory() {
        return $this->hasMany(UmkmCategory::class, 'umkm_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class, 
            'umkm_categories', 
            'umkm_id', 
            'category_id'
        );
    }

    public function promo() {
        return $this->hasMany(Promo::class);
    }

    public function review() {
        return $this->hasOne(Review::class);
    }

    public function collaborationsRequested() {
        return $this->hasMany(Collaboration::class, 'requester_umkm');
    }

    public function collaborationsReceived() {
        return $this->hasMany(Collaboration::class, 'partner_umkm');
    }

    public function post() {
        return $this->hasOne(Post::class);
    }
}
