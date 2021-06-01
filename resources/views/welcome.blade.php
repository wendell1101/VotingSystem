@extends('layouts.base')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="jumbotron text-center text-block" style="padding-top:170px;">
                <img src="{{ asset('img/Vote.png') }}" alt="">
                <h1 class="specialHead">Online Voting System</h1>
                <p class="normalFont">Safe . Reliable . Secure . Fast </p>

                <a href="vault.html" class="btn btn-primary btn-md specialHead"> <span class="glyphicon glyphicon-tag"></span> Cast Your Vote</a>
            </div>
        </div>
    </div>
</div>

<div class="conatiner" id="featuresTab">
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="page-header" style="padding-top:50px;padding-bottom:50px">
                <h1 class="normalFont" style="font-size:44px;">WHAT IS IT.</h1>
                <p class="subFont" style="font-size:24px;"><em>A Intractive Way To Solve Conventional Voting.</em></p>
            </div>
        </div>
    </div>
</div>

<div class="conatiner" style="padding:50px;" id="aboutTab">
    <div class="row">



        <div class="col-sm-4 text-center">

            <img src="{{ asset('img/Nominee.png') }}" width="100" height="100" alt="" />
            <h2 class="normalFont" style="font-size:28px;">VOTE ONLINE.</h2>
            <p><em>You Just Need Basic Details of Yours and We Will Let You Vote.</em></p>

        </div>
        <div class="col-sm-4 text-center">

            <img src="{{ asset('img/Vote.png') }}" width="100" height="100" alt="" />
            <h2 class="normalFont" style="font-size:28px;">NOMINATION</h2>
            <p><em>Admin's Control Panel allows you to manage the list of filled nomination.</em></p>

        </div>
        <div class="col-sm-4 text-center">

            <img src="{{ asset('img/Stats.png')}}" width="100" height="100" alt="" />
            <h2 class="normalFont" style="font-size:28px;">Statitics</h2>
            <p><em>SHows You the Graphical Data Representation of your votes. And, It is in Admin's Control Panel.</em></p>

        </div>


    </div>
</div>
<hr>
<div class="container" id="feedbackTab">
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="page-header" style="padding-top:30px;padding-bottom:30px;">
                <img src="{{ asset('img/MailBoy.png') }}" width="100" height="100" alt="">
                <br>
                <h1 class="specialHead">CONTACT</h1>
                <p style="font-size:16px;">If You have any suggestion regarding our voting system. We 'll welcome your suggestion,</p>
                <p><strong>support@greensyntax.com</strong></p>

                <br>
                <a href="mailto:support@greensyntax.co.in" class="btn btn-info"> <strong>Feedback</strong></a>
            </div>
        </div>
    </div>
</div>

@endsection