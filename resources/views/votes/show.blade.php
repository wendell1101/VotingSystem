@extends('layouts.app')


@section('content')
<div class="container">
    <h1>Vote for {{ $officer->name }}</h1>
    @if($officer->candidates->count() > 0)
    <form action="{{ route('votes.store') }}" method="POST" id="vote-form">
        @csrf
        <div class="card">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="officer_id" value="{{ $officer->id }}">
            @foreach($officer->candidates as $candidate)
            <div class="card-header">
                <input type="radio" name="candidate_id" id="candidate_id" value="{{ $candidate->id }}" required>
                <img src="{{ asset('storage/candidate_images/' . $candidate->image) }}" alt="profile" class="rounded-circle" width="50" height="50">
                {{$candidate->name}}<br>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="voteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Vote</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to cast your vote?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="vote-btn" class="btn btn-primary">Yes, Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </form>
    <div class="form-group mt-2">
        <a href="{{ route('votes.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#voteModal">
            Proceed
        </button>
    </div>




    @else
    <h2 class="text-secondary">No candidate for this position</h2>
    @endif
</div>

@endsection

<script type="text/javascript">
    const voteBtn = document.getElementById('vote-btn');
    const voteForm = document.getElementById('vote-form');

    // voteBtn.addEventListener('click')
</script>