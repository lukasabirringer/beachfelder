<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;

class DashboardController extends Controller
{
    public function show()
    {
        $subs = Beachcourt::limit(5)->latest()->get();
        return view('backend.dashboard', compact('subs'));
    }
}
