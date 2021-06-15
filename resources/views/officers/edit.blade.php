@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h3>Edit Officer</h2>
    </div>
    <div class="container">
        <form action="{{ route('officers.update', $officer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ isset($officer->name) ? $officer->name : old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <a href="{{ route('officers.index') }}" class="btn btn-muted" name="create">Cancel</a>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>
        </form>
    </div>




</div>
@endsection