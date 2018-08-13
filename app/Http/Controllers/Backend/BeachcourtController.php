<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\StoreBeachcourtRequest;
use App\Http\Requests\Backend\UpdateBeachcourtRequest;
use Validator;
use App\Http\Controllers\Controller;
use App\Libraries\LinkShortener;
use App\Beachcourt;
use App\Favorite;
use App\Rating;
use DB;
use URL;
use File;
use Carbon\Carbon;

class BeachcourtController extends Controller
{
    public function rate(Request $request, $id)
    {
        $beachcourt = Beachcourt::findOrFail($id);
        $beachcourt->bfdeRating = $request->input('bfderating');
        $beachcourt->save();

        return view('backend.beachcourts.edit', compact('beachcourt'));
    }

    public function index()
    {
        $submittedBeachcourts = Beachcourt::where('submitState', 'submitted')->get();
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
             'district' => $request->district,
             'street' => $request->street,
             'houseNumber' => $request->houseNumber,
             'country' => $request->country,
             'state' => $request->state,
             'latitude' => $request->latitude,
             'longitude' => $request->longitude,
             'isChargeable' => $request->isChargeable,
             'courtCountOutdoor' => $request->courtCountOutdoor,
             'courtCountIndoor' => $request->courtCountIndoor,
             'submitState' => $request->submitState,
             'isPublic' => $request->isPublic,
             'isMembership' => $request->isMembership,
             'isSingleAccess' => $request->isSingleAccess,
             'isswimmingLake' => $request->isswimmingLake,
             'floodlight' => $request->floodlight,
             'shower' => $request->shower,
             'operator' => $request->operator,
             'operatorUrl' => $request->operatorUrl,
             'operatorContactPerson' => $request->operatorContactPerson,
             'operatorContactPersonPhone' => $request->operatorContactPersonPhone,
             'operatorContactPersonEmail' => $request->operatorContactPersonEmail,
             'internalNote' => $request->internalNote,
             'notes' => $request->notes,
        ]);

        return redirect()->route('backendBeachcourt.index')->with('success', 'Beachfeld wurde erstellt');
    }
    public function show($id)
    {
        $beachcourt = Beachcourt::findOrFail($id);

        // GET THE BEACHCOURT ID
        $beachcourt_id = $id;
        // GET ALL RATINGS WITH THIS ID
        $beachcourtRatingCount = Rating::where('beachcourt_id', $beachcourt_id)->count();
        
        // GET ALL FAVORITES OF THIS FIELD
        $beachcourtFavorites = Favorite::where('beachcourt_id', $beachcourt_id)->count();

        return view('backend.beachcourts.show', compact('beachcourt', 'beachcourtRatingCount', 'beachcourtFavorites'));
    }
    public function edit($id)
    {
        $beachcourt = Beachcourt::findOrFail($id);

        if (is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/'))) {
	        $path = public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/');
	        $files = File::allFiles($path);
	        $filecount = count($files);
        } else {
            $filecount = 0;
        }

        return view('backend.beachcourts.edit', compact('beachcourt', 'pictures', 'filecount'));
    }
    public function update(UpdateBeachcourtRequest $request, $id)
    {
        $validated = $request->validated();

        $beachcourt = Beachcourt::find($id);
        $beachcourt->postalCode = $request->input('postalCode');
        $beachcourt->city = $request->input('city');
        $beachcourt->district = $request->input('district');
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
        $beachcourt->isMembership = $request->input('isMembership');
        $beachcourt->isSingleAccess = $request->input('isSingleAccess');
        $beachcourt->isswimmingLake = $request->input('isswimmingLake');
        $beachcourt->floodlight = $request->input('floodlight');
        $beachcourt->shower = $request->input('shower');
        $beachcourt->operator = $request->input('operator');
        $beachcourt->operatorUrl = $request->input('operatorUrl');
        $beachcourt->operatorContactPerson = $request->input('operatorContactPerson');
        $beachcourt->operatorContactPersonPhone = $request->input('operatorContactPersonPhone');
        $beachcourt->operatorContactPersonEmail = $request->input('operatorContactPersonEmail');
        $beachcourt->notes = $request->input('notes');
        $beachcourt->internalNote = $request->input('internalNote');
        $getBeachcourtURL = URL::route('beachcourts.show' , array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude));
        $beachcourt->shortUrl = LinkShortener::linkShortener($getBeachcourtURL);
        $beachcourt->save();

        return redirect()->route('backendBeachcourt.index')->with('success', 'Beachfeld wurde erfolgreich geändert');
    }
    public function destroy($id)
    {
        $beachcourt = Beachcourt::findOrFail($id);
        $beachcourt->delete();

        return redirect()->back()->with('success', 'Beachfeld wurde gelöscht');
    }

    public function generateShortUrl($id) {
        $beachcourt = Beachcourt::findOrFail($id);
        $getBeachcourtURL = URL::route('beachcourts.show' , array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude));
        $beachcourt->shortUrl = LinkShortener::linkShortener($getBeachcourtURL);
        $beachcourt->save();

        return redirect()->back()->with('success', 'shortlink wurde generiert');
    }
}
