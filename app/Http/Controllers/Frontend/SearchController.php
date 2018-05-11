<?php

namespace App\Http\Controllers\Frontend;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Beachcourt;
use DB;

class SearchController extends Controller
{
    public function show(Request $request)
    { 
      
        $plz = $request->postcode ?? '75233';;
        $distance = $request->distance ?? '15';

        $validator = Validator::make($request->all(), [
            'postcode' => 'min:4',
        ]);
        if ($validator->fails()) {
         return redirect('/')->withErrors($validator, 'postcode');
        }

        require_once(app_path() . '/plz/ogdbPLZnearby2.lib.php');
        require_once(app_path() . '/plz/plzToCity.php');

        $citylonglat = ($plzToCity[$plz]);

        $latitude = $citylonglat[1];
        $longitude = $citylonglat[2];

        $ratingmin = $request->ratingmin ?? '1';
        $ratingmax = $request->ratingmax ?? '5';
        $isPublic = $request->isPublic;
        $isChargeable = $request->isChargeable;

         if ($request->has('isPublic') && $request->has('isChargeable') && $request->has('rating')) {
            $results = Beachcourt::where('submitState', 'approved')
              ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
              ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
              ->where(function ($results) {$results->where('isPublic', '=', $isPublic)->orWhereNull('isPublic');})
              ->where(function ($results) {$results->where('isChargeable', '=', $isChargeable)->orWhereNull('isChargeable');})
              ->where(function ($results) {$results->where('rating', '=', $rating)->orWhereNull('rating');})
              ->get();
         } else {
            $results = Beachcourt::where('submitState', 'approved')
              ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
              ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
              ->get();
         }

          foreach ($results as $beachcourt) {
            $pi80 = M_PI / 180;
            $lat1 = $latitude; $lat1 *= $pi80;
            $lng1 = $longitude; $lng1 *= $pi80;
            $lat2 = $beachcourt->latitude; $lat2 *= $pi80;
            $lng2 = $beachcourt->longitude; $lng2 *= $pi80;
            $r = 6372.797; // mean radius of Earth in km
            $dlat = $lat2 - $lat1; $dlng = $lng2 - $lng1;
            $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $dis = str_replace('.', ',', number_format($r * $c * 0.621371192 * 2, 1));
            
            $beachcourt->distance = $dis;
           }
           $results = $results->sortBy('distance');
            

        return view('frontend.search.show', compact('isChargeable', 'isPublic', 'results', 'latitude', 'longitude', 'plz', 'distance', 'ratingmin', 'ratingmax'));
    }

}
