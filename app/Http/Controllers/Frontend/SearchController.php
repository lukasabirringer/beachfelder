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

      $v = Validator::make($request->all(), [
        'postcode13' => 'required',
        'lat' => 'required',
        'long' => 'required',
      ]);

      if($v->fails()){
        return redirect()->back()->withErrors($v->errors());
      }

    $slat = $request->lat;
    $slong = $request->long;
    $plz = $request->postcode13;

    if (strlen($plz) == 5){
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
    if (!$plz){$plz = $response['results'][0]['address_components'][6]['long_name'];}
    elseif (strlen($plz) < 6){$plz = $response['results'][0]['address_components'][6]['long_name'];}
    $distance = $request->distance ?? '15';
    $ratingmin = $request->ratingmin ?? '0';
    $ratingmax = $request->ratingmax ?? '5';

    $filter = $request->filter ?? null;
    
    if ($filter == 'public') {
         // public isPublic = 1 oder NULL 
      $results = Beachcourt::where('submitState', 'approved')
      ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
      ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
      ->where(function ($results) 
        {
          $results->where('isPublic', '=', 1)
                  ->orWhereNull('isPublic');
        })
      ->get();
    } elseif ($filter == 'facilities') {
       //  facilities isPublic = 1 oder NULL  und isCharge = 0 oder 3 oder NULL 
      $results = Beachcourt::where('submitState', 'approved')
      ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
      ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
      ->where(function ($results) 
        {
          $results->where('isPublic', '=', 1)
                  ->orWhereNull('isPublic');
        })
      ->where(function ($results) 
        {
          $results->where('isChargeable', 0)
                  ->orWhere('isChargeable', 3)
                  ->orWhereNull('isChargeable');
        })
      ->get();
       } elseif ($filter == 'free') {
       //  free isPublic = 1 oder NULL und isCharge = 0 oder NULL" 
      $results = Beachcourt::where('submitState', 'approved')
      ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
      ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))))
      ->where(function ($results) 
        {
          $results->where('isPublic', '=', 1)
                  ->orWhereNull('isPublic');
        })
      ->where(function ($results) 
        {
          $results->where('isChargeable', '=', 0)
                  ->orWhereNull('isChargeable');
        })
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
            $dis = $r * $c * 0.621371192 * 2;
            
            $beachcourt->distance = $dis;
       }
       $results = $results->sortBy('distance');
      
      return view('frontend.search.show', compact('filter', 'isChargeable', 'isPublic', 'results', 'latitude', 'longitude', 'plz', 'distance', 'ratingmin', 'ratingmax'));

    }

}
