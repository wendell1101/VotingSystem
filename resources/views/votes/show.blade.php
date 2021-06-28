@extends('layouts.app')


@section('content')
<div class="container py-4" style="min-height: 80vh">
    <h2 class="text-primary">Vote for {{ $officer->name }}</h2>
    @if($officer->candidates->count() > 0)
    <form action="{{ route('votes.store') }}" method="POST" id="vote-form">
        @csrf
        <div class="card">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="officer_id" value="{{ $officer->id }}">
            @foreach($officer->candidates as $candidate)
            <div class="card-header">
                <input type="radio" name="candidate_id" id="candidate_id" value="{{ $candidate->id }}" required>
                <img src="{{ asset('storage/candidate_images/' . $candidate->image) }}" alt="profile" class="ml-2 rounded-circle" width="50" height="50">

                {{$candidate->name}}- Partylist:
                <span class="font-weight-bold">
                    <b>{{$candidate->getPartylistName($candidate->partylist_id)}}</b>
                </span>
                <span class="btn btn-primary btn-sm float-right" id="btn-more-info" data-toggle="modal" data-target="#infoModal" onclick="showInfo({{ $candidate }})">More Info</span>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="infoModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="exampleModalLabel">More Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center" id="modal-contents">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
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

@section('css')
<style>
    .toggleInfo {
        display: block;
    }
</style>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    const voteBtn = document.getElementById('vote-btn');
    const voteForm = document.getElementById('vote-form');

    const btnMoreInfo = document.getElementById('btn-more-info');
    const moreInfo = document.getElementById('more-info');
    const modalContent = document.getElementById('modal-contents');
    const infoModal = document.getElementById('infoModal2')

    function showInfo(candidate) {
        let asset = "{{ asset('storage/candidate_images/')}}";
        let image = `/${candidate.image}`;
        let assetImage = asset + image;

        modalContent.innerHTML = `
        <div class="d-flex justify-content-center mb-2">
                                <img src="${assetImage}" alt="image" class="rounded-circle mx-auto" style="width:80px; height:80px">
                            </div>
            <p>Name : ${candidate.name} </p>
            <p>Course and Section : ${candidate.course_and_section}</p>
            <p>Description: ${candidate.description}</p>
            <p>Platform: ${candidate.platform}</p>
            `;
        $('#infoModal2').modal('show');
    }
</script>
@endsection