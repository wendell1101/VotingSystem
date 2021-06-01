@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex align-items-center" width="100%">
        <h3>User Admin page</h2>
            <button type="button" class="btn btn-danger btn-md ml-auto">Create <i class="ml-2 fa fa-plus"></i></button>

    </div>

    <div class="table-responsive">

        <table class="table" id="general-table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Student Number</th>
                    <th>Image</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="text-center">{{ ++$loop->index }}</td>
                    <td>{{ $user->student_no }}</td>
                    <td><img src="{{ asset('storage/profile_images/' . $user->image) }}" alt="profile" width="80"></td>
                    <td>{{ $user->getFullName()}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getPosition($user->position_id) }}</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" class="btn btn-info">
                            <i class="material-icons">person</i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-success">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-danger">
                            <i class="material-icons">close</i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection