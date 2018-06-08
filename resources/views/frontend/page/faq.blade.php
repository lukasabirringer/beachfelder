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
		    <h2 class="title-page__title">Häufig gestellte Fragen und deren Antworten</h2>
		  </div>
		</div>
		<div class="row -spacing-a">
		  <div class="column column--12">
		    <hr class="divider">
		  </div>
		</div>
		@foreach($faqs as $faq)
		<div class="row">
			<div class="column column--12">
				<h1>{{ $faq->title }}</h1>
			</div>
		</div>
		@endforeach
	</div>
@endsection