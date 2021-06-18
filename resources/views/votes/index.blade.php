@extends('layouts.app')


@section('content')
<div class="container">
    <h2 class="text-primary">Choose Candidate to Vote</h2>

    <div class="card">
        @if($officers->count() > 0)
        <div class="table-responsive">
            <x-alert />
            <table class="table" id="general-table" class="display" style="width:100%">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($officers as $officer)
                    <tr>
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
                            <span class="text-success">Voted</span>
                            @else
                            <span class="text-muted">Pending</span>
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