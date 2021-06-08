<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse main-bg-color
    " role="navigation" style="border:none">
        <div class="container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header align-items-center">

                <a href="index.html" class="navbar-brand headerFont text-lg text-white"><strong>
                        <!-- Computer Society  -->
                        <img src="{{ asset('img/main/COMSOC.png') }}" alt="logo" width="50px">
                    </strong></a>
            </div>

            <div class="collapse navbar-collapse" id="example-nav-collapse">
                <ul class="nav navbar-nav">

                    <li><a href="#featuresTab"><span class="subFont" style="color:#fff!important"><strong>Features</strong></span></a></li>
                    <li><a href="#abhoutTab"><span class="subFont" style="color:#fff!important"><strong>About</strong></span></a></li>
                    <li><a href="#feedbackTab"><span class="subFont" style="color:#fff!important"><strong>Feedback</strong></span></a></li>

                </ul>


                <ul class="ml-auto align-items-center d-flex">
                    <!-- Admin Panel -->
                    @guest
                    <li><a href="{{ route('login') }}"><span>
                                Login
                            </span></a></li>



                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}"><span>
                                Register
                            </span></a></li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            @if(Auth::user()->avatar)
                            <img src="{{ asset('/storage/images/'. Auth::user()->avatar) }}" alt="avatar" class="rounded-circle" style="width:40px">
                            @endif

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

                </ul>

            </div> <!-- end of container -->
    </nav>
</div>