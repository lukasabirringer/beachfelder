@extends('layouts.frontend')

<title>Beachfelder in {{ $name }}</title>
@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Beachfelder in {{ $name }}</h2>
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-b">
      <div class="column column--12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>PLZ</th>
              <th>Straße</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($beachcourts as $beachcourt)
              <tr>
                <td><a href="/beachvolleyballfeld/{{ $beachcourt->id }}">{{ $beachcourt->id }}</a></td>
                <td><a href="/beachvolleyballfeld/{{ $beachcourt->id }}">{{ $beachcourt->postalCode }}</a></td>
                <td><a href="/beachvolleyballfeld-{{ $beachcourt->id }}">{{ $beachcourt->street }}</a></td>
              </tr>
            @endforeach
          </tbody>
          <tfoot></tfoot>
        </table>
      </div>
    </div>
  </div> <!-- .content__main ENDE -->
@endsection
