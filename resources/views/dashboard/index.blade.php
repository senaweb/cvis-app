@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">        
                <div class="card-body">
                    <h4 class="card-title">Incidents Report</h4>
                    <p class="card-description">Representation of incidents in: daily, weekly, monthly and yearly.</p>
                    <line-chart 
                        :monthly-incidents="{{ json_encode($monthlyIncidentsData) }}" 

                        :yearly-incidents="{{ json_encode($yearlyIncidentsData['totalRetrieved']) }}"
                        :years-of-yearly-incidents={{ json_encode($yearlyIncidentsData['years']) }}

                        :today-incidents="{{ json_encode($todayIncidents) }}"

                        :weekly-incidents="{{ json_encode($weeklyIncidentsData['totalRetrieved']) }}"
                        :labels-of-weekly-incidents="{{ json_encode($weeklyIncidentsData['days']) }}">
                    </line-chart>
                </div>
            </div>
        </div>
    </div>
@endsection
