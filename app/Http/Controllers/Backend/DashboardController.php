<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use App\User;

class DashboardController extends Controller
{
    public function show()
    {
        $subs = Beachcourt::limit(5)->latest()->get();
        $users = User::limit(5)->latest()->get();

        return view('backend.dashboard', compact('subs', 'users'));
    }
}
