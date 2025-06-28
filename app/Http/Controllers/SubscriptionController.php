<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        return redirect()->back()->with('success', 'تم الاشتراك بنجاح، شكرًا لك!');
    }
}
