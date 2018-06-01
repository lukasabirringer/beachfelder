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
                <h2 class="title-page__title">Unsere Beachfelder</h2>
            </div>
        </div>
        <div class="row">
        	<div class="column column--12 column--m-4">
        		<a href="{{ URL::route('backendBeachcourt.create') }}" class="button-primary">
        			<span class="button-primary__label">Neues Feld erstellen</span>
        			<span class="button-primary__label button-primary__label--hover">Neues Feld erstellen</span>
        		</a>
        	</div>
        </div>
        <div class="row -spacing-a">
            <div class="column column--12">
                <h3 class="-typo-headline-03 -text-color-gray-01">eingereichte Beachcourts</h3>
            </div>
        </div>
        <div class="row -spacing-a">
            <div class="column column--12">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="column column--12 column--m-2 -typo-copy -typo-copy--bold -text-color-green">ID</th>
                            <th class="column column--12 column--m-4 -typo-copy -typo-copy--bold -text-color-green">Ort</th>
                            <th class="column column--12 column--m-4 -typo-copy -typo-copy--bold -text-color-green">Koordinaten</th>
                            <th class="column column--12 column--m-2 -typo-copy -typo-copy--bold -text-color-green">Optionen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submittedBeachcourts as $beachcourt)
                            <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <tr>
                                    <td class="column column--12 column--m-2 -typo-copy -text-color-gray-01 column column--12 column--m-1">{{ $beachcourt->id }}</td>
                                    <td class="column column--12 column--m-4 -typo-copy -text-color-gray-01 column column--12 column--m-3">{{ $beachcourt->postalCode }} {{  $beachcourt->city }} {{  $beachcourt->district }}</td>
                                    <td class="column column--12 column--m-4 -typo-copy -text-color-gray-01 column column--12 column--m-3">{{ $beachcourt->latitude }} {{ $beachcourt->longitude }}</td>
                                    <td class="column column--12 column--m-2">
                                        <a href="{{ URL::route('backendBeachcourt.show', $beachcourt->id) }}" class="link-icon -text-color-petrol">
                                            <span data-feather="search"></span>
                                        </a>

                                        <a href="{{ URL::route('backendBeachcourt.edit', $beachcourt->id) }}" class="link-icon -text-color-gray-01">
                                            <span data-feather="edit"></span>
                                        </a>

                                        <a href="#" class="link-icon -text-color-red" onclick="return confirm('Möchtest du das Beachfeld wirklich löschen?')">
                                            <span data-feather="trash-2"></span>
                                        </a>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row -spacing-a">
            <div class="column column--12">
                <hr class="divider">
            </div>
        </div>
        
        <div class="row">
            <div class="column column--12">
                <h2 class="-typo-headline-03 -text-color-gray-01">Unsere Felder</h2>
            </div>
        </div>
        <div class="row">
            <div class="column column--12 -spacing-a">
                @include('backend.beachcourts.reuseable-includes.list-beachcourts')
            </div>
        </div>
    </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
    <script>
        var courtList = new List('courts', {
          valueNames: ['id', 'city', 'rating'],
          page: 30,
          pagination: true
        });

        $('.notification-button').click(function() {
          $(this).parent().parent('.notification').slideUp();
        });
    </script>
@endpush