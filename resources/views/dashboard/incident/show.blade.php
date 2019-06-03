@extends('layouts.dashboard')

@section('content')
    @if(!empty($incident->vehicle))
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">        
                    <div class="card-body">
                        <h4 class="card-title pb-3">Vehicle Information</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vin">{{ __('VIN') }}:</label>
                                        <p class="pt-2">{{ $incident->vehicle->vehicle_id_number }}</p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vrn">{{ __('Vehicle Registration Number') }}:</label>
                                        <p class="pt-2">{{ $incident->vehicle->registration_number }}</p>
                                    </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="make">{{ __('Make') }}:</label>
                                        <p class="pt-2">{{ $incident->vehicle->make }}</p>
                                    </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="make">{{ __('Model') }}:</label>
                                        <p class="pt-2">{{ $incident->vehicle->model }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Vehicle Information ends while Incident Information Start --}}
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">        
                <div class="card-body">
                    <h4 class="card-title pb-3">Incident Information</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="incidentDate">{{ __('Incident Date') }}:</label>
                                    <p class="pt-2">{{ datefy($incident->incident_date) }}</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="incidentTime">{{ __('Incident Time') }}:</label>                                
                                    <p class="pt-2">{{ timefy($incident->incident_time) }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="incident_type">{{ __('Incident Type') }}:</label>
                                    <p class="pt-2">{{ $incident->incident_type}}</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="incidentLocation">{{ __('Incident Location') }}:</label>
                                    <p class="pt-2">{{ $incident->location }}</p>
                                </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="passengers">{{ __('Passengers') }}:</label>
                                    <p class="pt-2">{{ $incident->passengers }}</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="casualties">{{ __('Casualties') }}:</label>
                                    <p class="pt-2">{{ $incident->casualties }}</p>
                                </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="propertiesDamaged">{{ __('Properties Damaged') }}</label>
                                    <p class="pt-2">{{ $incident->properties_damaged }}</p>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Incident Information ends while Driver information Start --}}

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">        
                <div class="card-body">
                    @if(!empty($incident->driver))
                    <h4 class="card-title pb-3">Driver Information</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="licenceNumber">{{ __("License Number") }}:</label>
                                        <p class="pt-2">{{ $incident->driver->license_id_number }}</p>
                                </div>
                            </div>
                        </div>

                        <hr>
                    
                    {{-- Name: first and last names --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="firstName">{{ __("Firstname") }}:</label>
                                    <p class="pt-2">{{ $incident->driver->first_name }}</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="lastName">{{ __("Lastname") }}:</label>
                                    <p class="pt-2">{{ $incident->driver->last_name }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    {{-- Gender and BOD --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gender">{{ __("Gender") }}:</label>
                                    <p class="pt-2">{{ $incident->driver->gender }}</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="dob">{{ __("Date Of Birth") }}:</label>
                                    <p class="pt-2">{{ $incident->driver->dob }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    {{-- Phone and Residential Address --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">{{ __("Phone") }}:</label>
                                    <p class="pt-2">{{ $incident->driver->phone }}</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="residential_address">{{ __("Address (Residential)") }}:</label>
                                <p class="pt-2">{{ $incident->driver->residential_address }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">        
                <div class="card-body">
                    <h4 class="card-title pb-3">Details (Comment)</h4>
                    <div class="row">
                        <div class="col-6">
                            {{-- Comment --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <p class="pt-2">{{ $incident->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
