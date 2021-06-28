@extends('layouts.app')


@section('content')
<div class="container" style="min-height: 92vh">
    <h2 class="text-primary mt-4">Choose Candidate to Vote</h2>

    <div class="card">
        @if($officers->count() > 0)
        <div class="table-responsive">
            <x-alert />
            <table class="table" id="general-table" class="display" style="width:100%">

                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($officers as $officer)
                    <tr class="text-center">
                        <td>{{ ++$loop->index}}</td>
                        <td>
                            @if(!$officer->checkIfUserHasVoted(auth()->user()->id,$officer->id))
                            <a href="{{ route('votes.show', $officer->id)}}"><span class="font-weight-bold">{{ strtoupper($officer->name) }}</span></a>
                            @else
                            <del>
                                <span class="font-weight-bold">{{ strtoupper($officer->name) }}</span>
                            </del>
                            @endif
                        </td>
                        <td>
                            @if($officer->checkIfUserHasVoted(auth()->user()->id,$officer->id))
                            <button class="btn btn-success">
                                Voted
                                <i class="fas fa-vote-yea ml-2"></i>
                            </button>
                            <!-- <span class="text-success">Voted </span> -->
                            @else
                            <button class="btn btn-muted">
                                Pending
                                <i class="far fa-hourglass ml-2"></i>
                            </button>
                            <!-- <span class="text-muted">Pending</span> -->
                            @endif
                        </td>
                    </tr>
                    @endforeach

        </div>



        </tbody>
        @else
        <h2 class="text-secondary text-center">
            <h2 class="text-secondary">No Candidate Yet</h2>
        </h2>
        @endif


        </table>


    </div>




</div>
<a href="{{ route('votes.tallies') }}" class="btn btn-primary mt-2 btn-md">View Results</a>

@endsection