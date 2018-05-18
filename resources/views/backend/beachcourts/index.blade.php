@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <a href="{{ URL::route('backendBeachcourt.create') }}"><button type="button" class="btn btn-primary">Neuen Beachcourt erstellen</button></a>
        <br><br>
        <h2>eingereichte Beachcourts ({{ $submittedBeachcourts->count }})</h2>

        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-3">Ort</th>
                    <th class="col-md-1">Rating</th>
                    <th class="col-md-4">Optionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submittedBeachcourts as $beachcourt)
                        <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST">
                <tr>
                    <td>{{ $beachcourt->id }}</td>
                    <td>{{ $beachcourt->postalCode }} {{ $beachcourt->city }}</td>
                    <td>{{ $beachcourt->realRating }}</td>
                    <td>
                        <a href="{{ URL::route('backendBeachcourt.show', $beachcourt->id) }}">
                          <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Öffnen
                          </button>
                        </a>

                        <a href="{{ URL::route('backendBeachcourt.edit', $beachcourt->id) }}">
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

<div class="container">
    <div class="row">
        <div class="col-xs-12">

        <h2>Beachcourts ({{ $beachcourts->count }})</h2></h2>

        <hr>

        
        <div id="courts">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <label class="input">
                        <input class="input__field search" placeholder="Suche" />
                        <span class="input__label">Suche</span>
                        <span class="input__icon" data-feather="search"></span>
                        <div class="input__border"></div>
                    </label>
                </div>
            </div>
            
            
            <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-3">Ort</th>
                    <th class="col-md-1">Rating</th>
                    <th class="col-md-4">Optionen</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($beachcourts as $beachcourt)
                    <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST">
                <tr>
                    <td class="id">{{ $beachcourt->id }}</td>
                    <td class="city">{{ $beachcourt->postalCode }} {{ $beachcourt->city }}</td>
                    <td class="rating">{{ $beachcourt->realRating }}</td>
                    <td>
                        <a href="{{ URL::route('backendBeachcourt.show', $beachcourt->id) }}">
                          <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Öffnen
                          </button>
                        </a>

                        <a href="{{ URL::route('backendBeachcourt.edit', $beachcourt->id) }}">
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
            <ul class="pagination"></ul>
            
        </div><!-- #courts ENDE -->
        
    </div>
</div>

@endsection

@push('scripts')
    <script>
        var courtList = new List('courts', {
          valueNames: ['id', 'city', 'rating'],
          page: 10,
          pagination: true
        });
    </script>
@endpush