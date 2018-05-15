@extends('layouts.backend')

@section('content')

<div class="container">
	<div class="row">
		<div class="column column--12">
			<h2 class="-typo-headline-02 -text-color-gray-01">Namasté, {{ Auth::user()->userName }}</h2>
		</div>
	</div>
    <hr>
	<div class="row">
        {{-- Anzahl (Courts, User, Bewertungen, Favoriten) --}}
        <div class="column column--6">
            <h3 class="-typo-headline-04 -text-color-gray-01">Zahlen</h3>
            <ul>
                <li>Felder gesamt: {{ $beachcourtCount }}</li>
                <li>User gesamt: {{ $userCount }}</li>
                <li>Bewertungen gesamt: {{ $ratingCount }}</li>
                <li>Favoriten gesamt: {{ $favsCount }}</li>
            </ul>
        </div>

        {{-- Court Status (eingereichte, approved, keine Bilder, keine Bewertung) --}}
        <div class="column column--6">
            <h3 class="-typo-headline-04 -text-color-gray-01">Beachfelder</h3>
            <ul>
                <li>eingereichte Felder: {{ $submittedCourtsCount }}</li>
                <li>veröffentlichte Felder: {{ $approvedCourtsCount }}</li>
                <li>Felder ohne Bewertung: {{ $courtWithoutPicturesRating }}</li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        {{-- neue eingereichte --}}
        <div class="column column--6">
        <h3 class="-typo-headline-04 -text-color-gray-01">Die neusten eingereichten Beachfelder</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-3">Ort</th>
                    <th class="col-md-4">Optionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submittedBeachcourts as $beachcourt)
                        <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST">
                <tr>
                    <td>{{ $beachcourt->id }}</td>
                    <td>{{ $beachcourt->postalCode }} {{ $beachcourt->city }}</td>
                    <td>
                        <a href="{{ URL::route('backendBeachcourt.show', $beachcourt->id) }}">
                          <button type="button" class="btn btn-default">
                            Öffnen
                          </button>
                        </a>

                        <a href="{{ URL::route('backendBeachcourt.edit', $beachcourt->id) }}">
                          <button type="button" class="btn btn-info">
                            Bearbeiten
                          </button>
                        </a>

                        <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <a href="#" onclick="return confirm('Möchtest du das Beachfeld wirklich löschen?')">
                          <button type="submit" class="btn btn-danger">
                            Löschen
                          </button>
                        </form>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        {{-- neue nachrichten --}}
        <div class="column column--6">
        <h3 class="-typo-headline-04 -text-color-gray-01">Die neusten eingereichten Beachfelder</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-3">Betreff</th>
                    <th class="col-md-4">Nachricht</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->message }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection