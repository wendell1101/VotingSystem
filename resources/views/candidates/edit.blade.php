@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h3>Edit Candidate</h2>
    </div>
    <div class="container">
        <form action="{{ route('candidates.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col text-center">
                    <img id="uploadPreview" src="{{ asset('storage/candidate_images/' . $candidate->image) }}" class="img-fluid border" style="width: 130px; height:120px; border:none!important" /><br>
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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Fullname" value="{{ isset($candidate->name) ? $candidate->name : old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control @error('course_and_section') is-invalid @enderror" name="course_and_section" placeholder="Course and Section" value="{{ isset($candidate->course_and_section) ? $candidate->course_and_section :old('course_and_section') }}">
                    @error('course_and_section')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- email -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ isset($candidate->email) ? $candidate->email : old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="contact_no" placeholder="Contact Number" value="{{ isset($candidate->contact_no) ? $candidate->contact_no :old('contact_no') }}">
                    @error('contact_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">

                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description" value="{{ isset($candidate->description) ? $candidate->description : old('description') }}">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="platform">Platform</label>
                    <textarea name="platform" id="platform" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Platform">
                    {{ isset($candidate->platform) ? $candidate->platform : old('platform') }}
                    </textarea>

                    @error('platform')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- officer_id -->
            @if($officers)
            <div class="form-row">
                <div class="form-group col">
                    <select name="officer_id" id="officer_id" class="form-control" required>
                        <option value="" required> Choose position</option>
                        @foreach($officers as $officer)
                        <option value="{{ $officer->id }}" {{ ($candidate->officer_id == $officer->id) ? 'selected' : '' }}> {{ ucwords($officer->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <div class="form-row">
                <a href="{{ route('candidates.index') }}" class="btn btn-muted" name="create">Cancel</a>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
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