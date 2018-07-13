@extends('layouts.backend')

@section('content')
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

    <div class="content__main">
        <div class="row">
          <div class="column column--12">
            <h1 class="title-page__title">Namasté, {{ Auth::user()->userName }}</h1>
            <p class="-typo-copy -text-color-green -spacing-b">
            	<a href="{{ url('backend/beachcourts') }}" class="link-icon-text"><span class="link-icon-text__icon" data-feather="database"></span><span class="link-icon-text__copy">Übersicht aller Beachfelder</span></a> | 
            	<a href="{{ url('backend/user') }}" class="link-icon-text"><span class="link-icon-text__icon" data-feather="users"></span><span class="link-icon-text__copy">Übersicht aller User</span></a> | 
            	<a href="{{ url('backend/cities') }}" class="link-icon-text"><span class="link-icon-text__icon" data-feather="target"></span><span class="link-icon-text__copy">Übersicht aller Städte</span></a> | 
            	<a href="{{ url('backend/faqs') }}" class="link-icon-text"><span class="link-icon-text__icon" data-feather="help-circle"></span><span class="link-icon-text__copy">Übersicht aller FAQs</span></a>
            </p>
          </div>
        </div>
        <div class="row">
        	<div class="column column--3 -spacing-b">
        		<a href="{{ URL::route('backendBeachcourt.create') }}" class="button-primary">
        			<span class="button-primary__label">Neues Feld erstellen</span>
        			<span class="button-primary__label button-primary__label--hover">Neues Feld erstellen</span>
        		</a>
        	</div>
        	<div class="column column--3 -spacing-b">
        		<a href="{{ URL::route('backendFaq.create') }}" class="button-primary">
        			<span class="button-primary__label">Neue FAQ erstellen</span>
        			<span class="button-primary__label button-primary__label--hover">Neue FAQ erstellen</span>
        		</a>
        	</div>
        	<div class="column column--3 -spacing-b">
        		
        	</div>
        	<div class="column column--3 -spacing-b">
        		
        	</div>
        </div>

        <div class="row">
          <div class="column column--12 -spacing-a">
          	<hr class="divider">
          </div>
        </div>

        <div class="row -flex -flex--wrap">
        	<div class="column column--12 column--m-4 -spacing-c">
        		<a href="{{ url('backend/user') }}" style="text-decoration: none;">
							<div class="-background-color-red -align-right" style="padding: 10px; border-radius: 3px;">
	        			<p class="-typo-copy -text-color-white">Anzahl der User</p>
	        			<h3 class="-typo-headline-03 -text-color-white">{{ $userCount }} User</h3>
	        			<p class="-typo-copy -text-color-white">insgesamt</p>
	        		</div>
        		</a>
        	</div>
        	<div class="column column--12 column--m-4 -spacing-c">
        		<div class="-background-color-green -align-right" style="padding: 10px; border-radius: 3px;">
        			<p class="-typo-copy -text-color-white">Anzahl der Favoriten</p>
        			<h3 class="-typo-headline-03 -text-color-white"> {{ $favsCount }} Favoriten</h3>
        			<p class="-typo-copy -text-color-white">insgesamt</p>
        		</div>
        	</div>
        	<div class="column column--12 column--m-4 -spacing-c">
        		<div class="-background-color-petrol -align-right" style="padding: 10px; border-radius: 3px;">
							<p class="-typo-copy -text-color-white">Anzahl der Bewertungen</p>
        			<h3 class="-typo-headline-03 -text-color-white">{{ $ratingCount }} Bewertungen</h3>
        			<p class="-typo-copy -text-color-white">insgesamt</p>
        		</div>
        	</div>
        </div>

        <div class="row">
          <div class="column column--12 -spacing-a">
          	<hr class="divider">
          </div>
        </div>

				<div class="row -flex -flex--wrap">
        	<div class="column column--12 column--s-6 column--m-3 -flex -flex--wrap -spacing-c">
        		<a href="{{ url('backend/beachcourts') }}" style="text-decoration: none; width: 100%;">
							<div class="-background-color-petrol -align-right" style="padding: 10px; width: 100%; border-radius: 3px;">
								<p class="-typo-copy -text-color-white">Anzahl der Felder</p>
								<h3 class="-typo-headline-03 -text-color-white">{{ $beachcourtCount }} Felder</h3>
								<p class="-typo-copy -text-color-white">insgesamt</p>
							</div>
        		</a>
        	</div>
        	<div class="column column--12 column--s-6 column--m-3 -flex -flex--wrap -spacing-c">
        		<div class="-background-color-gray-03 -align-right" style="padding: 10px; width: 100%; border-radius: 3px;">
        			<p class="-typo-copy -text-color-petrol">Anzahl der eingereichten Felder</p>
        			<h3 class="-typo-headline-03 -text-color-petrol"> {{ $submittedCourtsCount }} Felder</h3>
        			<p class="-typo-copy -text-color-petrol">insgesamt</p>
        		</div>
        	</div>
        	<div class="column column--12 column--s-6 column--m-3 -flex -flex--wrap -spacing-c">
        		<div class="-background-color-gray-03 -align-right" style="padding: 10px; width: 100%; border-radius: 3px;">
							<p class="-typo-copy -text-color-petrol">Anzahl der veröffentlichten Felder</p>
        			<h3 class="-typo-headline-03 -text-color-petrol">{{ $approvedCourtsCount }} Felder</h3>
        			<p class="-typo-copy -text-color-petrol">insgesamt</p>
        		</div>
        	</div>
        	<div class="column column--12 column--s-6 column--m-3 -flex -flex--wrap -spacing-c">
        		<div class="-background-color-gray-03 -align-right" style="padding: 10px; width: 100%; border-radius: 3px;">
							<p class="-typo-copy -text-color-petrol">Anzahl der Felder ohne Rating</p>
        			<h3 class="-typo-headline-03 -text-color-petrol">{{ $courtWithoutPicturesRating }} Felder</h3>
        			<p class="-typo-copy -text-color-petrol">insgesamt</p>
        		</div>
        	</div>
        </div>
        
        <!-- <div class="row">
            <div class="column column--12 column--s-6 -spacing-b">
              {{-- Anzahl (Courts, User, Bewertungen, Favoriten) --}}
              <h4 class="-typo-headline-04 -text-color-gray-01">Allgemeines</h4>
              <div class="icon-text -spacing-b">
                <span class="icon-text__icon" data-feather="users"></span>
                <span class="icon-text__text">User insgesamt: {{ $userCount }}</span>
              </div>

              <div class="icon-text -spacing-e">
                <span class="icon-text__icon" data-feather="heart"></span>
                <span class="icon-text__text">Favoriten insgesamt: {{ $favsCount }}</span>
              </div>

              <div class="icon-text -spacing-e">
                <span class="icon-text__icon" data-feather="award"></span>
                <span class="icon-text__text">Bewertungen insgesamt: {{ $ratingCount }}</span>
              </div>
            </div>
            <div class="column column--12 column--s-6 -spacing-b">
                {{-- Court Status (eingereichte, approved, keine Bilder, keine Bewertung) --}}
                <h4 class="-typo-headline-04 -text-color-gray-01">Beachfelder</h4>
                <div class="icon-text -spacing-b">
                  <span class="icon-text__icon" data-feather="database"></span>
                  <span class="icon-text__text">Felder insgesamt: {{ $beachcourtCount }}</span>
                </div>

                <div class="icon-text -spacing-e">
                  <span class="icon-text__icon" data-feather="plus-circle"></span>
                  <span class="icon-text__text">eingereichte Felder: {{ $submittedCourtsCount }}</span>
                </div>

                <div class="icon-text -spacing-e">
                  <span class="icon-text__icon" data-feather="check"></span>
                  <span class="icon-text__text">veröffentlichte Felder: {{ $approvedCourtsCount }}</span>
                </div>

                <div class="icon-text -spacing-e">
                  <span class="icon-text__icon" data-feather="award"></span>
                  <span class="icon-text__text">Felder ohne Bewertung: {{ $courtWithoutPicturesRating }}</span>
                </div>
            </div>
        </div> -->

        <div class="row">
	        <div class="column column--12 -spacing-a">
	        	<hr class="divider">
	        </div>
        </div>

        <div class="row">
            <div class="column column--12">
                <h4 class="-typo-headline-04 -text-color-gray-01">Die neusten eingereichten Beachfelder</h4>
                <div class="row">
                    <div class="column column--12 column--s-1 -spacing-a">
                        <span class="-typo-copy -typo-copy--bold -text-color-gray-01">ID</span>
                    </div>
                    <div class="column column--12 column--s-3 -spacing-a">
                        <span class="-typo-copy -typo-copy--bold -text-color-gray-01">Ort</span>
                    </div>
                    <div class="column column--12 column--s-2 -spacing-a">
                        <span class="-typo-copy -typo-copy--bold -text-color-gray-01">User-ID</span>
                    </div>
                    <div class="column column--12 column--s-3 -spacing-a">
                        <span class="-typo-copy -typo-copy--bold -text-color-gray-01">eingereicht am</span>
                    </div>
                    <div class="column column--12 column--s-3 -spacing-a">
                        <span class="-typo-copy -typo-copy--bold -text-color-gray-01"> </span>
                    </div>
                </div>
                @foreach ($submittedBeachcourts as $beachcourt)
                    <hr class="divider">
                    
                    <div class="row">
                        <div class="column column--12 column--s-1">
                            <span class="-typo-copy -text-color-gray-01">{{ $beachcourt->id }}</span>
                        </div>
                        <div class="column column--12 column--s-3">
                            <span class="-typo-copy -text-color-gray-01">{{ $beachcourt->postalCode }} {{ $beachcourt->city }}</span>
                        </div>
                        <div class="column column--12 column--s-2">
                            <span class="-typo-copy -text-color-gray-01">{{ $beachcourt->user_id }}</span>
                        </div>
                        <div class="column column--12 column--s-3">
                            <span class="-typo-copy -text-color-gray-01">{{ $beachcourt->created_at }}</span>
                        </div>
                        <div class="column column--12 column--s-3"> 
                            <a href="{{ URL::route('backendBeachcourt.show', $beachcourt->id) }}" class="button-primary button-primary--dark-gray">
                                <span class="button-primary__label">Details</span>
                                <span class="button-primary__label button-primary__label--hover">Details</span>
                            </a>

                            <a href="{{ URL::route('backendBeachcourt.edit', $beachcourt->id) }}" class="button-primary">
                                <span class="button-primary__label">Feld bearbeiten</span>
                                <span class="button-primary__label button-primary__label--hover">Feld bearbeiten</span>
                            </a>

                            <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST" id="form--deleteField">
                              <input name="_method" type="hidden" value="DELETE">
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                              <button class="button-primary button-primary--red">
                              	<span class="button-primary__label">Feld löschen</span>
                              	<span class="button-primary__label button-primary__label--hover">Feld löschen</span>
                              </button>
                            </form>
                        </div>
                      </div>
                @endforeach
            </div>
        </div>
        <div class="row -spacing-a">
        	<div class="column column--12">
        	    <h4 class="-typo-headline-04 -text-color-gray-01">Die neusten Nachrichten</h4>
        	    <div class="row">
        	        <div class="column column--12 -spacing-a">
        	            <span class="-typo-copy -typo-copy--bold -text-color-gray-01">Anfragen über unser Kontaktformular</span>
        	        </div>
        	    </div>
        	    @foreach ($messages as $message)
        	        <hr class="divider">
        	        <div class="row">
        	            <div class="column column--12">
        	                <span class="-typo-copy -typo-copy--bold -text-color-gray-01">Betreff</span> 
        	                <span class="-typo-copy -text-color-gray-01">{{ $message->subject }}</span>
        	            </div>
        	            <div class="column column--12">
        	                <span class="-typo-copy -typo-copy--bold -text-color-gray-01">E-Mail</span>
        	                <span class="-typo-copy -text-color-gray-01">{{ $message->userEmail }}</span>
        	            </div>
        	            <div class="column column--12">
        	                <span class="-typo-copy -typo-copy--bold -text-color-gray-01">Datum</span>
        	                <span class="-typo-copy -text-color-gray-01">{{ $message->created_at }}</span>
        	            </div>
        	            <div class="column column--12 -spacing-d">
        	                <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Nachricht</p>
        	                <p class="-typo-copy -text-color-gray-01">{{ $message->message }}</p>
        	            </div>
        	        </div>
        	    @endforeach
        	</div>
        </div>
        <div class="row">
            <div class="column column--12 -spacing-a">
                <hr class="divider">
            </div>
        </div>
    </div><!-- .content__main ENDE -->
@endsection

@push('scripts')
    <script>
        $('.notification-button').click(function() {
          $(this).parent().parent('.notification').slideUp();
        });
    </script>
@endpush