@extends('layouts.backend')

@section('content')

	<div class="content__main">
		@if (\Session::has('success'))
		  <ul class="notification">
		    <li class="notification__item">
		      <span class="notification__icon" data-feather="info"></span>
		      <p class="notification__text">{!! \Session::get('success') !!}</p>

		      <button class="button-secondary notification-button">
		        <span class="button-secondary__label notification-button__label">OK</span>
		      </button>
		    </li>
		  </ul>
		@endif
		
		<div class="row">
		    <div class="column column--12">
		        <h2 class="title-page__title">Unsere größten Städte</h2>
		    </div>
		</div>

		<div class="row -spacing-a">
	    <div class="column column--12">
	    	<hr class="divider">	
	    </div>
		</div>
		<div class="row">
			<div class="column column--12">
				<ul class="accordion-horizontal">
					@foreach ($cities as $city)
						<li class="accordion-vertical__item">
							<a href="#" class="accordion-vertical__title">
								{{ $city->name }}
								<span class="accordion-vertical__icon" data-feather="chevron-down"></span>
							</a>
							<div class="accordion-vertical__content row">
								<div class="column column--12 column--m-4">
									<span class="-typo-copy -typo-copy--bold">PLZ Bereich</span> <br>
									{{ $city->postalCodeMin }} bis {{ $city->postalCodeMax }} <br>
									<span class="-typo-copy -typo-copy--bold">Bevölkerung</span> <br>
									{{ $city->population }} <br>
									<span class="-typo-copy -typo-copy--bold">Bearbeiten</span> <br>
									<a href="{{ URL::route('backendCity.edit', $city->id) }}" class="link-icon -text-color-gray-01">
									    <span data-feather="edit"></span>
									</a>
								</div>
								<div class="column column--12 column--m-8">
									<span class="-typo-copy -typo-copy--bold">Beschreibung</span> <br>
									{{ $city->description }}
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
	<script>
		var allPanels = $('.accordion-vertical__content').hide();

		$('.accordion-vertical__title').click(function() {
			allPanels.slideUp();

		   	$(this).next().slideDown();
		   	return false;
		});

		$('.notification-button').click(function() {
	  	$(this).parent().parent('.notification').slideUp();
		});
	</script>
@endpush