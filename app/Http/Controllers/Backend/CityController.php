<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCityRequest;
use App\Http\Requests\Backend\UpdateCityRequest;
use DB;
use App\City;
use Carbon\Carbon;

class CityController extends Controller
{

    public function index()
    {
       $cities = City::paginate(15);
       return view('backend.city.index', compact('cities'));
    }

    public function store(StoreCityRequest $request)
    {
        $validated = $request->validated();

        DB::table('cities')->insert(
            ['population' => $request->population,
             'description' => $request->description
            ]
        );

        return redirect()->route('backendCity.index')->with('success', 'Stadt wurde erfolgreich angelegt');
    }

    public function show($id)
    {
        $city = City::findOrFail($id);

        return view('backend.city.show', compact('city'));
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);

        return view('backend.city.edit', compact('city'));
    }

    public function update(UpdateCityRequest $request, $id)
    {
        $validated = $request->validated();

        $city = City::findOrFail($id);
        $city->update($request->all());

        return redirect()->route('backendCity.index')->with('success', 'Stadt wurde erfolgreich geändert');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('backendCity.index');
    }
}