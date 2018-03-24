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
        <h2>eingereichte Beachcourts</h2>

        <hr>
        <a href="{{ URL::route('backendBeachcourt.create') }}"><button type="button" class="btn btn-primary">Neuen Beachcourt erstellen</button></a>
        <br><br>


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
                @foreach ($submittedBeachcourts as $beachcourt)
                        <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST">
                <tr>
                    <td>{{ $beachcourt->id }}</td>
                    <td>{{ $beachcourt->courtName }}</td>
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

        <h2>Beachcourt-Listing</h2>

        <hr>
        <a href="{{ URL::route('backendBeachcourt.create') }}"><button type="button" class="btn btn-primary">Neuen Beachcourt erstellen</button></a>
        <br><br>


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
                @foreach ($beachcourts as $beachcourt)
                        <form action="{{ URL::route('backendBeachcourt.destroy', $beachcourt->id) }}" method="POST">
                <tr>
                    <td>{{ $beachcourt->id }}</td>
                    <td>{{ $beachcourt->courtName }}</td>
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
                {{ $beachcourts->links() }}
            </tbody>
        </table>
    </div>
</div>

@endsection
