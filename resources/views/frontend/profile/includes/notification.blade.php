<ul class="notification">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
      <li class="notification__item">
        <span class="notification__icon" data-feather="info"></span>
        <p class="notification__text alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>

        <button class="button-secondary notification__button close" data-dismiss="alert" aria-label="close">
          <span class="button-secondary__label">OK</span>
        </button>
      </li>
    @endif
  @endforeach
</ul>
