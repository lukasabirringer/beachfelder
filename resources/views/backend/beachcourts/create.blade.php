@extends('layouts.backend')

@section('content')
	<div class="content__main">
		<div class="row">
		  <div class="column column--12">
		    <hr class="divider">
		  </div>
		</div>


		<div class="row">
		  <div class="column column--12">
		    <p class="-typo-copy -text-color-gray-01"><a class="link-icon-text" href="{{ URL::previous() }}"><span class="link-icon-text__icon" data-feather="chevron-left"></span><span class="link-icon-text__text">Zurück zur Übersicht</span></a></p>
		  </div>
		</div>
		<div class="row">
		  <div class="column column--12">
		    <hr class="divider">
		  </div>
		</div>
		
		<div class="row">
		  <div class="column column--12">
		    <h1 class="title-page__title">Feld anlegen</h1>
		  </div>
		</div>

		<div class="row">
		  <div class="column column--12 -spacing-a">
		    <hr class="divider">
		  </div>
		</div>

		<form class="form-horizontal" action="{{ URL::route('backendBeachcourt.store') }}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
			  <div class="column column--12 column--m-2 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="PLZ" name="postalCode">
			      <span class="input__label">PLZ</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('postalCode'))
			      <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
			    @endif
			  </div>
			  <div class="column column--12 column--m-2 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Stadt" name="city">
			      <span class="input__label">Stadt</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('city'))
			      <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
			    @endif
			  </div>

			  <div class="column column--12 column--m-2 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Stadtteil" name="district" >
			      <span class="input__label">Stadtteil</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('district'))
			      <div class="alert alert-danger">{{ $errors->first('district', ':message') }}</div>
			    @endif
			  </div>

			  <div class="column column--12 column--m-4 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Straße" name="street">
			      <span class="input__label">Straße</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('street'))
			      <div class="alert alert-danger">{{ $errors->first('street', ':message') }}</div>
			    @endif
			  </div>

			  <div class="column column--12 column--m-2 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Hausnummer" name="houseNumber">
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
			      <input type="text" class="input__field" placeholder="Bundesland" name="state">
			      <span class="input__label">Bundesland</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('state'))
			      <div class="alert alert-danger">{{ $errors->first('state', ':message') }}</div>
			    @endif
			  </div>
			  <div class="column column--12 column--m-6 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Land" name="country">
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
			        <input type="text" class="input__field" placeholder="Latitude" name="latitude">
			        <span class="input__label">Latitude</span>
			        <div class="input__border"></div>
			      </label>
			      @if ($errors->has('latitude'))
			        <div class="alert alert-danger">{{ $errors->first('latitude', ':message') }}</div>
			      @endif
			  </div>
			  <div class="column column--12 column--m-6 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Longitude" name="longitude" >
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
			        <input type="text" class="input__field" placeholder="Betreiber" name="operator">
			        <span class="input__label">Betreiber</span>
			        <div class="input__border"></div>
			      </label>
			      @if ($errors->has('operator'))
			        <div class="alert alert-danger">{{ $errors->first('operator', ':message') }}</div>
			      @endif
			  </div>
			  <div class="column column--12 column--m-6 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Betreiber Website" name="operatorUrl">
			      <span class="input__label">Betreiber Website</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('operatorUrl'))
			      <div class="alert alert-danger">{{ $errors->first('operatorUrl', ':message') }}</div>
			    @endif
			  </div>
			</div>

			<div class="row">
			  <div class="column column--12 column--m-6 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Ansprechpartner" name="operatorContactPerson">
			      <span class="input__label">Ansprechpartner</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('operatorContactPerson'))
			      <div class="alert alert-danger">{{ $errors->first('operatorContactPerson', ':message') }}</div>
			    @endif
			  </div>
			  <div class="column column--12 column--m-6 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Ansprechpartner E-Mail" name="operatorContactPersonEmail">
			      <span class="input__label">Ansprechpartner E-Mail</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('operatorContactPersonEmail'))
			      <div class="alert alert-danger">{{ $errors->first('operatorContactPersonEmail', ':message') }}</div>
			    @endif
			  </div>
			</div>

			<div class="row">
			  <div class="column column--12 column--m-6 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Ansprechpartner Telefon" name="operatorContactPersonPhone">
			      <span class="input__label">Ansprechpartner Telefon</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('operatorContactPersonPhone'))
			      <div class="alert alert-danger">{{ $errors->first('operatorContactPersonPhone', ':message') }}</div>
			    @endif
			  </div>
			  <div class="column column--12 column--m-6 -spacing-b">
			    
			  </div>
			</div>

			<div class="row">
			  <div class="column column--12 -spacing-b">
			      <label class="textarea">
			        <textarea class="textarea__field" name="notes"></textarea>
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
			      <input type="text" class="input__field" placeholder="Anzahl Felder outdoor" name="courtCountOutdoor">
			      <span class="input__label">Anzahl Felder outdoor</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('courtCountOutdoor'))
			      <div class="alert alert-danger">{{ $errors->first('courtCountOutdoor', ':message') }}</div>
			    @endif
			  </div>

			  <div class="column column--12 column--m-3 -spacing-b">
			    <label class="input">
			      <input type="text" class="input__field" placeholder="Anzahl Felder indoor" name="courtCountIndoor">
			      <span class="input__label">Anzahl Felder indoor</span>
			      <div class="input__border"></div>
			    </label>
			    @if ($errors->has('courtCountIndoor'))
			      <div class="alert alert-danger">{{ $errors->first('courtCountIndoor', ':message') }}</div>
			    @endif
			  </div>
			  <div class="column column--12 column--m-6 -spacing-b">
			    <p class="-typo-copy -text-color-green">Status</p>
			    <select class="form-control" name="submitState" class="selectpicker">
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
			  
			</div>
			<div class="row">
			  <div class="column column--12 column--m-3 -spacing-b">
			    <p class="-typo-copy -text-color-green">Flutlicht</p>
			    <label class="input-radio -spacing-d">
			      <input type="radio" class="input-radio__field" name="floodlight" value="1">
			      <span class="input-radio__label">Flutlicht vorhanden</span>
			    </label>

			    <label class="input-radio -spacing-d">
			      <input type="radio" class="input-radio__field" name="floodlight" value="0">
			      <span class="input-radio__label">Flutlicht nicht vorhanden</span>
			    </label>
			    @if ($errors->has('floodlight'))
			      <div class="alert alert-danger">{{ $errors->first('floodlight', ':message') }}</div>
			    @endif
			  </div>

			  <div class="column column--12 column--m-3 -spacing-b">
			    <p class="-typo-copy -text-color-green">Dusche</p>
			    <label class="input-radio -spacing-d">
			      <input type="radio" class="input-radio__field" name="shower" value="1">
			      <span class="input-radio__label">Dusche vorhanden</span>
			    </label>

			    <label class="input-radio -spacing-d">
			      <input type="radio" class="input-radio__field" name="shower" value="0">
			      <span class="input-radio__label">Dusche nicht vorhanden</span>
			    </label>
			    @if ($errors->has('shower'))
			      <div class="alert alert-danger">{{ $errors->first('shower', ':message') }}</div>
			    @endif
			  </div>

			  <div class="column column--12 column--m-3 -spacing-b">
			    <p class="-typo-copy -text-color-green">öffentlich/nicht öffentlich</p>
			    <label class="input-radio -spacing-d">
			      <input type="radio" class="input-radio__field" name="isPublic" value="1">
			      <span class="input-radio__label">öffentlich zugänglich</span>
			    </label>

			    <label class="input-radio -spacing-d">
			      <input type="radio" class="input-radio__field" name="isPublic" value="0">
			      <span class="input-radio__label">nicht öffentlich zugänglich</span>
			    </label>
			    @if ($errors->has('isPublic'))
			      <div class="alert alert-danger">{{ $errors->first('isPublic', ':message') }}</div>
			    @endif
			  </div>

			  <div class="column column--12 column--m-3 -spacing-b">
			    <p class="-typo-copy -text-color-green">Zeitabhängige Gebühr?</p>
			    <label class="input-radio -spacing-d">
			      <input type="radio" class="input-radio__field" name="isChargeable" value="1">
			      <span class="input-radio__label">Ja</span>
			    </label>

			    <label class="input-radio -spacing-d">
			      <input type="radio" class="input-radio__field" name="isChargeable" value="0">
			      <span class="input-radio__label">Nein</span>
			    </label>
			    @if ($errors->has('isChargeable'))
			      <div class="alert alert-danger">{{ $errors->first('isChargeable', ':message') }}</div>
			    @endif
			  </div>
			</div>

			<div class="row">
				<div class="column column--12 column--m-3 -spacing-b">
					<p class="-typo-copy -text-color-green">Dauerhafte Mitgliedsgebühr fällig?</p>
					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="isMembership" value="1">
					  <span class="input-radio__label">Ja</span>
					</label>

					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="isMembership" value="0">
					  <span class="input-radio__label">Nein</span>
					</label>
					@if ($errors->has('isMembership'))
					  <div class="alert alert-danger">{{ $errors->first('isMembership', ':message') }}</div>
					@endif
				</div>
				<div class="column column--12 column--m-3 -spacing-b">
					<p class="-typo-copy -text-color-green">Einmalige Zutrittsgebühr?</p>
					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="isSingleAccess" value="1">
					  <span class="input-radio__label">Ja</span>
					</label>

					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="isSingleAccess" value="0">
					  <span class="input-radio__label">Nein</span>
					</label>
					@if ($errors->has('isSingleAccess'))
					  <div class="alert alert-danger">{{ $errors->first('isSingleAccess', ':message') }}</div>
					@endif
				</div>
				<div class="column column--12 column--m-3 -spacing-b">
					<p class="-typo-copy -text-color-green">See oder Freibad?</p>
					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="isswimmingLake" value="1">
					  <span class="input-radio__label">Ja</span>
					</label>

					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="isswimmingLake" value="0">
					  <span class="input-radio__label">Nein</span>
					</label>
					@if ($errors->has('isswimmingLake'))
					  <div class="alert alert-danger">{{ $errors->first('isswimmingLake', ':message') }}</div>
					@endif
				</div>
				<div class="column column--12 column--m-3 -spacing-b"></div>
			</div>

			<div class="row">
			  <div class="column column--12 -spacing-a">
			    <h3 class="-typo-headline-03 -text-color-green"> Bilder </h3>
			  </div>
			</div>

			<div class="row">
				<div class="column column--12 column--m-6 -spacing-a">

					<label class="input-upload" id="lfm" data-input="thumbnail" data-preview="holder">
					  <input type="text" class="input-upload__field" id="thumbnail" name="filepath" >
					  <span class="input-upload__label">
					    <span class="input-upload__icon" data-feather="upload"></span>
					    <span class="input-upload__text">Lade Bilder hoch</span>
					  </span>
					</label>
					<img id="holder" style="margin-top:15px;max-height:100px;">    		
				</div>
				<div class="column column--12 column--m-6 -spacing-a">
					
				</div>
			</div>

			<div class="row">
			  <div class="column column--12 column--m-6 -spacing-b">
			    
			  </div>
			  <div class="column column--12 column--m-6 -spacing-b">
			    <button class="button-primary" type="submit">
			      <span class="button-primary__label">Speichern</span>
			      <span class="button-primary__label button-primary__label--hover">Speichern</span>
			    </button>
			  </div>
			</div>
		</form>
		
		<div class="row">
		  <div class="column column--12 -spacing-a">
		    <hr class="divider">
		  </div>
		</div>
		<div class="row">
		  <div class="column column--12">
		    <p class="-typo-copy -text-color-gray-01"><a class="link-icon-text" href="{{ URL::previous() }}"><span class="link-icon-text__icon" data-feather="chevron-left"></span><span class="link-icon-text__text">Zurück zur Übersicht</span></a></p>
		  </div>
		</div>
		<div class="row">
		  <div class="column column--12">
		    <hr class="divider">
		  </div>
		</div>
	</div> <!-- .content__main ENDE -->
	
@endsection
@push('scripts')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>

	<script>
		$('#lfm').filemanager('image');
	</script>
@endpush