<!doctype html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/material-dashboard.css?v=2.1.2') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    @yield('css')
</head>

<body>
    <div id="app">
        <nav class="main-nav">
            <div class="container" data-aos="fade-down">
                <a href="{{ route('home') }}" class="logo-btn"><img src="{{ asset('img/main/comsoc.png')}}" alt="logo" width="60px" height="60px"></a>
                <ul class="nav-lists">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#feedback" class="nav-link">Feedback</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
                <div class="hamburger">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </div>

                <div class="nav-social" style="list-style:none!important">
                    <!-- Authentication Links -->
                    @guest
                    <li class="">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class=" dropdown" style="list-style:none!important">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->getFullName() }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-primary logout-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    <a href="https://www.pup.edu.ph/" class="logo-btn" target="_blank"><img src="{{ asset('img/main/pup_logo.png')}}" alt="pup" width="60px" height="60px"></a>
                </div>
            </div>

            <ul class="side-nav">
                <a href="{{ route('home') }}" class="side-nav-logo"><img src="{{ asset('img/main/comsoc.png') }}" alt="logo" width="50px" height="50px"></a>
                <li class="side-link"><a href="{{ route('home') }}">Home</a></li>
                <li class="side-link"><a href="#about" style="width: 100%;">About</a></li>
                <li class="side-link"><a href="#feedback">Feedback</a></li>
                <li class="side-link"><a href="#contact">Contact</a></li>
                @guest
                <li class="side-link">
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="side-link">
                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class=" dropdown" style="list-style:none!important">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->getFullName() }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-primary logout-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                <div class="ml-3">
                    <a href="https://www.pup.edu.ph/" target="_blank"><img src="{{ asset('img/main/pup_logo.png')}}" alt="pup" width="50px"></a>
                </div>

            </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>

</html>