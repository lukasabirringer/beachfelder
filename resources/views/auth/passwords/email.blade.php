@extends('layouts.frontend')

@section('content')
    <div class="content__main">
        <div class="row">
          <div class="column column--12">
            <h2 class="title-page__title">Passwort zurücksetzen</h2>
          </div>
        </div>
        <div class="row -spacing-a">
          <div class="column column--12">
            <hr class="divider">
          </div>
        </div>

        @if (session('status'))
            <ul class="notification">
                <li class="notification__item">
                    <span class="notification__icon" data-feather="info"></span>
                    <p class="notification__text">{{ session('status') }}</p>

                    <button class="button-secondary notification__button close" data-dismiss="alert" aria-label="close">
                      <span class="button-secondary__label">OK</span>
                    </button>
                </li>
            </ul>
        @endif
        
        <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="column column--12 column--m-6">
                    <label class="input">
                        <input type="email" class="input__field" name="email" value="{{ old('email') }}" required placeholder="Deine E-Mail Adresse">
                        <span class="input__label">Deine E-Mail Adresse</span>
                        <div class="input__border"></div>
                    </label>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="column column--12 column--m-6">
                    <button type="submit" class="button-primary">
                        <span class="button-primary__label">Link zusenden</span>
                        <span class="button-primary__label button-primary__label--hover">Link zusenden</span>
                    </button>
                </div>
            </div>
        </form>
    </div> <!-- .container__main ENDE -->
@endsection
