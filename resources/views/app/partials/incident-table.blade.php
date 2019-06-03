<div class="container pt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                {{-- <th scope="col">#</th> --}}
                <th scope="col">Incident Date</th>
                <th scope="col">VIN</th>
                <th scope="col">Incident Type</th>
                {{-- <th scope="col">Reg. Number</th> --}}
                {{-- <th scope="col">Time of Incident</th> --}}
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
            <tr>
                {{-- <th scope="row">{{ $data->id }}</th> --}}
                {{-- <td>{{ datefy($data->date_of_incident) }}</td> --}}
                <td>{{ $data->date_of_incident->format('d/m/Y') }}</td>
                <td>{{ $data->vehicle->vehicle_id_number }}</td>
                <td>{{ $data->incident_type }}</td>
                {{-- <td>{{ $data->vehicle->registration_number }}</td> --}}
                {{-- <td>{{ timefy($data->time_of_incident) }}</td> --}}
                <td>{{ $data->location }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>