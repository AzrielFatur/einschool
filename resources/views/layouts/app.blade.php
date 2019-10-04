<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
.container {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.container .card {
    border: none;
    box-shadow: 0px 0px 50px #E1E1E1;
}

.container .form-control {
    margin-top: 20px;
    padding: 20px 10px;
    border: 1px solid #CCCCCC !important;
    border-radius: 100px;
    padding-left: 25px;
}

.title {
    margin-top: 20px;
}

::-webkit-input-placeholder {
    color: #CCCCCC !important;
}

.form-check-label {
    width: 150px;
    display: block;
    position: relative;
    padding-left: 0px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 12px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.form-check-label input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

.checkmark {
    border-radius: 2px;
    position: absolute;
    top: 0;
    left: 10px;
    height: 15px;
    width: 15px;
    background-color: #e1e1e1;
}

.form-check-label:hover input ~ .checkmark {
  background-color: #ccc;
}

.form-check-label input:checked ~ .checkmark {
  background-color: #2196F3;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.form-check-label input:checked ~ .checkmark:after {
  display: block;
}

.form-check-label .checkmark:after {
  left: 5px;
  top: 3px;
  width: 5px;
  height: 8px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.btn-link {
    color: #333333;
    font-size: 12px;
    margin-top: -75px;
    z-index: 9999;
}

.btn-primary {
    border-radius: 100px;
    background-color: #4FA1E8;
    border: #4FA1E8;
    width: 100%;
}

</style>
<body>
    <div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
