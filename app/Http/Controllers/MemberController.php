<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.profile', compact('member'));
    }
}
