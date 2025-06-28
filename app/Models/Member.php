<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // 👇 تحديد اسم الجدول صراحة
    protected $table = 'members';

    // 👇 الحقول القابلة للملء
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'age',
        'country',
        'marriage_type',
        'is_premium',
        'photo',
    ];

    // 👇 إخفاء الحقول الحساسة عند التحويل إلى JSON
    protected $hidden = [
        'password',
    ];
}
