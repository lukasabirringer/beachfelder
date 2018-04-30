@if($profileuser->pictureName !== 'placeholder-user.png' )
  <img src="{{url('/')}}/uploads/profilePictures/{{ $profilepicture }}" class="image image--max-width">
@else
  <img src="/uploads/profilePictures/fallback/placeholder-user.png" class="image image--max-width">
@endif
