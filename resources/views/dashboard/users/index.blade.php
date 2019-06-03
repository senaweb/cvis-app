@extends('layouts.dashboard')

@section('content')

@if(empty($users))
<div class="row">
    <div class="col-12">
        <div class="center">
            <div class="alert alert-info">
                <div class="alert-heading">Info
                    <button onclick=" $(this).parent().parent().hide(); " type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <hr>
                </div>
                <div class="alert-body">
                    No record(s) found.
                </div>
            </div>
        </div>
    </div>
</div>

@else
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fullname</th>
                                <th>Organization Unit</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $data)
                            <tr role="row" class="odd">
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->fullName }}</td>
                                <td>{{ $data->organization_unit }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>
                                    <div class="buttons">
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('users.show', $data->id) }}" data-toggle="tooltip" data-placement="left" title="View">
                                            <i class="fa fa-eye"></i></a>
                                        <a class="btn btn-sm btn-outline-info" href="{{ route('users.edit', $data->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        @can('super admin')
                                        <form class="delete-form d-inline" action="{{ route('users.destroy', $data->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Showing 1 to 10 of 10 entries <div class="float-right">{{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection