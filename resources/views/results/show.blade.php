@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h2>Voting Results For {{ ucfirst($officer->name) }}</h2>


    </div>

    <div class="table-responsive">
        <x-alert />
        <table class="table" id="general-table" class="display" style="width:100%">
            Total Votes : {{ $total_percent = $officer->getTotalVotesPerOfficer($officer->id)}}
            @if($officer)
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Candidate Name</th>
                    <th class="text-center">Total Vote</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Vote Percentage</th>

                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach($officer->candidates as $candidate)
                <tr>
                    <td class="text-center">{{ ++$loop->index }}</td>
                    <td class="text-center">{{ $candidate->name }}</td>
                    <td class="text-center">{{ $candidate->getCandidateVotesCount($officer->id , $candidate->id)}}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage/candidate_images/' . $candidate->image) }}" alt="image" width="50px" height="50px" class="rounded-circle">
                    </td>
                    <td class="text-center">
                        {{ $percent = $candidate->getVotePercentagePerCandidate($candidate->getCandidateVotesCount($officer->id , $candidate->id), $officer->getTotalVotesPerOfficer($officer->id))}} %
                        <div class="progress">
                            <div class="progress-bar
                            @if($percent == 0)
                            text-dark
                            @endif
                            " role="progressbar" style="width: {{ $percent }}%; " aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">{{ $percent }}%</div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <h2 class="text-secondary text-center">No Votes Yet</h2>
            @endif


        </table>


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