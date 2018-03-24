@extends('layouts.backend')

@section('content')

<div class="container">
<div class="row">

@if($pictures === 'false')
<img height="200" src="https://beachfelder.de/img/beachcourt-summary-bg-dummy.jpg" class="beachcourt-summary__image">
@else
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/1.jpg" class="beachcourt-summary__image">
<a href="#">löschen</a>
<a href="#">ersetzen</a>
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/2.jpg" class="beachcourt-summary__image">
<a href="#">löschen</a>
<a href="#">ersetzen</a>
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/3.jpg" class="beachcourt-summary__image">
<a href="#">löschen</a>
<a href="#">ersetzen</a>
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/4.jpg" class="beachcourt-summary__image">
<a href="#">löschen</a>
<a href="#">ersetzen</a>
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/5.jpg" class="beachcourt-summary__image">
<a href="#">löschen</a>
<a href="#">ersetzen</a>
@endif

<!-- UPLOAD NEW PICTURE -->
<div class="context-menu profile-user-image__context-menu">
<form method="POST" action="{{ url('profil/uploadprofilepicture/') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<label class="input-fileupload">
<input type="file" name="profilePicture" class="input-fileupload__field" data-multiple-caption="{count} files selected" />
<span class="input-fileupload__icon icon icon--camera"></span>
<span class="input-fileupload__label">@lang('Neues Profilbild hochladen')</span>
</label>
<button type="submit">Upload!</button>
</form>
</div>

</div>
</div>



<div class="container">
    <div class="row">
        <div class="col-xs-12">

<form class="form-horizontal" action="{{ URL::route('backendBeachcourt.update', $beachcourt->id) }}" method="POST">
<input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="postalCode" class="col-sm-2 control-label">PLZ</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="postalCode" value="{{ $beachcourt->postalCode }}">
            @if ($errors->has('postalCode'))
              <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="city" class="col-sm-2 control-label">Stadt</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="city" value="{{ $beachcourt->city }}">
            @if ($errors->has('city'))
              <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="street" class="col-sm-2 control-label">Straße</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="street" value="{{ $beachcourt->street }}">
            @if ($errors->has('street'))
              <div class="alert alert-danger">{{ $errors->first('street', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="houseNumber" class="col-sm-2 control-label">Hausnummer</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="houseNumber" value="{{ $beachcourt->houseNumber }}">
            @if ($errors->has('houseNumber'))
              <div class="alert alert-danger">{{ $errors->first('houseNumber', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="country" class="col-sm-2 control-label">Land</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="country" value="{{ $beachcourt->country }}">
            @if ($errors->has('country'))
              <div class="alert alert-danger">{{ $errors->first('country', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="state" class="col-sm-2 control-label">Bundesland</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="state" value="{{ $beachcourt->state }}">
            @if ($errors->has('state'))
              <div class="alert alert-danger">{{ $errors->first('state', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="latitude" class="col-sm-2 control-label">Latitude</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="latitude" value="{{ $beachcourt->latitude }}">
            @if ($errors->has('latitude'))
              <div class="alert alert-danger">{{ $errors->first('latitude', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="longitude" class="col-sm-2 control-label">Longitude</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="longitude" value="{{ $beachcourt->longitude }}">
            @if ($errors->has('longitude'))
              <div class="alert alert-danger">{{ $errors->first('longitude', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="operator" class="col-sm-2 control-label">Betreiber</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="operator" value="{{ $beachcourt->operator }}">
            @if ($errors->has('operator'))
              <div class="alert alert-danger">{{ $errors->first('operator', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="isChargeable" class="col-sm-2 control-label">kostenpflichtig</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="isChargeable" value="{{ $beachcourt->isChargeable }}">
            @if ($errors->has('isChargeable'))
              <div class="alert alert-danger">{{ $errors->first('isChargeable', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="courtCountOutdoor" class="col-sm-2 control-label">Felder Outdoor</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="courtCountOutdoor" value="{{ $beachcourt->courtCountOutdoor }}">
            @if ($errors->has('courtCountOutdoor'))
              <div class="alert alert-danger">{{ $errors->first('courtCountOutdoor', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="courtCountIndoor" class="col-sm-2 control-label">Felder Indoor</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="courtCountIndoor" value="{{ $beachcourt->courtCountIndoor }}">
            @if ($errors->has('courtCountIndoor'))
              <div class="alert alert-danger">{{ $errors->first('courtCountIndoor', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="isPublic" class="col-sm-2 control-label">öffentlich zugänglich</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="isPublic" placeholder="Hier tippen ;)">
            @if ($errors->has('isPublic'))
              <div class="alert alert-danger">{{ $errors->first('isPublic', ':message') }}</div>
            @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Speichern</button>
          </div>
        </div>

      </form>

      <p>Letztes Update: {{ $beachcourt->updated_at }}</p>

        </div>
    </div>
</div>

@endsection
