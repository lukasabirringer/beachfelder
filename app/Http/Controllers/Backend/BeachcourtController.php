<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\StoreBeachcourtRequest;
use App\Http\Requests\Backend\UpdateBeachcourtRequest;
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
        $submittedBeachcourts->count = $submittedBeachcourts->count();

        $beachcourts = Beachcourt::where('submitState', 'approved')->get();
        $beachcourts->count = $beachcourts->count();

        return view('backend.beachcourts.index', ['beachcourts' => $beachcourts, 'submittedBeachcourts' => $submittedBeachcourts]);
    }

    public function create()
    {
        return view('backend.beachcourts.create');
    }

    public function store(StoreBeachcourtRequest $request)
    {
        $date = Carbon::now()->toDateTimeString();

        $validated = $request->validated();

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
             'submitState' => $request->submitState,
             'isPublic' => $request->public,
             'operator' => $request->operator,
             'operatorUrl' => $request->operatorUrl,
             'notes' => $request->notes,
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
    public function update(UpdateBeachcourtRequest $request, $id)
    {
        $validated = $request->validated();

        $beachcourt = Beachcourt::find($id);
        $beachcourt->postalCode = $request->input('postalCode');
        $beachcourt->city = $request->input('city');
        $beachcourt->street = $request->input('street');
        $beachcourt->houseNumber = $request->input('houseNumber');
        $beachcourt->country = $request->input('country');
        $beachcourt->state = $request->input('state');
        $beachcourt->latitude = $request->input('latitude');
        $beachcourt->longitude = $request->input('longitude');
        $beachcourt->isChargeable = $request->input('isChargeable');
        $beachcourt->courtCountOutdoor = $request->input('courtCountOutdoor');
        $beachcourt->courtCountIndoor = $request->input('courtCountIndoor');
        $beachcourt->submitState = $request->input('submitState');
        $beachcourt->isPublic = $request->input('isPublic');
        $beachcourt->operator = $request->input('operator');
        $beachcourt->operatorUrl = $request->input('operatorUrl');
        $beachcourt->notes = $request->input('notes');
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
