@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons"><i class="fas fa-users"></i></i>
          <!-- <i class="material-iconsfas fa-poll"></i> -->
        </div>
        <p class="card-category">Users</p>
        <h3 class="card-title">{{ $users->count()}}
          <small></small>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-warning mr-2"><i class="fas fa-user"></i></i>
          <a href="{{ route('users.index') }}">Go to users...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons"><i class="fa fa-tasks"> </i></i>
        </div>
        <p class="card-category">Officers</p>
        <h3 class="card-title">{{ $officers->count() }}</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-warning mr-2"><i class="fas fa-tasks"></i></i>
          <a href="{{ route('officers.index') }}">Go to roles...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons"><img src="{{ asset('img/main/candidate_icon.svg') }}" alt="icon"></i>
        </div>
        <p class="card-category">Candidates</p>
        <h3 class="card-title">{{ $candidates->count() }}</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-warning mr-2"><i class="fas fa-user"></i></i>
          <a href="{{ route('candidates.index') }}">Go to candidates...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
          <i class="material-icons"><i class="fas fa-poll"></i></i>
        </div>
        <p class="card-category">Vote Results</p>
        <h3 class="card-title">{{ $votes->count()}}</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-primary mr-2"><i class="fas fa-poll"></i></i>
          <a href="{{ route('results.index') }}">Go to results...</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-2">
    <h2>Votes Tally</h2>
  </div>

  @if($officers->count() > 0)
  @foreach($officers as $officer)
  <div class="col-md-6">
    <h4>{{ strtoupper($officer->name) }}</h4>
    @if($officer->candidates->count() > 0)
    <div class="card p-1">
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