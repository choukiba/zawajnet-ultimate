<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'country_id',
        'city_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // العلاقة مع الدولة
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // العلاقة مع المدينة
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

