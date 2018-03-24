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

        <h2>User-Listing</h2>

        <hr>
        <a href="{{ URL::route('backendUser.create') }}"><button type="button" class="btn btn-primary">Neuen User erstellen</button></a>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-2">Name</th>
                    <th class="col-md-3">E-Mail-Adresse</th>
                    <th class="col-md-2">Rolle</th>
                    <th class="col-md-4">Optionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                        <form action="{{ URL::route('backendUser.destroy', $user->id) }}" method="POST">

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
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
                        <a href="#" onclick="return confirm('Möchtest du diesen User wirklich löschen?')">
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

@endsection
