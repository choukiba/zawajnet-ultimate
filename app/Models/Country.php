<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
