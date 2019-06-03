@extends('layouts.dashboard')

@section('content')
    @include('dashboard.reports.includes.generator-components')
    {{-- @if(!empty($data))
        <div class="row justify-content-center my-6">
            <div class="col">
                <div class="report-card border p-3">
                    <h5 class="text-center pb-5" style="text-decoration:underline">Centralised Vehicle Incident System (cVIS) as at {{ $data[0]->created_at->format('d/m/Y') }}</h5>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>VIN #</th>
                          <th>Location</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($data as $incident)
                            <tr role="row" class="odd">
                                <td>{{ $incident->created_at->format('d/m/Y') }}</td>
                                <td>{{ $incident->vehicle->vehicle_id_number }}</td>
                                <td>{{ $incident->location }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <strong><div class="float-right"> Total Incidents: {{ $data->count() }}</div></strong>
            </div>
        </div>
    @endif --}}
@includeIf('dashboard.reports.includes.report-table', ['incicents' => 'incidents'])
@endsection