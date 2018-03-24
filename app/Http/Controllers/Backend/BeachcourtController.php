<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Beachcourt;
use DB;
use Carbon\Carbon;

class BeachcourtController extends Controller
{
    public function index()
    {
        $submittedBeachcourts = Beachcourt::where('submitState', 'eingereicht')->get();
        $beachcourts = Beachcourt::where('submitState', 'approved')->paginate(10);
        return view('backend.beachcourts.index', ['beachcourts' => $beachcourts,'submittedBeachcourts' => $submittedBeachcourts]);
    }
    public function create()
    {
        return view('backend.beachcourts.create');
    }
    public function store(Request $request)
    {
        $date = Carbon::now()->toDateTimeString();

        $v = Validator::make($request->all(), [
        'postalCode' => 'required',
        'city' => 'required',
         'latitude' => 'required',
         'longitude' => 'required',
         'isChargeable' => 'boolean',
         'isPublic' => 'boolean',
         'user_id' => 'numeric',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        DB::table('beachcourts')->insert([
             'postalCode' => $request->postalCode,
             'city' => $request->city,
             'street' => $request->street,
             'houseNumber' => $request->houseNumber,
             'country' => $request->country,
             'state' => $request->state,
             'latitude' => $request->latitude,
             'longitude' => $request->longitude,
             'isChargeable' => $request->chargeable,
             'courtCountOutdoor' => $request->courtCountOutdoor,
             'courtCountIndoor' => $request->courtCountIndoor,
             'submitState' => 'eingreicht',
             'isPublic' => $request->public,
             'user_id' => "0",
             'operator' => $request->operator
        ]);


        return redirect()->route('backendBeachcourt.index')->with('success', 'Beachfeld wurde erstellt');
    }
    public function show($id)
    {
        $beachcourt = Beachcourt::findOrFail($id);
        return view('backend.beachcourts.show', compact('beachcourt'));
    }
    public function edit($id)
    {
        $beachcourt = Beachcourt::findOrFail($id);

        if (!file_exists(public_path('uploads/beachcourts/' . $beachcourt->id . '/1.jpg'))) {
             $pictures = 'false';
        } else {
             $pictures = 'true';
        }

        return view('backend.beachcourts.edit', compact('beachcourt', 'pictures'));
    }
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
        'postalCode' => 'required',
        'city' => 'required',
         'latitude' => 'required',
         'longitude' => 'required',
         'isChargeable' => 'boolean',
         'isPublic' => 'boolean',
         'user_id' => 'numeric',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $postalCode = $request->input('postalCode');
        $city = $request->input('city');
        $street = $request->input('street');
        $houseNumber = $request->input('houseNumber');
        $country = $request->input('country');
        $state = $request->input('state');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $courtCountOutdoor = $request->input('courtCountOutdoor');
        $courtCountIndoor = $request->input('courtCountIndoor');
        $chargeable = $request->input('isChargeable');
        $submitState = $request->input('submitState');
        $isPublic = $request->input('isPublic');
        $operator = $request->input('operator');

        $beachcourt = Beachcourt::find($id);
        $beachcourt->postalCode = $postalCode;
        $beachcourt->city = $city;
        $beachcourt->street = $street;
        $beachcourt->houseNumber = $houseNumber;
        $beachcourt->country = $country;
        $beachcourt->state = $state;
        $beachcourt->latitude = $latitude;
        $beachcourt->longitude = $longitude;
        $beachcourt->isChargeable = $chargeable;
        $beachcourt->courtCountOutdoor = $courtCountOutdoor;
        $beachcourt->courtCountIndoor = $courtCountIndoor;
        $beachcourt->submitState = $submitState;
        $beachcourt->isPublic = $isPublic;
        $beachcourt->operator = $operator;
        $beachcourt->save();

        return redirect()->route('backendBeachcourt.index')->with('success', 'Beachfeld wurde erfolgreich geändert');
    }
    public function destroy($id)
    {
        $beachcourt = Beachcourt::findOrFail($id);
        $beachcourt->delete();

        return redirect()->route('backendBeachcourt.index');
    }
}
