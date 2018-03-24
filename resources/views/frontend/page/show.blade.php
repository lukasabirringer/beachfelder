@extends('layouts.frontend')

@section('content')

      <div class="content__main">
        <div class="row">
          <div class="column column--12">
            <h2 class="title-page__title">{{ $page->headline }}</h2>
          </div>
        </div>
        <div class="row -spacing-a">
          <div class="column column--12">
            <hr class="divider">
          </div>
        </div>
        {!! html_entity_decode($page->content) !!}
        </div>


@endsection
