@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h3>Edit Partylist</h2>
    </div>
    <div class="container">
        <form action="{{ route('partylists.update', $partylist->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ isset($partylist->name) ? $partylist->name : old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Description" class="form-control  @error('description') is-invalid @enderror">
                    {{ isset($partylist->description) ? $partylist->description : old('description') }}
                    </textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <a href="{{ route('partylists.index') }}" class="btn btn-muted" name="create">Cancel</a>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>
        </form>
    </div>




</div>
@endsection