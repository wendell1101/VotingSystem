@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{ route('votes.index') }}" class="btn btn-success">
            Cast Your Vote
        </a>
    </div>
</div>
@endsection