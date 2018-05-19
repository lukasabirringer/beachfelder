@extends('layouts.backend')

@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h1 class="title-page__title">Feld in </h1>
        <p class="-typo-copy -text-color-gray-01">{{ $beachcourt->postalCode }} {{ $beachcourt->city }}, {{ $beachcourt->street }} {{ $beachcourt->houseNumber }}</p>
        <p class="-typo-copy -text-color-gray-01">Letztes Update: {{ $beachcourt->updated_at }}</p>
      </div>
    </div>

    <div class="row">
      <div class="column column--12 -spacing-a">
        <hr class="divider">
      </div>
    </div>
    <form class="form-horizontal" action="{{ URL::route('backendBeachcourt.update', $beachcourt->id) }}" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="column column--12 column--m-2 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="PLZ" name="postalCode" value="{{ $beachcourt->postalCode }}">
            <span class="input__label">PLZ</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('postalCode'))
            <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
          @endif
        </div>
        <div class="column column--12 column--m-4 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Stadt" name="city" value="{{ $beachcourt->city }}">
            <span class="input__label">Stadt</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('city'))
            <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-4 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Straße" name="street" value="{{ $beachcourt->street }}">
            <span class="input__label">Straße</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('street'))
            <div class="alert alert-danger">{{ $errors->first('street', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-2 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Hausnummer" name="houseNumber" value="{{ $beachcourt->houseNumber }}">
            <span class="input__label">Hausnummer</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('houseNumber'))
            <div class="alert alert-danger">{{ $errors->first('houseNumber', ':message') }}</div>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Bundesland" name="state" value="{{ $beachcourt->state }}">
            <span class="input__label">Bundesland</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('state'))
            <div class="alert alert-danger">{{ $errors->first('state', ':message') }}</div>
          @endif
        </div>
        <div class="column column--12 column--m-6 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Land" name="country" value="{{ $beachcourt->country }}">
            <span class="input__label">Land</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('country'))
            <div class="alert alert-danger">{{ $errors->first('country', ':message') }}</div>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-b">
            <label class="input">
              <input type="text" class="input__field" placeholder="Latitude" name="latitude" value="{{ $beachcourt->latitude }}">
              <span class="input__label">Latitude</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('latitude'))
              <div class="alert alert-danger">{{ $errors->first('latitude', ':message') }}</div>
            @endif
        </div>
        <div class="column column--12 column--m-6 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Longitude" name="longitude" value="{{ $beachcourt->longitude }}">
            <span class="input__label">Longitude</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('longitude'))
            <div class="alert alert-danger">{{ $errors->first('longitude', ':message') }}</div>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-b">
            <label class="input">
              <input type="text" class="input__field" placeholder="Betreiber" name="operator" value="{{ $beachcourt->operator }}">
              <span class="input__label">Betreiber</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('operator'))
              <div class="alert alert-danger">{{ $errors->first('operator', ':message') }}</div>
            @endif
        </div>
        <div class="column column--12 column--m-6 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Betreiber Website" name="operatorUrl" value="{{ $beachcourt->operatorUrl }}">
            <span class="input__label">Betreiber Website</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('operatorUrl'))
            <div class="alert alert-danger">{{ $errors->first('operatorUrl', ':message') }}</div>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="column column--12 -spacing-b">
            <label class="textarea">
              <textarea class="textarea__field" name="notes">{{ $beachcourt->notes }}</textarea>
              <span class="textarea__label">Notizen</span>
            </label>
            @if ($errors->has('notes'))
              <div class="alert alert-danger">{{ $errors->first('notes', ':message') }}</div>
            @endif
        </div>
      </div>

      <div class="row">
        <div class="column column--12 column--m-3 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Anzahl Felder outdoor" name="courtCountOutdoor" value="{{ $beachcourt->courtCountOutdoor }}">
            <span class="input__label">Anzahl Felder outdoor</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('courtCountOutdoor'))
            <div class="alert alert-danger">{{ $errors->first('courtCountOutdoor', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-3 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="Anzahl Felder indoor" name="courtCountIndoor" value="{{ $beachcourt->courtCountIndoor }}">
            <span class="input__label">Anzahl Felder indoor</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('courtCountIndoor'))
            <div class="alert alert-danger">{{ $errors->first('courtCountIndoor', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-3 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="kostenpflichtig" name="isChargeable" value="{{ $beachcourt->isChargeable }}">
            <span class="input__label">kostenpflichtig</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('isChargeable'))
            <div class="alert alert-danger">{{ $errors->first('isChargeable', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-3 -spacing-b">
          <label class="input">
            <input type="text" class="input__field" placeholder="öffentlich zugänglich" name="isPublic" value="{{ $beachcourt->isPublic }}">
            <span class="input__label">öffentlich zugänglich</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('isPublic'))
            <div class="alert alert-danger">{{ $errors->first('isPublic', ':message') }}</div>
          @endif
        </div>

      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-b">
          <p class="-typo-copy -text-color-gray-01">Status</p>
          <select class="form-control" name="submitState" class="selectpicker">
            <optgroup label="aktueller Status">
              <option>{{ $beachcourt->submitState }}</option>
            </optgroup>
            <optgroup label="neuer Status">
              <option value="submitted">eingereicht</option>
              <option value="approved">veröffentlicht</option>
              <option value="abgelehnt">abgelehnt</option>
            </optgroup>
          </select>
          @if ($errors->has('submitState'))
            <div class="alert alert-danger">{{ $errors->first('submitState', ':message') }}</div>
          @endif
        </div>
        <div class="column column--12 column--m-6 -spacing-b">
          <button class="button-primary">
            <span class="button-primary__label">Speichern</span>
            <span class="button-primary__label button-primary__label--hover">Speichern</span>
          </button>
        </div>
      </div>
    </form>
  </div> <!-- .content__main ENDE -->
@endsection
