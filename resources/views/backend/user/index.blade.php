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

        <a href="{{ URL::route('backendUser.create') }}"><button type="button" class="btn btn-primary">Neuen User erstellen</button></a>
        <br><br>
        <h1>User ({{ $users->count }})</h1>

        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-3">Name</th>
                    <th class="col-md-1">Rolle</th>
                    <th class="col-md-1">Anzahl Favoriten</th>
                    <th class="col-md-1">Status</th>
                    <th class="col-md-1">Rolle</th>
                    <th class="col-md-4">Optionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                        <form action="{{ URL::route('backendUser.destroy', $user->id) }}" method="POST">

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->userName }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->countFavorites }}</td>
                    <td>{{ $user->isConfirmed }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ URL::route('profile.show', $user->userName) }}">
                          <button type="button" class="btn btn-default">Profil</button>
                        </a>

                        <a href="{{ URL::route('backendUser.edit', $user->id) }}">
                          <button type="button" class="btn btn-info">Bearbeiten</button>
                        </a>

                        <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <a href="#" onclick="return confirm('Möchtest du diesen User wirklich löschen?')">
                          <button type="submit" class="btn btn-danger">Löschen</button>
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
