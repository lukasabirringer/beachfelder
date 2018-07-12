@extends('layouts.frontend')

@section('title_and_meta')
    <title>Beachvolleyballfelder in {{ $name }} | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
    <meta name="description" content="Hier findest du alle Beachfelder in {{ $name }}. Sehe dir alle Beachvolleyball-Felder in {{ $name }} an und finde dein nächstes Lieblingsfeld!" />
@endsection

	<!-- <div class="section section--city" style="background: url('{{ asset("uploads/cities") }}/{{ $city->slug }}.jpg');background-repeat: no-repeat; background-size: cover;">
		<div class="section__content" style="position: absolute; top: 50px; left: 30px; max-width: 450px;">
			<h1 class="-typo-headline-01 -text-color-white" >Beachfeld in {{$name}}</h1>	
			<p class="section__headline -typo-copy -text-color-white -spacing-b">Beachfeld in {{ $description }}</p>
		</div>
		<div class="section__info -align-center" style="position: absolute; bottom: 0; left: 0; width: 100%; display: flex; flex-direction: row;">
			<div class="section__info-item -background-color-gray-03" style="width: 45%; border-right: 1px #f2f2f2 solid; padding: 20px;">
				<p class="-typo-copy -typo-copy--small -text-color-gray-01">Gelistete Beachfelder</p>
				<h3 class="-typo-headline-03 -text-color-gray-01">{{$beachcourtCount}}</h3>	
				<p class="-typo-copy -typo-copy--small -text-color-gray-01">Beachvolleyballfelder</p>
			</div>
			<div class="section__info-item -background-color-white" style="width: 10%; padding: 20px; box-shadow: 0 0 3px 2px rgba(0, 0, 0, .15); z-index: 1; display: flex; align-items: center; justify-content: center;">
				<a href="#"><span data-feather="chevron-down" style="width: 50px; height: 50px; color: #f0f0f0;"></span></a>
			</div>
			<div class="section__info-item -background-color-green" style="width: 45%; padding: 20px;">
				<a href="{{ URL::route('beachcourtsubmit.submit') }}" class="-link-text" style="text-decoration: none; display: block;">
					<p class="-typo-copy -typo-copy--small -text-color-white">Neues</p>
					<h3 class="-typo-headline-03 -text-color-white">Feld</h3>	
					<p class="-typo-copy -typo-copy--small -text-color-white">einreichen</p>
				</a>
			</div>
		</div>
	</div> -->
@section('content')
  <div class="content__main">
  	@include('frontend.city.includes.headline')
		@include('frontend.reusable-includes.divider')
    <div class="row">
      @foreach ($beachcourts as $beachcourt)
        @if($beachcourt-> submitState == 'approved')
          <div class="column column--12 column--s-6 column--m-4 -spacing-b">
            @include('frontend.reusable-includes.beachcourt-item')
          </div>
        @endif
      @endforeach
    </div>

    <div class="row">
    	<div class="column column--12 -spacing-a">
    		<!-- Beachcourt-Detail-Page -->
    		<ins class="adsbygoogle"
    		     style="display:block"
    		     data-ad-client="ca-pub-2244539104246669"
    		     data-ad-slot="1398925976"
    		     data-ad-format="auto"></ins>
    	</div>
    </div>
  </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
@endpush