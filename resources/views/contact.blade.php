@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-title text-center text-primary" data-aos="fade-down">CONTACT US</h2>
            <h5 class="text-center mt-4">We love hearing from you. </h5>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="row contact-texts">
                    <div class="col-md-12 mt-5">
                        <h4 class="text-primary">Email</h4>
                        <p class="text-title pb-2 text-contact">pupcomsoc@gmail.com</p>
                    </div>
                    <div class="col-md-12 mt-5">
                        <h4 class="text-primary">Call</h4>
                        <p class="text-title pb-2 text-contact">2342-3244-4232</p>
                    </div>
                    <div class="col-md-12 mt-5 text-contact">
                        <h4 class="text-primary">Address</h4>
                        <p class="text-title pb-2">
                            A. Bonifacio St., <br>
                            Santo Tomas, <br>
                            4234, Batangas <br>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-7 mt-5 p-3 shadow">
                <img src="{{ asset('img/main/pup_gate.jpg') }}" class="img-fluid " alt="" width="100%" height="80%">
            </div>

        </div>

    </div>
</div>


@endsection