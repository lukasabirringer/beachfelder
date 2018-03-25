@extends('layouts.frontend')

@section('content')
<div class="content__main">
    <div class="row">
        <div class="column column--12">
            <h2 class="title-page__title">Registrieren oder anmelden</h2>
        </div>
    </div>
    <div class="row -spacing-a">
        <div class="column column--12">
            <hr class="divider">
        </div>
    </div>

<div class="flash-message">
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))

<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach
</div>
<div class="page-login -spacing-a">
<div class="page-login__half page-login__half--left">
<h3 class="page-login__title"> <span class="page-login__title-icon" data-feather="user-plus"></span>Registriere dich</h3>
<div class="page-login__content">
<div class="row -spacing-a">
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
{{ csrf_field() }}
    <div class="column column--12 column--s-6 -spacing-b">
        <label class="input">
            <input type="text" name="name" value="{{ old('name') }}" class="input__field" placeholder="Dein Username">
            <span class="input__label">Dein Username</span>
            <div class="input__border"></div>
        </label>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="column column--12 column--s-6 -spacing-b">
        <label class="input">
            <input type="text" name="firstName" value="{{ old('firstName') }}" class="input__field" placeholder="Dein Vorname">
            <span class="input__label">Dein Vorname</span>
            <div class="input__border"></div>
        </label>
        @if ($errors->has('firstName'))
            <span class="help-block">
                <strong>{{ $errors->first('firstName') }}</strong>
            </span>
        @endif
    </div>
    <div class="column column--12 column--s-6 -spacing-b">
        <label class="input">
            <input type="text" name="lastName" value="{{ old('lastName') }}" class="input__field" placeholder="Dein Nachname">
            <span class="input__label">Dein Nachname</span>
            <div class="input__border"></div>
        </label>
        @if ($errors->has('lastName'))
            <span class="help-block">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif
    </div>

    <div class="column column--12 column--s-6 -spacing-a">
        <label class="input">
            <input type="email" name="email" value="{{ old('email') }}" class="input__field" placeholder="Deine E-Mail Adresse">
            <span class="input__label">Deine E-Mail Adresse</span>
            <div class="input__border"></div>
        </label>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="column column--12 column--s-6 -spacing-a">
        <label class="input">
            <input type="text" name="birthdate" value="{{ old('birthdate') }}" class="datepicker-here input__field input__field--date" data-position="bottom left" placeholder="Dein Geburtsdatum">
            <span class="input__label">Dein Geburtsdatum</span>
            <div class="input__border"></div>
        </label>
        @if ($errors->has('birthdate'))
            <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
            </span>
        @endif
    </div>

    <div class="column column--12 column--s-12">
        <div class="row">
            <div class="column column--12 column--s-5 -spacing-a">
                <label class="input">
                    <input type="text" cname="postalCode" value="{{ old('postalCode') }}" class="input__field" placeholder="Deine Postleitzahl">
                    <span class="input__label">Deine Postleitzahl</span>
                    <div class="input__border"></div>
                </label>
                @if ($errors->has('postalCode'))
                    <span class="help-block">
                        <strong>{{ $errors->first('postalCode') }}</strong>
                    </span>
                @endif
            </div>
            <div class="column column--12 column--s-7 -spacing-a">
                <label class="input">
                    <input type="text" name="city" value="{{ old('city') }}" class="input__field" placeholder="Dein Wohnort">
                    <span class="input__label">Dein Wohnort</span>
                    <div class="input__border"></div>
                </label>
                @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="column column--12 column--s-12 -spacing-a">
        <div class="row">
            <div class="column column--12">
                <p class="-typo-copy -text-color-gray-01">Wähle dein Geschlecht</p>
            </div>
            <div class="column column--12 column--s-4">
                <label class="input-radio">
                    <input type="radio" class="input-radio__field" name="sex" value="man">
                    <span class="input-radio__label">männlich</span>
                </label>
            </div>
            <div class="column column--12 column--s-4">
                <label class="input-radio">
                    <input type="radio" class="input-radio__field" name="sex" value="woman">
                    <span class="input-radio__label">weiblich</span>
                </label>
            </div>
            <div class="column column--12 column--s-4">
                <label class="input-radio">
                    <input type="radio" class="input-radio__field" name="sex" value="neutral">
                    <span class="input-radio__label">neutral</span>
                </label>
            </div>
            @if ($errors->has('sex'))
                <span class="help-block">
                    <strong>{{ $errors->first('sex') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="column column--12 column--s-6 -spacing-a">
        <label class="input">
            <input type="password" name="password" value="{{ old('password') }}" class="input__field input__field--password" placeholder="Dein Passwort" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            <span class="input__label">Dein Passwort</span>
            <div class="input__border"></div>
            <span class="input__icon input__icon--eye" data-feather="eye" onclick="togglePassword()"></span>
            <span class="input__icon input__icon--eye-off input__icon--not-visible" data-feather="eye-off" onclick="togglePassword()"></span>
        </label>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="column column--12 column--s-6 -spacing-a">
        <label class="input">
            <input type="password" name="password_confirmation" class="input__field input__field--password" placeholder="Passwort wiederholen">
            <span class="input__label">Passwort wiederholen</span>
            <div class="input__border"></div>
            <span class="input__icon input__icon--eye" data-feather="eye" onclick="togglePassword()"></span>
            <span class="input__icon input__icon--eye-off input__icon--not-visible" data-feather="eye-off" onclick="togglePassword()"></span>
        </label>
    </div>

    <div class="column column--12 -spacing-b">
        <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-c">Damit dein Passwort sicher ist, sollte es folgendes beinhalten</p>
        <p id="letter" class="password-strength password-strength--invalid -spacing-d">mindestens einen Kleinbuchstaben</p>
        <p id="capital" class="password-strength password-strength--invalid -spacing-d">mindestens einen Großbuchstaben</p>
        <p id="number" class="password-strength password-strength--invalid -spacing-d">mindestens eine Zahl</p>
        <p id="length" class="password-strength password-strength--invalid -spacing-d">eine Mindestlänge von 8 Zeichen</b></p>
    </div>

    <div class="column column--12 -spacing-b">
        <button class="button-primary">
            <span class="button-primary__label">Jetzt kostenlos registrieren</span>
            <span class="button-primary__label button-primary__label--hover">Jetzt kostenlos registrieren</span>
        </button>
    </div>
</form>
</div>
</div>

</div>
    <div class="page-login__half page-login__half--right">
        <h3 class="page-login__title"><span class="page-login__title-icon" data-feather="user"></span>Melde dich an</h3>

        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="page-login__content">
            <div class="row -spacing-a">
                <div class="column column--12 -spacing-b">
                    <label class="input">
                        <input type="email" class="input__field" name="email" value="{{ old('email') }}" placeholder="Deine E-Mail Adresse">
                        <span class="input__label">Deine E-Mail Adresse</span>
                        <div class="input__border"></div>
                    </label>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="column column--12 -spacing-a">
                    <label class="input">
                        <input type="password" name="password" class="input__field input__field--password" placeholder="Passwort">
                        <span class="input__label">Passwort</span>
                        <div class="input__border"></div>
                        <span class="input__icon input__icon--eye" data-feather="eye" onclick="togglePassword()"></span>
                        <span class="input__icon input__icon--eye-off input__icon--not-visible" data-feather="eye-off" onclick="togglePassword()"></span>
                    </label>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
                <div class="column column--12 -spacing-b">
                    <button class="button-primary">
                        <span class="button-primary__label">Anmelden</span>
                        <span class="button-primary__label button-primary__label--hover">Anmelden</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="column column--12 -spacing-b">
                <p class="-typo-copy -text-color-gray-01">
                    <a class="link-text" href="{{ route('password.request') }}">Passwort vergessen?</a>
                </p>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
