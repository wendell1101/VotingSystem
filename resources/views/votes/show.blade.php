@extends('layouts.app')


@section('content')
<div class="container">
    <h1>Vote for {{ $officer->name }}</h1>
    @if($officer->candidates->count() > 0)
    <form action="{{ route('votes.store') }}" method="POST">
        @csrf
        <div class="card">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="officer_id" value="{{ $officer->id }}">
            @foreach($officer->candidates as $candidate)
            <div class="card-header">
                <input type="radio" name="candidate_id" id="candidate_id" value="{{ $candidate->id }}">
                <img src="{{ asset('storage/candidate_images/' . $candidate->image) }}" alt="profile" class="rounded-circle" width="50" height="50">
                {{$candidate->name}}<br>
            </div>
            @endforeach
        </div>
        <div class="form-group mt-2">
            <a href="{{ route('votes.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Proceed</button>
        </div>
    </form>


    @else
    <h2 class="text-secondary">No candidate for this position</h2>
    @endif
</div>

@endsection

<script type="text/javascript">
    // function getMaxSelection(num) {
    //     $(document).ready(function() {

    //         var last_valid_selection = null;

    //         $('#candidate_id').change(function(event) {
    //             if ($(this).val().length > num) {

    //                 $(this).val(last_valid_selection);
    //             } else {
    //                 last_valid_selection = $(this).val();
    //             }
    //         });
    //     });
    // }
</script>