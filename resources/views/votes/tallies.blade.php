@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 mb-2">
            <h2>Votes Tally</h2>
        </div>

        @if($officers->count() > 0)
        @foreach($officers as $officer)
        <div class="col-md-6">
            <h4>{{ strtoupper($officer->name) }}</h4>
            @if($officer->candidates->count() > 0)
            <div class="card p-2">
                @foreach($officer->candidates as $candidate)
                <p class="font-weight-bold mt-1">{{ $candidate->name}}</p>


                <div class="d-flex align-items-center justify-content-space-between">
                    <div style="flex:1">
                        <img src="{{ asset('storage/candidate_images/' . $candidate->image)}}" class="rounded-circle" alt="image" width="50" height="50">
                        <!-- {{ $percent = $candidate->getVotePercentagePerCandidate($candidate->getCandidateVotesCount($officer->id , $candidate->id), $officer->getTotalVotesPerOfficer($officer->id))}} % -->
                    </div>

                    <div style="flex:5">
                        <div class="progress">

                            <div class="progress-bar
                  @if($percent == 0)
                  text-dark w-100 bg-light border
                  @endif
                  " role="progressbar" style="width: {{ $percent }}%; " aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">{{ $percent }}%</div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            @else
            <div class="card p-1">
                <h4>No Candidate Yet</h4>
            </div>

            @endif
        </div>

        @endforeach
        @else
        <div class="card p-1">
            <h4>No officer yet</h4>
        </div>

        @endif


    </div>
</div>


@endsection

@section('css')
<style>
    .progress {
        height: 40px;
    }

    .progress-bar {
        background: #9c27b0;
    }
</style>
@endsection