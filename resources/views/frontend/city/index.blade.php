@extends('layouts.frontend')

@section('content')
	<div class="content__main">
		<div class="row">
		  <div class="column column--12">
		    <h2 class="title-page__title">Beachfelder in den größten Städten Deutschlands</h2>
		  </div>
		</div>

		<div class="row -spacing-a">
			<div class="column column--12">
		  	<hr class="divider">
		  </div>
		</div>

		<div class="row -spacing-b">
			<div class="column column--12">
				@foreach ($cities as $city)
					<p>
						<a href="/stadt/{{ strtolower($city->name) }}">{{ $city->id }}</a>
						<a href="/stadt/{{ strtolower($city->name) }}">{{ $city->name }}</a>
					</p>
				@endforeach
			</div>
		</div>

	</div><!-- .content__main ENDE -->
@endsection
