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

    /////////AUSLESEN DER REQUEST VARIABLEN
    $slat = $request->lat;
    $slong = $request->long;
    $input = $request->postcode13;



    /////////KURZE ABFRAGE WENN NUR NACH ZAHLEN GESUCHT WIRD, OB ES 5 STÜCK SIND (WENN NICHT => REDIRECT/ERROR)
    if (is_numeric($input)) {
      $plz = $request->postcode13;
      $v = Validator::make($request->all(), [
        'postcode13' => 'required|digits:5'
      ]);
      if($v->fails()){
        return redirect('/')->withErrors($v->errors());
      }
    } else {
      $address = $request->postcode13;
    }
    
    /////////UMWANDLUNG DER PLZ, ADRESSE, ODER WAS AUCH IMMER KOMMT (INKL. VALIDATION)
    /////////IN LONGITUDE & LATITUDE (START)
    if ($slat) {

      $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$slat.",".$slong."&key=AIzaSyDQXCnp5XKH4KJotgqMqu-qKDhdm2dRgho";
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
      $arrayl = $response['results'][0]['address_components'];

      $plz = $response['results'][0]['address_components'][count($arrayl)-1]['long_name'];
      
    } elseif(is_numeric($input)) {

      $url = "https://maps.googleapis.com/maps/api/geocode/json?components=country:DE|postal_code:".$plz."&key=AIzaSyDQXCnp5XKH4KJotgqMqu-qKDhdm2dRgho";
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
      $arrayl = $response['results'][0]['address_components'];
    
    } elseif(ctype_alpha($address)) {

      $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&region=de&key=AIzaSyDQXCnp5XKH4KJotgqMqu-qKDhdm2dRgho";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      $response = curl_exec($ch);
      $response = json_decode($response, true);
    
      if($response['status'] === 'ZERO_RESULTS'){
        return redirect('/')->with('status', 'Wir konnten deinem Suchbegriff keine Stadt zuweisen.');
      }

      $latitude = $response['results'][0]['geometry']['location']['lat'];
      $longitude = $response['results'][0]['geometry']['location']['lng'];
      $arrayl = $response['results'][0]['address_components'];
     
      $plzurl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$latitude.",".$longitude."&key=AIzaSyDQXCnp5XKH4KJotgqMqu-qKDhdm2dRgho";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $plzurl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      $plzurlresponse = curl_exec($ch);
      $plzurlresponse = json_decode($plzurlresponse, true);
      $arrayl = $plzurlresponse['results'][0]['address_components'];
      
      $plz = $plzurlresponse['results'][0]['address_components'][count($arrayl)-1]['long_name'];

    } else {
      return redirect('/')->with('status', 'Bitte suche nach einer PLZ oder einem Ort!');
    }
    /////////UMWANDLUNG DER PLZ, ADRESSE, ODER WAS AUCH IMMER KOMMT (INKL. VALIDATION)
    /////////IN LONGITUDE & LATITUDE (ENDE)

    /////////START
    /////////SUCHE
    

    /////////STANDARD
    /////////SUCHKRITERIEN

    //definierter Suchradius - Fallback 15km
    $distance = $request->distance ?? 15;
    // Suche im definierten Radius
    $results = Beachcourt::where('submitState', 'approved')
      ->whereBetween('latitude', array(($latitude - ($distance*0.0117)), ($latitude + ($distance*0.0117))))
      ->whereBetween('longitude', array(($longitude - ($distance*0.0117)), ($longitude + ($distance*0.0117))));
      
    //definierte mindestbälle - Fallback 0
    $ratingmin = intval($request->ratingmin) ?? 0;
    //Filter anhand der Bälle
    if( $ratingmin <= 5 && $ratingmin >= 1 ) {
    		$results->whereBetween('rating', array($ratingmin, 5))
    						->orWhereBetween('bfdeRating', array($ratingmin, 5));
    }
    else {
    	$results->get();
    }

    /////////FILTER 
    /////////INDOOR/OUTDOOR (VORAUSSETZUNG IST, DASS ES IM FRONTEND RADIO BUTTONS SIND)

    //Radio Value: outdoor, indoor oder egal // egal wird nicht weiter verarbeitet, da leer
    $outin = $request->outin;
    //when Kriterium 'courtCountOutdoor' dann suche danach
    if ($outin == 'outdoor') {$results->where('courtCountOutdoor', '>=', 1);}
    //when Kriterium 'courtCountIndoor' dann suche danach
    if ($outin == 'indoor') {$results->where('courtCountIndoor', '>=', 1);}

    /////////FILTER 
    /////////ZUGANG (VORAUSSETZUNG IST, DASS ES IM FRONTEND RADIO BUTTONS SIND)

    //Radio Value: outdoor, indoor oder egal // egal wird nicht weiter verarbeitet, da leer
    $access = $request->access;
    //when Kriterium 'yesOrNull' (public) dann suche danach
    if ($access == 'yes') {$results->where('isPublic', '=', 1)->orWhereNull('isPublic');}
    //when Kriterium 'no' (public) dann suche danach
    if ($access == 'no') {$results->where('isPublic', '=', 0);}

    /////////FILTER 
    /////////KOSTEN (VORAUSSETZUNG IST, DASS ES IM FRONTEND RADIO BUTTONS SIND)

    //Radio Value: kostenlos, zeitabhaengigeGebühr, einmaligeGebühr, swimmingLake, dauerhafteMitgliedschaft oder egal // egal wird nicht weiter verarbeitet, da leer
    $cost = $request->cost;
    //when Kriterium 'kostenlos' dann suche danach
    if ($cost == 'kostenlos') {$results->where('isChargeable', '=', 0)->orWhereNull('isChargeable');}
    //when Kriterium 'einmaligeGebühr' dann suche danach
    if ($cost == 'einmaligeGebühr') {$results->where('isSingleAccess', '=', 1);}
    //when Kriterium 'einmaligeGebühr' dann suche danach
    if ($cost == 'zeitabhaengigeGebühr') {$results->where('isChargeable', '=', 1);}
    //when Kriterium 'einmaligeGebühr' dann suche danach
    if ($cost == 'dauerhafteMitgliedschaft') {$results->where('isMembership', '=', 1);}

    $swimmingLake = $request->swimmingLake;

    //when Kriterium 'swimmingLake' dann suche danach
    if ($swimmingLake == 'swimmingLake') {$results->where('isswimmingLake', '=', 1);}

    /////////FINALLY GET THE RESULTS 
    $results = $results->get();
    
    /////////CALCULATE THE DISTANCE BETWENN THE QUERY AND THE SURROUNDING COURTS
    foreach ($results as $beachcourt) {
        $pi80 = M_PI / 180;
        $lat1 = $latitude;
        $lat1 *= $pi80;
        
        $lng1 = $longitude;
        $lng1 *= $pi80;
        
        $lat2 = $beachcourt->latitude;
        $lat2 *= $pi80;

        $lng2 = $beachcourt->longitude;
        $lng2 *= $pi80;

        $r = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1; $dlng = $lng2 - $lng1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $dis = $r * $c * 0.621371192 * 2;
          
        $beachcourt->distance = $dis;

        if ($distance < $dis) {
          $results = $results->keyBy('id'); 
          $results->forget($beachcourt->id);
        }
      }
      $results = $results->sortBy('distance');
     
      return view('frontend.search.show', compact('filter', 'isChargeable', 'isPublic', 'results', 'slong', 'slat', 'latitude', 'longitude', 'plz', 'distance', 'ratingmin', 'ratingmax', 'outin', 'access', 'cost', 'swimmingLake'));

    }

}