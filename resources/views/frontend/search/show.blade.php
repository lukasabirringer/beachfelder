@extends('layouts.frontend')

<title>Beachfelder in der Nähe von {{ $plz }}</title>
@section('content')
<div class="row">
  <div class="col">
    <a href="{{ URL::previous() }}" class="btn btn-light" style="margin-top:10px;">Zurück</a>
    <h1>Beachfelder in der Nähe von {{ $plz }}</h1>
    <hr>
    <h3>Kriterien</h3>
    @include('frontend.forms.searchfilter')
    <hr>

    <table class="table table-hover">
        <thead><tr>
            <th>#</th>
            <th>PLZ</th>
            <th>Stadt</th>
            <th>fav</th>
        </tr></thead>
          <tbody>
        @foreach ($results as $beachcourt)
        <tr>
          <td><a href="beachvolleyballfeld/{{ $beachcourt->id }}">{{ $beachcourt->id }}</a></td>
          <td><a href="beachvolleyballfeld/{{ $beachcourt->id }}">{{ $beachcourt->postalCode }}</a></td>
          <td><a href="beachvolleyballfeld-{{ $beachcourt->id }}">{{ $beachcourt->city }}</a></td>
          <td><favorite
          :beachcourt={{ $beachcourt->id }}
          :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
          ></favorite>
          </td>
        </tr>
        @endforeach
        </tbody><tfoot></tfoot>
    </table>
  </div>
</div>
</div>

@endsection
