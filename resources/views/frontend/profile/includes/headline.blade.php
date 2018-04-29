@if (Auth::user()->userName === $profileuser->userName)
  <h2 class="title-page__title">Dein Profil</h2>
@else
  <h2 class="title-page__title">Profil von {{ $profileuser->userName }}</h2>
@endif
