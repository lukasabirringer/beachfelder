@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">



<form class="form-horizontal" action="{{ URL::route('backendBeachcourt.store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
          <label for="postalCode" class="col-sm-2 control-label">PLZ</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="postalCode" placeholder="Hier tippen ;)">
            @if ($errors->has('postalCode'))
              <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="city" class="col-sm-2 control-label">Stadt/Ort</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="city" placeholder="Hier tippen ;)">
            @if ($errors->has('city'))
              <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="street" class="col-sm-2 control-label">Straße</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="street" placeholder="Hier tippen ;)">
            @if ($errors->has('street'))
              <div class="alert alert-danger">{{ $errors->first('street', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="houseNumber" class="col-sm-2 control-label">Hausnummer</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="houseNumber" placeholder="Hier tippen ;)">
            @if ($errors->has('houseNumber'))
              <div class="alert alert-danger">{{ $errors->first('houseNumber', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="country" class="col-sm-2 control-label">Land</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="country" placeholder="Hier tippen ;)">
            @if ($errors->has('country'))
              <div class="alert alert-danger">{{ $errors->first('country', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="state" class="col-sm-2 control-label">Bundesland</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="state" placeholder="Hier tippen ;)">
            @if ($errors->has('state'))
              <div class="alert alert-danger">{{ $errors->first('state', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="latitude" class="col-sm-2 control-label">Latitude</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="latitude" placeholder="Hier tippen ;)">
            @if ($errors->has('latitude'))
              <div class="alert alert-danger">{{ $errors->first('latitude', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="longitude" class="col-sm-2 control-label">Longitude</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="longitude" placeholder="Hier tippen ;)">
            @if ($errors->has('longitude'))
              <div class="alert alert-danger">{{ $errors->first('longitude', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="operator" class="col-sm-2 control-label">Betreiber</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="operator" placeholder="Hier tippen ;)">
            @if ($errors->has('operator'))
              <div class="alert alert-danger">{{ $errors->first('operator', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="operatorUrl" class="col-sm-2 control-label">URL des Betreibers</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="operatorUrl" placeholder="Hier tippen ;)">
            @if ($errors->has('operatorUrl'))
              <div class="alert alert-danger">{{ $errors->first('operatorUrl', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="notes" class="col-sm-2 control-label">Notizen / Beschreibung</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="notes" placeholder="Hier tippen ;)">
            @if ($errors->has('notes'))
              <div class="alert alert-danger">{{ $errors->first('notes', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="isChargeable" class="col-sm-2 control-label">kostenpflichtig</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="isChargeable" placeholder="Hier tippen ;)">
            @if ($errors->has('isChargeable'))
              <div class="alert alert-danger">{{ $errors->first('isChargeable', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="courtCountOutdoor" class="col-sm-2 control-label">Felder Outdoor</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="courtCountOutdoor" placeholder="Hier tippen ;)">
            @if ($errors->has('courtCountOutdoor'))
              <div class="alert alert-danger">{{ $errors->first('courtCountOutdoor', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="courtCountIndoor" class="col-sm-2 control-label">Felder Indoor</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="courtCountIndoor" placeholder="Hier tippen ;)">
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

          <div class="col-sm-10">
            <input class="btn btn-primary btn-submit" type="submit" name="" value="speichern">
          </div>
        </div>



      </form>



        </div>
    </div>
</div>
@endsection
