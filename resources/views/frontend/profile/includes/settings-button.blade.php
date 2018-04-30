@if (Auth::user()->userName === $profileuser->userName)
  <a href="/user/{{ $user->userName }}/edit" class="link-icon link-icon--rotate -text-color-gray-01 profile-user__edit-icon"><span data-feather="settings"></span></a>
@endif
