@if (Auth::user()->userName === $profileuser->userName)
  <h4 class="-typo-headline-04 -text-color-petrol">Deine Informationen</h4>
@else
  <h4 class="-typo-headline-04 -text-color-petrol">Informationen von {{ $profileuser->userName }}</h4>
@endif

