@extends('layouts.frontend')

@section('title_and_meta')
    <title>Dein Profil | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
@endsection

@section('content')

<div class="content__main">
  <!-- Headline / Notification -->
  <div class="row">
    <div class="column column--12">
      @include('frontend.profile.includes.headline')
      @include('frontend.profile.includes.notification')
    </div>
  </div>

  <!-- Infobar -->
  <div class="row">
    <div class="column column--8">
      @include('frontend.profile.includes.infobar')
    </div>
    <div class="column column--4 profile-user__column">
      @include('frontend.profile.includes.settings-button')
    </div>
  </div>

  @include('frontend.reusable-includes.divider')

  <div class="row -spacing-a">
    <!-- Profile Picture -->
    <div class="column column--12 column--m-4">
      @include('frontend.profile.includes.profile-picture')
    </div>

    <div class="column column--12 column--m-8">
    <!-- Sub-Headline -->
      <div class="row">
        <div class="column column--12">
          @include('frontend.profile.includes.sub-headline')
        </div>
      </div>
      <!-- User-Infos -->
      <div class="row">
        @include('frontend.profile.includes.user-infos')
      </div>
    </div>
  </div>

  <!-- Favs / Eingereicht -->
    @include('frontend.reusable-includes.divider')
    <div class="row -spacing-a">
      <div class="column column--12">
        @include('frontend.profile.includes.favs-submitted')
      </div>
    </div>

</div>

@endsection
