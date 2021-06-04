@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h3>Candidates</h2>
            <a href="{{ route('candidates.create') }}" class="btn btn-primary btn-md ml-auto">Create <i class="ml-2 fa fa-plus"></i></a>

    </div>

    <div class="table-responsive">
        <x-alert />
        <table class="table" id="general-table" class="display" style="width:100%">
            @if($candidates->count() > 0)
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Course & Section</th>
                    <th>Position</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                <tr>
                    <td class="text-center">{{ ++$loop->index }}</td>
                    <td>{{ $candidate->name }}</td>
                    <td><img src="{{ asset('storage/candidate_images/' . $candidate->image) }}" alt="profile" width="80" height="80"></td>
                    <td>{{ $candidate->email }}</td>
                    <td>{{ $candidate->course_and_section }} </td>
                    <td>{{ $candidate->getOfficerName($candidate->officer_id) }} </td>
                    <td class="td-actions text-right">
                        <!-- <button type="button" rel="tooltip" class="btn btn-info">
                            <i class="material-icons">person</i>
                        </button> -->
                        <a href="{{ route('candidates.edit', $candidate->id) }}" rel="tooltip" class="btn btn-success">
                            <i class="material-icons">edit</i>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteCandidate({{$candidate->id}});">
                            <i class="material-icons">close</i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <h2 class="text-secondary text-center">No Candidate Yet</h2>
            @endif


        </table>


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