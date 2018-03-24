<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use DB;
use Auth;

class HomepageController extends Controller
{
    public function show()
    {
        $beachcourts = Beachcourt::where('submitState', 'approved')->limit(3)->get();

        return view('frontend.homepage', compact('beachcourts'));
    }
}
