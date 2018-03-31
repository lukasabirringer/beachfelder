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

        <form action="{{ route('password.request') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}" />

            <div class="row -spacing-a">
                <div class="column column--12 column--m-6">
                    <label class="input">
                        <input type="email" class="input__field" name="email" value="{{ $email or old('email') }}" required placeholder="Deine E-Mail Adresse" />
                        <span class="input__label">Deine E-Mail Adresse</span>
                        <div class="input__border"></div>
                    </label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="column column--12 column--m-6 -spacing-b">
                    <label class="input">
                        <input type="password" class="input__field" name="password" required placeholder="Dein Passwort">
                        <span class="input__label">Dein Passwort</span>
                        <div class="input__border"></div>
                    </label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="column column--12 column--m-6 -spacing-b">
                    <label class="input">
                        <input type="password" class="input__field" name="password_confirmation" required placeholder="Passwort wiederholen">
                        <span class="input__label">Passwort wiederholen</span>
                        <div class="input__border"></div>
                    </label>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="column column--12 column--m-6">
                    <button type="submit" class="button-primary">
                        <span class="button-primary__label">Passwort zurücksetzen</span>
                        <span class="button-primary__label button-primary__label--hover">Passwort zurücksetzen</span> 
                    </button>
                </div>
            </div>
        </form>
    </div> <!-- .container__main ENDE -->
@endsection
