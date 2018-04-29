@extends('layouts.backend')

@section('content')

<div class="container">
	<div class="row">
		<div class="column column--12">
			<h1 class="-typo-headline-01 -text-color-gray-01">Willkommen, {{ Auth::user()->userName }}</h1>
		</div>
	</div>
	<div class="row">
		<div class="column column--12 column--m-6 -spacing-a -background-color-gray-03" style="padding: 20px;">
			<h3 class="-typo-headline-03 -text-color-gray-01">Unsere 5 neuesten User</h3>
			<ul class="-spacing-a">
				@foreach ($users as $user)
					<li style="margin-top: 15px;">
						<p class="-typo-copy -text-color-gray-01">
							<a href="{{ URL::route('backendUser.show', $user->id) }}" class="link-text">{{ $user->userName }}</a>
						</p>
						<p class="-typo-copy -typo-copy--small -text-color-gray-04"> {{ $user->firstName }} {{ $user->lastName }} </p>
						<p class="-typo-copy -typo-copy--small -text-color-gray-04"> {{ $user->email }}</p>
						<p class="-typo-copy -typo-copy--small -text-color-gray-04"> {{ $user->postalCode }} {{ $user->city }} </p>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="column column--12 column--m-6 -spacing-a -background-color-gray-03" style="padding: 20px;">
			<h3 class="-typo-headline-03 -text-color-gray-01">Unsere 5 neuesten Felder</h3>
			<ul class="-spacing-a">
				@foreach ($subs as $sub)
					<li style="margin-top: 15px;">
						<p class="-typo-copy -text-color-gray-01"> 
							<a href="{{ URL::route('backendBeachcourt.show', $sub->id) }}" class="link-text"> Feld in {{ $sub->postalCode }} {{ $sub->city }}</a>
						</p>
						<p class="-typo-copy -typo-copy--small -text-color-gray-04">{{ $sub->street }} {{ $sub->houseNumber }}</p>
						<p class="-typo-copy -typo-copy--small -text-color-gray-04">{{ $sub->state }} </p>
						<p class="-typo-copy -typo-copy--small -text-color-gray-04">Koordinaten: {{ $sub->latitude }}, {{ $sub->longitude }} </p>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>


<div class="container">
    <div class="row">
    	<div class="col-xs-12">
    		<table class="table table-striped">
    		    <thead>
    		        <tr>
    		            <th class="col-md-3">Username</th>
    		            <th class="col-md-3">Vorname + Nachname</th>
    		            <th class="col-md-1">E-Mail Adresse</th>
    		            <th class="col-md-1">PLZ + Ort</th>
    		            <th class="col-md-1">Geburtstag</th>
    		            <th class="col-md-1">Geschlecht</th>
    		            <th class="col-md-4">Optionen</th>
    		        </tr>
    		    </thead>
    		    <tbody>
    		        @foreach ($users as $user)
    		        	<form action="{{ URL::route('backendUser.destroy', $user->id) }}" method="POST">
    		        <tr>
    		            <td>{{ $user->userName }}</td>
    		            <td>{{ $user->firstName }} {{ $user->lastName }}</td>
    		            <td>{{ $user->email }}</td>
    		            <td>{{ $user->postalCode }} {{ $user->city }}</td>
    		            <td>{{ $user->birthdate }}</td>
    		            <td>{{ $user->sex }}</td>
    		            <td>
    		                <a href="{{ URL::route('backendUser.show', $user->id) }}">
    		                  <button type="button" class="btn btn-default">
    		                    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Öffnen
    		                  </button>
    		                </a>

    		                <a href="{{ URL::route('backendUser.edit', $user->id) }}">
    		                  <button type="button" class="btn btn-info">
    		                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Bearbeiten
    		                  </button>
    		                </a>

    		                <input name="_method" type="hidden" value="DELETE">
    		                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    		                <a href="#" onclick="return confirm('Möchtest du das Beachfeld wirklich löschen?')">
    		                  <button type="submit" class="btn btn-danger">
    		                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Löschen
    		                  </button>
    		                </form>
    		                </a>

    		            </td>
    		        </tr>
    		        @endforeach
    		    </tbody>
    		</table>
    	</div>
    	<div class="col-xs-12">
    		<h3>Unsere neuesten Felder</h3>
    		<table class="table table-striped">
    		    <thead>
    		        <tr>
    		            <th class="col-md-1">ID</th>
    		            <th class="col-md-3">Name</th>
    		            <th class="col-md-3">Ort</th>
    		            <th class="col-md-1">Rating</th>
    		            <th class="col-md-4">Optionen</th>
    		        </tr>
    		    </thead>
    		    <tbody>
    		        @foreach ($subs as $sub)
    		                <form action="{{ URL::route('backendBeachcourt.destroy', $sub->id) }}" method="POST">
    		        <tr>
    		            <td>{{ $sub->id }}</td>
    		            <td>{{ $sub->courtName }}</td>
    		            <td>{{ $sub->postalCode }} {{ $sub->city }}</td>
    		            <td>{{ $sub->realRating }}</td>
    		            <td>
    		                <a href="{{ URL::route('backendBeachcourt.show', $sub->id) }}">
    		                  <button type="button" class="btn btn-default">
    		                    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Öffnen
    		                  </button>
    		                </a>

    		                <a href="{{ URL::route('backendBeachcourt.edit', $sub->id) }}">
    		                  <button type="button" class="btn btn-info">
    		                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Bearbeiten
    		                  </button>
    		                </a>

    		                <input name="_method" type="hidden" value="DELETE">
    		                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    		                <a href="#" onclick="return confirm('Möchtest du das Beachfeld wirklich löschen?')">
    		                  <button type="submit" class="btn btn-danger">
    		                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Löschen
    		                  </button>
    		                </form>
    		                </a>

    		            </td>
    		        </tr>
    		        @endforeach
    		    </tbody>
    		</table>
    	</div>
    </div>
</div>

@endsection
