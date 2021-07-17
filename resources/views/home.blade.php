@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 100vh">
    <x-alert />
    <div class="row py-5" style="margin-top:60px">
        <div class="col-md-6 ">
            <p class="font-weight-bold sub-text">ONE DECISION CAN CHANGE THE FUTURE</p>
            <h1 class="text-primary font-weight-bold main-text">ONLINE VOTING SYSTEM</h1>
            <p>Have an impact to our society. Vote Wisely</p>

            <p class="text-warning font-weight-bold">COMPUTER SOCIETY - PUP STO. TOMAS</p>

            <a href="{{ route('votes.index') }}" class="btn btn-primary btn-lg mt-3">
                Cast Your Vote
            </a>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <img src="{{ asset('img/main/banner-img.png')}}" alt="" class="img-fluid banner-img">
        </div>
    </div>
    <div class="row pt-5 mb-5" style="min-height: 100vh">
        <div class="col-md-12 text-center pb-3 border-bottom">
            <h2 class="text-primary">WHAT IS IT.</h2>
            <h3>A Intractive Way To Solve Conventional Voting.</h3>
        </div>
        <div class="col-md-12 mt-5 pb-3 border-bottom" style="margin-top:50px">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="img-fluid">
                        <img src="{{ asset('img/main/Nominee.png') }}" alt="image" width="100px" height="100px">
                    </div>
                    <h3 class="text-primary">VOTE ONLINE</h3>
                    <p class="font-italic">
                        You Just Need Basic Details of Yours and We Will Let You Vote.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="img-fluid">
                        <img src="{{ asset('img/main/Vote.png') }}" alt="image" width="100px" height="100px">
                    </div>
                    <h3 class="text-primary">NOMINATION</h3>
                    <p class="font-italic">
                        Admin's Control Panel allows you to manage the list of filled nomination.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="img-fluid">
                        <img src="{{ asset('img/main/Stats.png') }}" alt="image" width="100px" height="100px">
                    </div>
                    <h3 class="text-primary">STATISTICS</h3>
                    <p class="font-italic">
                        Shows You the Graphical Data Representation of your votes. And, It is in Admin's Control Panel.
                    </p>
                </div>

            </div>

        </div>
    </div>


</div>
<!-- Contact -->
<!--Contact section-->
<div class="contact" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-primary text-center" data-aos="fade-down">GET IN TOUCH</h2>
            </div>
            <div class="col-12 text-center mt-5 contact-subtitle" data-aos="fade-up">
                <h3 class="text-content contact-text mb-2">If you have any suggestion regarding our voting system. We 'll welcome your ideas</h3>
                <h3 class="text-content contact-text mt-3">Start by <a href="mailto:wendellchansuazo11@gmail.com" class="text-header contact-link">saying hi!</a></h3>
            </div>
            <div class="contact-info text-center mx-auto">
                <div class="">
                    <h4 class="subtitle2 contact-subtitle" data-aos="fade-up">+639959768531</h4>
                    <a class="icon"><i class="contact-icon fas fa-phone" data-aos="fade-up"></i></a>
                </div>
                <div class="">
                    <h4 class="subtitle2 contact-subtitle" data-aos="fade-up">comsocpup@gmail.com</h4>
                    <a href="mailto:wendellchansuazo11@gmail.com" class="icon"><i class="contact-icon far fa-envelope" data-aos="fade-up"></i></a>
                </div>
                <div class="">
                    <h4 class="subtitle2 contact-subtitle" data-aos="fade-up">@comsocpupstb</h4>
                    <a href="https://twitter.com/wendell1101" class="icon" data-aos="fade-up"><i class="contact-icon fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-12 text-center mt-5">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg" data-aos="fade-in">Contact US</a>
            </div>
        </div>
    </div>
</div>


@endsection