@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h3>Create Officer</h2>
    </div>
    <div class="container">
        <form action="{{ route('officers.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="num_of_votes">
                        Number of votes needed
                    </label>
                    <input type="number" class="form-control @error('num_of_votes') is-invalid @enderror" name="num_of_votes" value="{{ old('num_of_votes') }}" value="1" min="1">
                    @error('num_of_votes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <a href="{{ route('officers.index') }}" class="btn btn-muted" name="create">Cancel</a>
                <button type="submit" class="btn btn-primary" name="create">Create</button>
            </div>
        </form>
    </div>




</div>
@endsection