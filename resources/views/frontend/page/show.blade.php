@extends('layouts.frontend')

@section('title_and_meta')
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-2244539104246669",
	    enable_page_level_ads: true
	  });
	</script>
  <title>{{ $page['headline'] }} | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
 @endsection

@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">{{ $page['headline'] }}</h2>
      </div>
    </div>
    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>
    
    {!! html_entity_decode($page['content']) !!}

    @include('frontend.reusable-includes.divider')
    
    @include('frontend.reusable-includes.teaser-contest')

    @include('frontend.reusable-includes.divider')

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
	</script>
@endpush