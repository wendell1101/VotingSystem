@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h2>Voting Results</h2>
    </div>

    <div class="table-responsive">
        <x-alert />
        <table class="table" id="general-table" class="display" style="width:100%">
            @if($officers->count() > 0)
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Officer</th>
                    <th class="text-center">Total Votes</th>

                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach($officers as $officer)
                <tr>
                    <td class="text-center">{{ ++$loop->index }}</td>
                    <td class="text-center"><a href="{{ route('results.show', $officer->id) }}">{{ strtoupper($officer->name)}}</a></td>
                    <td class="text-center">{{ $officer->getVotesByOfficer($officer->id)}}</td>

                </tr>
                @endforeach
            </tbody>
            @else
            <h2 class="text-secondary text-center">No Officer Yet</h2>
            @endif


        </table>


    </div>



</div>
@endsection