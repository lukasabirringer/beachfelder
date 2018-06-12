@extends('layouts.frontend')

@section('title_and_meta')
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-2244539104246669",
	    enable_page_level_ads: true
	  });
	</script>
  <title>Fragen und Antworten | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
 @endsection

@section('content')
	<div class="content__main">
		<div class="row">
		  <div class="column column--12">
		    <h2 class="title-page__title">Häufig gestellte Fragen und Antworten</h2>
		  </div>
		</div>
		<div class="row -spacing-a">
		  <div class="column column--12">
		    <hr class="divider">
		  </div>
		</div>
		
		<div class="row -spacing-a">
			<ul class="accordion-vertical">
				@foreach($faqs as $faq)
					@if($faq->isPublic == 1)
						<li class="accordion-vertical__item">
							<a href="#" class="accordion-vertical__title">{{ $faq->title }} <span class="accordion-vertical__icon" data-feather="chevron-down"></span></a>
							
							<div class="accordion-vertical__content row">
								<div class="column column--12">
									{!! html_entity_decode($faq['content']) !!}
								</div>
							</div>
						</li>
					@endif
				@endforeach	
			</ul>
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
	</div>
@endsection

@push('scripts')
	<script>

		(adsbygoogle = window.adsbygoogle || []).push({});
		
		var allPanels = $('.accordion-vertical__content').hide();

		$('.accordion-vertical__title').click(function() {
			allPanels.slideUp();

		   	$(this).next().slideDown();
		   	return false;
		});
		
	</script>
@endpush