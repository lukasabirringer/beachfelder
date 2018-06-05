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
				<h1 class="title-page__title">Die Stadt "{{ $city->name }}" bearbeiten</h1>
				<p class="-typo-copy -text-color-gray-01">Letztes Update: {{ $city->updated_at }}</p>
			</div>
		</div>

		<div class="row">
			<div class="column column--12 -spacing-a">
				<hr class="divider">
			</div>
		</div>
		<form class="form-horizontal" action="{{ URL::route('backendCity.update', $city->id) }}" method="POST">
			<input type="hidden" name="_method" value="PATCH">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="column column--12 column--m-6 -spacing-b">
					<label class="input">
						<input type="text" class="input__field" placeholder="Bevölkerung" name="population" value="{{ $city->population }}">
						<span class="input__label">Bevölkerung</span>
						<div class="input__border"></div>
					</label>
					@if ($errors->has('population'))
						<div class="alert alert-danger">{{ $errors->first('population', ':message') }}</div>
					@endif
				</div>
				<div class="column column--12 column--m-6"></div>
			</div>
			<div class="row">
				<div class="column column--12 -spacing-b">
					<label class="textarea">
						<textarea class="textarea__field description" name="description">{{ $city->description }}</textarea>
						<span class="textarea__label">Beschreibung</span>
					</label>
					@if ($errors->has('description'))
						<div class="alert alert-danger">{{ $errors->first('description', ':message') }}</div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="column column--12 -spacing-b">
					<span id="charlimit" class="-typo-copy -text-color-red"><strong class="words-left">150 Wörter noch</strong></span>
					<span class="words-seo -typo-copy -text-color-green"> // SEO-optimal</span>
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
	<script>
		
		$('.words-seo').hide();

		var wordLen = 150,
				len; // Maximum word length

		$('document').ready(function(event) {
				len = $('.description').val().split(/[\s]+/);

				if (len.length > wordLen) { 
					if ( event.keyCode == 46 || event.keyCode == 8 ) {// Allow backspace and delete buttons
			    } else if (event.keyCode < 48 || event.keyCode > 57 ) {//all other buttons
			    	event.preventDefault();
			    }
				}

				wordsLeft = (wordLen) - len.length;
				$('.words-left').html(wordsLeft+ ' Worte noch');

				if(wordsLeft == 0) {
					$('.words-left').toggleClass('-text-color-green');
				}
		});

		$('.description').keydown(function(event) {	
			len = $('.description').val().split(/[\s]+/);
			if (len.length > wordLen) { 
				if ( event.keyCode == 46 || event.keyCode == 8 ) {// Allow backspace and delete buttons
		    } else if (event.keyCode < 48 || event.keyCode > 57 ) {//all other buttons
		    	event.preventDefault();
		    }
			}

			wordsLeft = (wordLen) - len.length;
			$('.words-left').html(wordsLeft+ ' Worte noch');
			
			if(wordsLeft == 0) {
				$('.words-left').toggleClass('-text-color-green');
			}
		});
	</script>
@endpush