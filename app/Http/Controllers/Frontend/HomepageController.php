<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use DB;
use Auth;
use App\Page;

class HomepageController extends Controller
{
    public function show()
    {
        $beachcourts = Beachcourt::where('submitState', 'approved')->orderBy('created_at', 'desc')->limit(5)->get();

        return view('frontend.homepage', compact('beachcourts'));
    }
}
