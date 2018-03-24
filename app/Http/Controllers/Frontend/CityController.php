<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use App\City;
use DB;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::paginate(15);
        return view('frontend.city.index', compact('cities'));
    }
    public function show($name)
    {
      $city = City::where('name', $name)->first();
      $name = ($city->name);
      $postalCodeMin = $city->postalCodeMin;
      $postalCodeMax = $city->postalCodeMax;

      $beachcourts = DB::table('beachcourts')
         ->whereBetween('postalCode', array($postalCodeMin, $postalCodeMax))
         ->get();

      return view('frontend.city.show', compact('beachcourts', 'name'));
    }
}
