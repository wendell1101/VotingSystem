@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h1 class="text-primary">{{ $partylist->name}}</h1>

    </div>
    <div class="row">
        <div class="col">
            <small>Description</small>
            <p>{{ $partylist->description }}</p>
        </div>
    </div>
    <a href="{{ route('partylists.index') }}" class="btn btn-primary"><i class="text-white fas fa-long-arrow-alt-left mr-2"></i>Back</a>




</div>
@endsection