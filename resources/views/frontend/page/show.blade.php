@extends('layouts.frontend')

<title>{{ $page->headline }}</title>
@section('content')
<div class="row">
  <div class="col">
    <h1>{{ $page->headline }}</h1>
    <p>{{ $page->content }}</p>
  </div>
</div>
</div>

@endsection
