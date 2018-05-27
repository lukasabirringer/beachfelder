<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use App\User;
use App\Rating;
use App\Favorite;
use DB;

class DashboardController extends Controller
{
    public function show()
    {
        $beachcourtCount = Beachcourt::all()->count();
        $userCount = User::all()->count();
        $ratingCount = Rating::all()->count();
        $favsCount = Favorite::all()->count();

        $submittedCourtsCount = Beachcourt::where('submitState', 'submitted')->count();
        $approvedCourtsCount = Beachcourt::where('submitState', 'approved')->count();
        $courtWithoutPicturesRating = Beachcourt::where('ratingCount', NULL)->count();

        $submittedBeachcourts = Beachcourt::where('submitState', 'submitted')->limit(5)->latest()->get();

        $messages = DB::table('contact')->limit(5)->latest()->get();


        // $users = User::limit(5)->latest()->get();
        // $subs = Beachcourt::limit(5)->latest()->get();

        return view('backend.dashboard', 
                    compact('beachcourtCount', 
                            'userCount', 
                            'ratingCount', 
                            'favsCount',
                            'submittedCourtsCount',
                            'approvedCourtsCount',
                            'courtWithoutPicturesRating',
                            'submittedBeachcourts',
                            'messages'));
    }
}
