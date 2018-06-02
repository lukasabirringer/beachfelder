@extends('layouts.frontend')

@section('title_and_meta')
    <title>Schick' uns Bilder vom Feld in {{ $beachcourt->postalCode }} {{ $beachcourt->city }} | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
 @endsection

@section('content')
	@if (\Session::has('success'))
	  <ul class="notification">
	    <li class="notification__item">
	      <span class="notification__icon" data-feather="info"></span>
	      <p class="notification__text">{!! \Session::get('success') !!}</p>

	      <button class="button-secondary notification-button close" data-dismiss="alert" aria-label="close">
	        <span class="button-secondary__label notification-button__label">OK</span>
	      </button>
	    </li>
	  </ul>
	@endif

	<div class="content__main">
		<div class="row">
			<div class="columm column--12">
				<h2 class="title-page__title">Schick' uns Bilder</h2>
				<p class="title-page__subtitle">Bitte hilf uns, den Service zu verbessern, indem du uns Fotos des Beachfelds schickst. Unter den ersten 500 Einsendern verlosen wir <span class="-typo-copy -typo-copy--bold">100 Mikasa-Beachpakete</span> im Gesamtwert von 2000 EUR!</p>
			</div>
		</div>
		
		@include('frontend.reusable-includes.divider')

		<div class="row">
			<div class="column column--12 -spacing-c">
				<p class="-typo-copy -text-color-gray-01">
					Bitte beachte unsere Vorgaben für informative Bilder. Jede Anlage sollte mit 3 Bildern dargestellt werden:
				</p>
			</div>
		</div>

		<div class="row">
			<div class="column column--12 column--m-4">
				<img src="{{url('/')}}/images/slide-image-01-retina.jpg" class="image image--max-width image--shadow -spacing-c">
				<h4 class="-typo-headline-04 -text-color-gray-01 -spacing-d" data-aos="fade-up">1. Gesamtansicht der Anlage</h4>
				<p class="-typo-copy -text-color-gray-01 -spacing-c" data-aos="fade-up">Auf dem ersten Bild sollte die Anlage in einem Übersichtsbild aufgenommen werden – gern auch von einem erhöhten Standpunkt.</p>
			</div>
			<div class="column column--12 column--m-4">
				<img src="{{url('/')}}/images/slide-image-02-retina.jpg" class="image image--max-width image--shadow -spacing-c">
				<h4 class="-typo-headline-04 -text-color-gray-01 -spacing-d" data-aos="fade-up">2. Detailbild Pfostenanlage und Netz</h4>
				<p class="-typo-copy -text-color-gray-01 -spacing-c" data-aos="fade-up">Auf dem zweiten Bild sollte die Pfostenanlage und das Netz, gegebenenfalls mit Antennen, aufgenommen werden.</p>
			</div>
			<div class="column column--12 column--m-4">
				<img src="{{url('/')}}/images/slide-image-03-retina.jpg" class="image image--max-width image--shadow -spacing-c">
				<h4 class="-typo-headline-04 -text-color-gray-01 -spacing-d" data-aos="fade-up">3. Detailbild Sand und Courtline</h4>
				<p class="-typo-copy -text-color-gray-01 -spacing-c" data-aos="fade-up">Auf dem dritten Bild sollte die Courtline aufgenommen werden. Damit bekommen deine Beachfreunde auch einen Eindruck von der Qualität des Sandes.</p>
			</div>
		</div>

		<div class="row">
			<div class="column column--12 -spacing-c">
				<p class="-typo-copy -text-color-gray-01 -spacing-c">Wenn es weitere interessante Informationen über den Platz gibt, kannst du diese gern ebenfalls mit Bildern dokumentieren.</p>
			</div>
		</div>

		@include('frontend.reusable-includes.divider')

		<div class="row">
			<div class="column column--12 -spacing-a">
				<h3 class="-typo-headline-03 -text-color-green">Bilder hochladen</h3>
			</div>
		</div>

		<div class="row">
			<div class="column column--12 -spacing-d">
				<p class="-typo-copy -text-color-gray-01">Die Bilder sollten eine Auflösung von mindestens 600 x 400 px haben</p>
			</div>
		</div>

		<form id="form1" action="{{ url('/beachvolleyballfeld/upload') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
	  	<div class="row">
	  		<div class="column column--12 column--m-4">
	  			<label class="input-upload -spacing-a">
	  				<input type="hidden" name="beachcourtId" value="{{ $beachcourt->id }}">
	  				<input type="file" name="photos[]" id="gallery-photo-add" class="input-upload__field" data-multiple-caption="{count} Bilder ausgewählt" multiple />	
	  				<span class="input-upload__label">
	  					<span class="input-upload__icon" data-feather="upload"></span>
	  					<span class="input-upload__text">Bilder auswählen</span>
	  				</span>
	  			</label>
	  		
	  			@if ($errors->has('photos'))
	  				<div class="alert alert-danger">{{ $errors->first('photos', ':message') }}</div>
	  			@endif
	  		</div>
		  	<div class="column column--12 column--m-8">
		  		<div class="gallery -spacing-b"></div>
		  	</div>
		  </div>

		  <div class="row">
		  	<div class="column column--12 column--s-6">
		  	@if (Auth::check())
		  		<label class="input-toggle -spacing-a">
		  		  <input type="hidden" class="input-toggle__hidden" name="contestParticipation" value="0">
		  		  <input type="checkbox" class="input-toggle__field contestParticipation" name="contestParticipation" value="0">
		  		  <span class="input-toggle__switch"></span>
		  		  <span class="input-toggle__label">Ja, ich möchte an der Verlosung der 200 Preise teilnehmen</span>
		  		</label>
		  	</div>
		  	<div class="column column--12 column--s-6">
		  		<button class="button-primary -spacing-a">
		  			<span class="button-primary__label">Absenden</span>
		  			<span class="button-primary__label button-primary__label--hover">Absenden</span>
		  		</button>
		  		@endif
		  		@if (!Auth::check())
        <p class="-typo-copy -text-color-gray-01 -spacing-d -typo-copy--bold">Beachte:</p>
        <p class="-typo-copy -text-color-gray-01">Um ein Feld zu bewerten, musst du dich zuvor als User registrieren und angemeldet sein. <a class="link-text" href="{{ route('register') }}">Registriere dich hier</a> oder <a class="link-text" href="{{ route('login') }}">melde dich an.</a></p>
        @endif
		  	</div>
		  </div>
		</form>
		<div class="row">
			<div class="column column--12 -spacing-a">
				<p class="-typo-copy -typo-copy--small -text-color-gray-01">
					Rechtlicher Hinweis: Mit dem Upload der Bilder überträgst du die Nutzungsrechte an den hochgeladenen Bilder an den Betreiber der Website beachfelder.de. Bitte beachte, dass die Auswahl der Bilder von beachfelder.de vorgenommen wird. Es besteht kein Anspruch auf Veröffentlichung deiner Bilder. 
				</p>
			</div>
		</div>
	</div> <!-- .content__main -->
<!-- <button onclick="$('#gallery-photo-add').val(''); $('.gallery').empty();">clear</button> -->

@endsection

@push('scripts')

	<script>
		var checkbox = $('.contestParticipation');

		if(checkbox.val() == 1) {
		  checkbox.attr('checked', true);
		}

		$('.contestParticipation').click(function() {
			if($(this).is(':checked')) {
		  	$(this).parent().find('.input-toggle__hidden').val(1);
		    $(this).val(1);
			} else {
		    $(this).parent().find('.input-toggle__hidden').val(0);
		    $(this).val(0);
			}
		});

		//shows the counter at the upload field
		;( function( $, window, document, undefined )
		{
			$( '.input-upload__field' ).each( function()
			{
				var $input	 = $( this ),
					$label	 = $input.next( '.input-upload__label' ),
					labelVal = $label.html();

				$input.on( 'change', function( e )
				{
					var fileName = '';

					if( this.files && this.files.length > 1 )
						fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
					else if( e.target.value )
						fileName = e.target.value.split( '\\' ).pop();

					if( fileName )
						$label.find( 'span' ).html( fileName );
					else
						$label.html( labelVal );
				});

				// Firefox bug fix
				$input
				.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
				.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
			});
		})( jQuery, window, document );

		

		$(function() {
			// Multiple images preview in browser
			var imagesPreview = function(input, placeToInsertImagePreview) {

				if (input.files) {
					var filesAmount = input.files.length;

					for (i = 0; i < filesAmount; i++) {
						var reader = new FileReader();

						reader.onload = function(event) {
							$($.parseHTML('<img class="image" style="width: 150px; margin-right: 5px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
						}

						reader.readAsDataURL(input.files[i]);
					}
				}
			};

			$('#gallery-photo-add').on('change', function() {
				$('.gallery').show();
				$('.gallery').empty();
				imagesPreview(this, '.gallery');
			});
		});

		//Closes notification
		$('.notification-button').click(function() {
      $(this).parent().parent('.notification').slideUp();
    });
	</script>
@endpush