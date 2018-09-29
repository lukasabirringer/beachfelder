<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use App\City;
use DB;
use Auth;
use App\Page;

class HomepageController extends Controller
{
    public function show()
    {
        $beachcourts = Beachcourt::where('submitState', 'approved')->orderBy('id', 'desc')->limit(5)->get();
        
        $cities = City::paginate(15);

        return view('frontend.homepage', compact('beachcourts', 'cities'));
    }
}
