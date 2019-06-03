@extends('layouts.dashboard')

@section('content')

@if(request()->route('dashboard.vehicle.*', request()->keyword))
<h4 class="pb-5">You seached for: <span class="text-info">{{ request()->keyword }}</span> </h4>
@endif

@if(empty($searchResults))
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
                            <th>Incident #</th>
                            {{-- <th>Incident Type</th> --}}
                            <th>VIN #</th>
                            {{-- <th>Reg. Number</th> --}}
                            <th>Date</th>
                            {{-- <th>Time of Incident</th> --}}
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchResults as $data)
                        <tr role="row" class="odd">
                            <td>{{ $data->id }}</td>
                            {{-- <td>{{ $data->incident_type }}</td> --}}
                            {{-- <td>{{ $data->vehicle ? $data->vehicle->vehicle_id_number : 'N/A'}}</td> --}}
                            <td>{{ $data->vehicle ? $data->vehicle->registration_number : 'N/A' }}</td>
                            <td>{{ $data->date_of_incident->format('d/m/Y') }}</td>
                            {{-- <td>{{ timefy($data->time_of_incident) }}</td> --}}
                            <td>{{ trancate($data->location) }}</td>
                            <td>
                                <div class="buttons">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('incidents.show', $data->id) }}" data-toggle="tooltip" data-placement="left" title="View">
                                        <i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-outline-info" href="{{ route('incidents.edit', $data->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    @can('super admin')
                                    <form class="delete-form d-inline" action="{{ route('incidents.destroy', $data->id) }}" method="POST">
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
                @if(request()->is('incidents')) Showing 1 to 10 of 10 entries <div class="float-right">{{ $searchResults->links() }}</div> @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection