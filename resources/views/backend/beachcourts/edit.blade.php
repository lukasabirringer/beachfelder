@extends('layouts.backend')

@section('content')



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
          <label for="operatorUrl" class="col-sm-2 control-label">URL des Betreibers</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="operatorUrl" value="{{ $beachcourt->operatorUrl }}">
            @if ($errors->has('operatorUrl'))
              <div class="alert alert-danger">{{ $errors->first('operatorUrl', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="notes" class="col-sm-2 control-label">Notizen / Beschreibung</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="notes" value="{{ $beachcourt->notes }}">
            @if ($errors->has('notes'))
              <div class="alert alert-danger">{{ $errors->first('notes', ':message') }}</div>
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
          <label for="submitState" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <select class="form-control" name="submitState" class="selectpicker">
              <optgroup label="aktueller Status">
                <option>{{ $beachcourt->submitState }}</option>
              </optgroup>
              <optgroup label="neues Geschlecht">
                <option value="eingereicht">eingereicht</option>
                <option value="approved">veröffentlicht</option>
                <option value="abgelehnt">abgelehnt</option>
              </optgroup>
            </select>
            @if ($errors->has('submitState'))
              <div class="alert alert-danger">{{ $errors->first('submitState', ':message') }}</div>
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
