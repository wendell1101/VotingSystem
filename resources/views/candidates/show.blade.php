@extends('layouts.admin')

@section('content')

<div class="container-fluid">


    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('storage/candidate_images/' . $candidate->image) }}" alt="image" class="rounded-circle" style="width:80px; height:80px">
        </div>
        <div class="d-flex justify-content-center">
            <h3 class="text-center">{{ strtoupper($candidate->name) }}</h2>
        </div>

        <span class="font-weight-bold">Platform:</span>
        <p>{{ $candidate->platform }}</p>
        <span class="font-weight-bold">Description:</span>
        <p>{{ $candidate->description }}</p>
        <span class="font-weight-bold">Course and Section:</span>
        <p>{{ $candidate->course_and_section }}</p>
        <span class="font-weight-bold">Email:</span>
        <p>{{ $candidate->email }}</p>
        <span class="font-weight-bold">Contact Number</span>
        <p>{{ $candidate->contact_no }}</p>
        <a href="{{ route('candidates.index') }}" class="btn btn-primary"><i class="text-white fas fa-long-arrow-alt-left mr-2"></i>Back</a>
    </div>

    <!-- modal -->

    <!-- Modal -->
    <form action="" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Candidate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this candidate?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="btn-confirm-delete">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



</div>
@endsection

@section('js')
<script>
    const deleteForm = document.getElementById('deleteForm');
    const deleteBtn = document.getElementById('btn-confirm-delete');


    function deleteCandidate(id) {
        deleteBtn.addEventListener('click', function(e) {
            deleteForm.action = `/candidates/${id}/`;
            deleteForm.submit();
        })


    }
</script>
@endsection