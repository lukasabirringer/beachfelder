
@extends('layouts.frontend')

@section('content')

<div class="row">
    <div class="col">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
    <h4>Beachfeld einreichen</h4>
    <form method="POST" action="{{ URL::route('beachcourtsubmit.store') }}" id="myform" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label>PLZ</label>
        <input type="text" name="postalCode">
        @if ($errors->has('postalCode'))
          <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
        @endif
        <label>Ort</label>
        <input type="text" name="city">
        @if ($errors->has('city'))
          <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
        @endif
        <label>Straße</label>
        <input type="text" name="street">
        @if ($errors->has('street'))
          <div class="alert alert-danger">{{ $errors->first('street', ':message') }}</div>
        @endif
        <label>Hausnummer</label>
        <input type="text" name="houseNumber">
        @if ($errors->has('houseNumber'))
          <div class="alert alert-danger">{{ $errors->first('houseNumber', ':message') }}</div>
        @endif
        <label>Latitude</label>
        <input type="text" name="latitude">
        @if ($errors->has('latitude'))
          <div class="alert alert-danger">{{ $errors->first('latitude', ':message') }}</div>
        @endif
        <label>Longitude</label>
        <input type="text" name="longitude">
        @if ($errors->has('longitude'))
          <div class="alert alert-danger">{{ $errors->first('longitude', ':message') }}</div>
        @endif
        <label>Betreiber</label>
        <input type="text" name="operator">
        @if ($errors->has('operator'))
          <div class="alert alert-danger">{{ $errors->first('operator', ':message') }}</div>
        @endif
        <label>Beachfelder Outdoor</label>
        <input type="text" name="courtCountOutdoor">
        @if ($errors->has('courtCountOutdoor'))
          <div class="alert alert-danger">{{ $errors->first('courtCountOutdoor', ':message') }}</div>
        @endif
        <label>Beachfelder Indoor</label>
        <input type="text" name="courtCountIndoor">
        @if ($errors->has('courtCountIndoor'))
          <div class="alert alert-danger">{{ $errors->first('courtCountIndoor', ':message') }}</div>
        @endif
        <label>Kostenfrei?</label>
        <input type="text" name="isChargeable">
        @if ($errors->has('isChargeable'))
          <div class="alert alert-danger">{{ $errors->first('isChargeable', ':message') }}</div>
        @endif
        <label>frei zugänglich?</label>
        <input type="text" name="isPublic">
        @if ($errors->has('isPublic'))
          <div class="alert alert-danger">{{ $errors->first('isPublic', ':message') }}</div>
        @endif
        <label>Anmerkungen</label>
        <input type="text" name="notes">
        @if ($errors->has('notes'))
          <div class="alert alert-danger">{{ $errors->first('notes', ':message') }}</div>
        @endif

        <input type="submit" value="Beachfeld einreichen">

    </form>    </div>
</div>

<div class="row">
    <div class="col">

    <h4>Deine eingereichten Beachfelder</h4>
     @foreach ($submittedBeachcourts as $beachcourt)
 <tr>
          <td><a href="beachvolleyballfeld/{{ $beachcourt->id }}">{{ $beachcourt->id }}</a></td>
          <td><a href="beachvolleyballfeld/{{ $beachcourt->id }}">{{ $beachcourt->postalCode }}</a></td>
          <td><a href="beachvolleyballfeld-{{ $beachcourt->id }}">{{ $beachcourt->city }}</a></td>
          <td><a href="beachvolleyballfeld-{{ $beachcourt->id }}">{{ $beachcourt->submitState }}</a></td>
          <td><favorite
          :beachcourt={{ $beachcourt->id }}
          :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
          ></favorite>
          </td>
        </tr>
     @endforeach
    </div>
</div>BFDEmail2018!

@endsection
