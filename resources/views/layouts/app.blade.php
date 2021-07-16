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
        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>

        <!-- Your Chat Plugin code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>
        <nav class="main-nav">
            <div class="container" data-aos="fade-down">
                <a href="{{ route('home') }}" class="logo-btn"><img src="{{ asset('img/main/comsoc.png')}}" alt="logo" width="50px" height="50px"></a>
                <ul class="nav-lists">
                    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link">About</a></li>
                    <li><a href="{{ route('candidates.lists') }}" class="nav-link">Candidates</a></li>
                    <li><a href="{{ route('votes.index') }}" class="nav-link">Vote</a></li>
                    <li><a href="{{ route('votes.tallies') }}" class="nav-link">Results</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
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

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->getFullName() }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->isAdmin())
                            <a class="dropdown-item" href="{{ route('admin.index') }}">Go to admin</a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf

                            </form>

                        </div>
                    </li>
                    @endguest
                    <a href="https://www.pup.edu.ph/" class="logo-btn" target="_blank"><img src="{{ asset('img/main/pup_logo.png')}}" alt="pup" width="50px" height="50px"></a>
                </div>
            </div>

            <ul class="side-nav">
                <a href="{{ route('home') }}" class="side-nav-logo"><img src="{{ asset('img/main/comsoc.png') }}" alt="logo" width="50px" height="50px"></a>
                <li class="side-link"><a href="{{ route('home') }}">Home</a></li>
                <li class="side-link"><a href="{{ route('about') }}" style="width: 100%;">About</a></li>
                <li class="side-link"><a href="#" style="width: 100%;">Candidates</a></li>
                <li class="side-link"><a href="{{ route('votes.index') }}" style="width: 100%;">Vote</a></li>
                <li class="side-link"><a href="{{ route('votes.tallies') }}">Results</a></li>
                <li class="side-link"><a href="{{ route('contact') }}">Contact</a></li>
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

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(auth()->user()->isAdmin())
                        <a class="dropdown-item" href="{{ route('admin.index') }}">Go to admin</a>
                        @endif
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
        <!--Back to top button-->
        <a id="button"><i class="fas fa-arrow-up arrow"></i></a>

        <main class="">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->

    <footer class="mt-2" style="background: #9c27b0; min-height: 100px">
        <div class="container d-flex align-items-center">
            <a href="index.php" class="logo-btn mt-3"><img src="{{ asset('img/main/comsoc.png') }}" alt="logo" width="60px"></a>
            <div class="d-flex ml-auto footer-icons">
                <a href="#"><i class="icon fab fa-instagram text-dark ml-2 footer-icon"></i></a>
                <a href="#"><i class="icon fab fa-facebook-square text-dark ml-2 footer-icon"></i></a>
                <a href="#"><i class="icon fab fa-twitter-square text-dark ml-2 footer-icon"></i></a>
            </div>
        </div>

    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')



    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "108012664895048");
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v11.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>