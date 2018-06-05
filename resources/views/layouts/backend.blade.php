<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'beachfelder.de - Backend') }}</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <div id="app">
        <div class="sidebar">
            <a href="{{ url('/')}}/backend/dashboard"><img class="sidebar__logo" src="{{ asset('images/signet-beachfelder.de_white.png') }}"></a>

            <ul class="navigation">
                <li class="navigation__item"><a href="{{ url('/')}}/backend/dashboard" class="navigation__link"><span data-feather="home"></span></a></li>
                
                <li class="navigation__item"><a href="{{ url('backend/beachcourts') }}" class="navigation__link"><span data-feather="database"></span></a></li>

                <li class="navigation__item"><a href="{{ url('backend/user') }}" class="navigation__link"><span data-feather="users"></span></a></li>

                <li class="navigation__item"><a href="{{ url('backend/cities') }}" class="navigation__link"><span data-feather="target"></span></a></li>

                <li class="navigation__item"><a href="{{ url('/') }}" class="navigation__link" target="_blank"><span data-feather="globe"></span></a></li>
              
                @if (Auth::check())
                    <li class="navigation__item">
                        <form action="{{ URL::route('logout') }}" method="POST" class="form form--logout">
                            {{ csrf_field() }}
                            <a href="javascript:;" onclick="document.querySelector('.form--logout').submit();" class="navigation__link">  <span data-feather="log-out"></span></a>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div><!-- #app ENDE -->
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script>
        feather.replace();
    </script>
    @stack('scripts')

</body>
</html>
