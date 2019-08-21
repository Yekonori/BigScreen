<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Big Screen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    @if(Request::is('administration/*'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 admin-panel">
                <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=300>
                <ul>
                    <li><a href="{{ url('administration/accueil') }}">Accueil</a></li>
                    <li><a href="{{ url('administration/questionnaire') }}">Questionnaire</a></li>
                    <li><a href="{{ url('administration/responses') }}">Résponses</a></li>
                </ul>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=300>
            </div>
        </div>

        <div class="row row-content">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
    @endif

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>