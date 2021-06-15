@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h3>Create User</h2>
    </div>
    <div class="container">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col text-center">
                    <img id="uploadPreview" src="{{ asset('img/main/default.png') }}" class="img-fluid border rounded-circle" style="width: 130px; height:120px; border:none!important" /><br>
                    <label for="image">
                        <h2>
                            <i class="fas fa-user-plus text-primary" style="cursor: pointer"></i>
                        </h2>
                    </label>

                    <input id="image" type="file" name="image" onchange="PreviewImage();" style="display:none" />
                    @error('image')
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Firstname" value="{{ old('first_name') }}">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Lastname" value="{{ old('last_name') }}">
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- email -->
            <div class="form-row">
                <div class="form-group col">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- positions -->
            @if($positions)
            <div class="form-row">

                <div class="form-group col">
                    <select name="position_id" id="position_id" class="form-control" required>
                        <option value=""> Choose Role</option>
                        @foreach($positions as $position)
                        <option value="{{ $position->id}}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password') }}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm-Password">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <a href="{{ route('users.index') }}" class="btn btn-muted" name="create">Cancel</a>
                <button type="submit" class="btn btn-primary" name="create">Create</button>
            </div>
        </form>
    </div>




</div>
@endsection

@section('js')
<script>
    //auto preview of image


    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    //prevent default
</script>
@endsection