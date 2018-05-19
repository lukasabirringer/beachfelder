@extends('layouts.backend')

@section('content')

    <div class="content__main">
        <div class="row">
          <div class="column column--12">
            <h1 class="title-page__title">Namasté, {{ Auth::user()->userName }}</h1>
          </div>
        </div>

        <div class="row">
            <div class="column column--12 -spacing-a">
                <hr class="divider">
            </div>
        </div>

        <div class="row">
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
        </div>

        <div class="row">
            <div class="column column--12 -spacing-a">
                <hr class="divider">
            </div>
        </div>

        <div class="row">
            <div class="column column--12 column--s-6">
                <h4 class="-typo-headline-04 -text-color-gray-01">Die neusten eingereichten Beachfelder</h4>
                <div class="row">
                    <div class="column column--12 column--s-4 -spacing-a">
                        <span class="-typo-copy -typo-copy--bold -text-color-gray-01">ID</span>
                    </div>
                    <div class="column column--12 column--s-4 -spacing-a">
                        <span class="-typo-copy -typo-copy--bold -text-color-gray-01">Ort</span>
                    </div>
                    <div class="column column--12 column--s-4 -spacing-a">
                        <span class="-typo-copy -typo-copy--bold -text-color-gray-01"> </span>
                    </div>
                </div>
                @foreach ($submittedBeachcourts as $beachcourt)
                    <hr class="divider">
                    <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                        <div class="row">
                            <div class="column column--12 column--s-4">
                                <span class="-typo-copy -text-color-gray-01">{{ $beachcourt->id }}</span>
                            </div>
                            <div class="column column--12 column--s-4">
                                <span class="-typo-copy -text-color-gray-01">{{ $beachcourt->postalCode }} {{ $beachcourt->city }}</span>
                            </div>
                            <div class="column column--12 column--s-4"> 
                                <a href="{{ URL::route('backendBeachcourt.show', $beachcourt->id) }}" class="link-icon -text-color-petrol">
                                    <span data-feather="search"></span>
                                </a>

                                <a href="{{ URL::route('backendBeachcourt.edit', $beachcourt->id) }}" class="link-icon -text-color-gray-01">
                                    <span data-feather="edit"></span>
                                </a>

                                <a href="#" class="link-icon -text-color-red" onclick="return confirm('Möchtest du das Beachfeld wirklich löschen?')">
                                    <span data-feather="trash-2"></span>
                                </a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
            <div class="column column--12 column--s-6">
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