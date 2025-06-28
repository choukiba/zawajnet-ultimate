<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class HomeController extends Controller
{
    /**
     * عرض الصفحة الرئيسية مع الأعضاء المميزين.
     */
    public function index()
    {
        $members = Member::inRandomOrder()->take(8)->get();
        return view('welcome', compact('members'));
    }

    /**
     * عرض لوحة التحكم للمستخدم.
     */
    public function dashboard()
    {
        $user = auth()->user();
        return view('dashboard', compact('user'));
    }
}
