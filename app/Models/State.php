<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states'; // اسم الجدول

    protected $fillable = [
        'country_id',
        'name_ar',
        'name_en',
        'created_at',
        'updated_at'
    ];

    // علاقة مع الدولة (اختياري لتحسين الأكواد لاحقاً)
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
