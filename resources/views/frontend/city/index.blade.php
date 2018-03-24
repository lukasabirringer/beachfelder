@extends('layouts.frontend')

@section('content')

<div class="row">
  <div class="col">
    <a href="{{ URL::previous() }}" class="btn btn-light" style="margin-top:10px;">Zurück</a>
    <h1>Beachfelder in den größten Städten Deutschlands</h1>
    <hr>

        @foreach ($cities as $city)
        <p><a href="/stadt/{{ strtolower($city->name) }}">{{ $city->id }}</a>
          <a href="/stadt/{{ strtolower($city->name) }}">{{ $city->name }}</a>

        </p>
        @endforeach

</div>
</div>

@endsection
