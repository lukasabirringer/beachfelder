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

    $slat = $request->lat;
    $slong = $request->long;
    $plz = $request->postcode13;

    if ($plz){
      $url = "https://maps.googleapis.com/maps/api/geocode/json?components=country:DE|postal_code:".$plz."&key=AIzaSyDQXCnp5XKH4KJotgqMqu-qKDhdm2dRgho";
      
    } else {
      $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$slat.",".$slong."&key=AIzaSyDQXCnp5XKH4KJotgqMqu-qKDhdm2dRgho";
    }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    $response = json_decode($response, true);
    $latitude = $response['results'][0]['geometry']['location']['lat'];
    $longitude = $response['results'][0]['geometry']['location']['lng'];

    $distance = $request->distance ?? '15';
    $ratingmin = $request->ratingmin ?? '1';
    $ratingmax = $request->ratingmax ?? '5';
    $isPublic = $request->isPublic;
    $isChargeable = $request->isChargeable;

    $results = Beachcourt::where('submitState', 'approved')
      ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
      ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
      ->get();

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
            $dis = $r * $c * 0.621371192 * 2;
            
            $beachcourt->distance = $dis;
       }
       $results = $results->sortBy('distance');
       
      return view('frontend.search.show', compact('isChargeable', 'isPublic', 'results', 'latitude', 'longitude', 'plz', 'distance', 'ratingmin', 'ratingmax'));

    }

}
