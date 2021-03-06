@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h3>User Roles</h2>
            <a href="{{ route('positions.create') }}" class="btn btn-primary btn-md ml-auto">Create Role <i class="ml-2 fa fa-plus"></i></a>

    </div>

    <div class="table-responsive">
        <x-alert />
        <table class="table" id="general-table" class="display" style="width:100%">
            @if($positions->count() > 0)
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach($positions as $position)
                <tr>
                    <td class="text-center">{{ ++$loop->index }}</td>
                    <td class="text-center">{{ strtoupper($position->name)}}</td>
                    <td class="td-actions text-right">
                        <!-- <button type="button" rel="tooltip" class="btn btn-info">
                            <i class="material-icons">person</i>
                        </button> -->
                        <a href="{{ route('positions.edit', $position->id) }}" rel="tooltip" class="btn btn-success">
                            <i class="material-icons">edit</i>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deletePosition({{$position->id}});">
                            <i class="material-icons">close</i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <h2 class="text-secondary text-center">No Position Yet</h2>
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
                        <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this role?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="btn-confirm-delete">Yes, Delete</button>
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


    function deletePosition(id) {
        deleteBtn.addEventListener('click', function(e) {
            deleteForm.action = `/positions/${id}/`;
            deleteForm.submit();
        })


    }
</script>
@endsection