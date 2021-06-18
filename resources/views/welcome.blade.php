@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-md-6 ">
            <p class="font-weight-bold sub-text">ONE DECISION CAN CHANGE THE FUTURE</p>
            <h1 class="text-primary font-weight-bold main-text">ONLINE VOTING SYSTEM</h1>
            <p>Have an impact to our society. Vote Wisely</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, labore?</p>

            <a href="{{ route('votes.index') }}" class="btn btn-primary btn-lg mt-3">
                Cast Your Vote
            </a>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <img src="{{ asset('img/main/banner-img.png')}}" alt="" class="img-fluid banner-img">
        </div>
    </div>
</div>
@endsection