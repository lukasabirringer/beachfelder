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
    public function show($slug)
    {
      $city = City::where('slug', $slug)->first();
      $name = ($city->name);
      $postalCodeMin = $city->postalCodeMin;
      $postalCodeMax = $city->postalCodeMax;

      $beachcourts = Beachcourt::whereBetween('postalCode', array($postalCodeMin, $postalCodeMax))
        ->Paginate(6);

      return view('frontend.city.show', compact('beachcourts', 'name'));
    }
}
