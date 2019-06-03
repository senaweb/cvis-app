    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">        
                <div class="card-body">
                    <h4 class="card-title">Vehicle Information</h4>
                    <p class="card-description">Write all the required details of the vehicle</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="vin">{{ __('VIN') }}</label>
                                <input minlength="4" class="form-control{{ $errors->has('vin') ? ' is-invalid' : '' }}" type="text" name="vin" id="vin" 
                                    value="{{ old('vin', isset($incident->vehicle) ? $incident->vehicle->vehicle_id_number : null) }}" 
                                    placeholder="Vehicle Identification Number" required>
                                    
                                    @if ($errors->has('vin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('vin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="vrn">{{ __('Vehicle Registration Number') }}</label>
                                    <input minlength="4" type="text" class="form-control{{ $errors->has('vrn') ? ' is-invalid' : '' }}" id="vrn" name="vrn" 
                                        value="{{ old('vrn', isset($incident->vehicle->registration_number) ? $incident->vehicle->registration_number : null) }}" 
                                        placeholder="Vehicle Registration Number" required>
                                    
                                    @if ($errors->has('vrn'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('vrn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="make">{{ __('Make') }}</label>
                                    <input type="text" class="form-control{{ $errors->has('make') ? ' is-invalid' : '' }}" id="make" name="make" 
                                    value="{{ old('make', isset($incident->vehicle) ? $incident->vehicle->make : null) }}" 
                                    placeholder="Make of vehicle" required>
                                    
                                    @if ($errors->has('make'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('make') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="make">{{ __('Model') }}</label>
                                    <input type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" id="model" name="model" value="{{ old('model', isset($incident->vehicle) ? $incident->vehicle->model : null) }}" placeholder="Model of vehicle" required>
                                    
                                    @if ($errors->has('model'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Vehicle Information ends while Incident Information Start --}}
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">        
                <div class="card-body">
                    <h4 class="card-title">Incident Information</h4>
                    <p class="card-description">Write details of the incident</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="incidentDate">{{ __('Incident Date') }}</label>
                                    <input type="date" class="form-control{{ $errors->has('incident_date') ? ' is-invalid' : '' }}" id="incidentDate" name="incident_date" 
                                    value="{{ old('incident_date', isset($incident->date_of_incident) ? \Carbon\Carbon::createFromDate($incident->year, $incident->month, $incident->day)->format('Y-m-d') : null) }}" placeholder="Incident Date" required>
                                    
                                    @if ($errors->has('incident_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('incident_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="incidentTime">{{ __('Incident Time') }}</label>
                                    <input type="time" class="form-control{{ $errors->has('incident_time') ? ' is-invalid' : '' }}" id="incidentTime" name="incident_time" 
                                    value="{{ old('incident_time', isset($incident->time_of_incident) ? carbornizeTime($incident->time_of_incident) : null) }}" 
                                    placeholder="Incident Time" required>
                                    
                                    @if ($errors->has('incident_time'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('incident_time') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="incident_type">{{ __('Incident Type') }}</label>
                                    <select name="incident_type" class="form-control{{ $errors->has('incident_type') ? ' is-invalid' : '' }}" name="incident_type" id="incident_type" placeholder="Incident Type" required>
                                        <option value="">-- Select Option --</option>
                                        <option value="Accident" {{ old('incident_type', isset($incident->incident_type)) == 'Accident' ? 'selected': '' }}>Accident</option>
                                        <option value="Theft" {{ old('incident_type', isset($incident->incident_type)) == 'Theft' ? 'selected': '' }}>Theft</option>
                                    </select>
                                    
                                    @if ($errors->has('incident_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('incident_type') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="incidentLocation">{{ __('Incident Location') }}</label>
                                    <input type="text" class="form-control{{ $errors->has('incident_location') ? ' is-invalid' : '' }}" id="incidentLocation" name="incident_location" value="{{ old('incident_location', isset($incident->location) ? $incident->location : null) }}" placeholder="Location" required>
                                    
                                    @if ($errors->has('incident_location'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('incident_location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="passengers">{{ __('Passengers') }}</label>
                                    <input type="number" class="form-control{{ $errors->has('passengers') ? ' is-invalid' : '' }}" id="passengers" name="passengers" value="{{ old('passengers', isset($incident->passengers) ? $incident->passengers : null) }}" placeholder="Number of Passengers" required>
                                    
                                    @if ($errors->has('passengers'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('passengers') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label for="casualties">{{ __('Casualties') }}</label>
                                    {{-- <input type="text" class="form-control{{ $errors->has('casualties') ? ' is-invalid' : '' }}" id="casualties" name="casualties" value="{{ old('casualties', isset($incident->casualties)?? $incident->casualties) }}"  placeholder="Enter 0 or 1" required> --}}
                                    <select name="casualties" class="form-control{{ $errors->has('casualties') ? ' is-invalid' : '' }}" name="casualties" id="casualties" required>
                                        <option value="">-- Select Option --</option>
                                        <option value="no" {{ old('casualties', isset($incident->casualties) && $incident->casualties == 'no')  ? 'selected': '' }}>No</option>
                                        <option value="yes" {{ old('casualties', isset($incident->casualties) && $incident->casualties == 'yes') ? 'selected': '' }}>Yes</option>
                                    </select>

                                    @if ($errors->has('casualties'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('casualties') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="propertiesDamaged">{{ __('Properties Damaged') }}</label>
                                    <select name="properties_damaged" class="form-control{{ $errors->has('properties_damaged') ? ' is-invalid' : '' }}" name="properties_damaged" id="propertiesDamaged" required>
                                        <option value="">-- Select Option --</option>
                                        <option value="yes" {{ old('properties_damaged', isset($incident->properties_damaged) && $incident->properties_damaged == 'yes')  ? 'selected': '' }}>True</option>
                                        <option value="no" {{ old('properties_damaged', isset($incident->properties_damaged) && $incident->properties_damaged == 'no')  ? 'selected': '' }}>False</option>
                                    </select>
                                    
                                    @if ($errors->has('properties_damaged'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('properties_damaged') }}</strong>
                                        </span>
                                    @endif
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
                    <h4 class="card-title">Driver Information</h4>
                    <p class="card-description">Write details of the Driver if incident is accident</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="licenceNumber">{{ __("Licence Number") }}</label>
                                    <input type="text" class="form-control{{ $errors->has('licence_id_number') ? ' is-invalid' : '' }}" id="licenceNumber" name="licence_id_number" value="{{ old('licence_id_number', isset($incident->driver) ? $incident->driver->licence_id_number : null) }}" placeholder="Driver's Licence Number">
                                    
                                    @if ($errors->has('licence_id_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('licence_id_number') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>

                    {{-- Name: first and last names --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="firstName">{{ __("Firstname") }}</label>
                                    <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="firstName" name="first_name" value="{{ old('first_name', isset($incident->driver) ? $incident->driver->first_name : null) }}" placeholder="Enter First name">
                                    
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="lastName">{{ __("Lastname") }}</label>
                                    <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="lastName" name="last_name" value="{{ old('last_name', isset($incident->driver) ? $incident->driver->last_name : null) }}" placeholder="Enter Last name">
                                    
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>

                    {{-- Gender and BOD --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gender">{{ __("Gender") }}</label>
                                    <select name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender" placeholder="Enter Gender" required>
                                        <option value="">-- Select Option --</option>
                                        <option value="male" {{ old('gender', isset($incident->driver) && $incident->driver->gender == 'male' ) ? 'selected': '' }}>Male</option>
                                        <option value="female" {{ old('gender', isset($incident->driver) && $incident->driver->gender == 'female' ) ? 'selected': '' }}>Female</option>
                                    </select>
                                    
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="dob">{{ __("Date Of Birth") }}</label>
                                    <input type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" id="dob" name="dob" value="{{ old('dob', isset($incident->driver) ? $incident->driver->dob : null ) }}">
                                    
                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>

                    {{-- Phone and Residential Address --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">{{ __("Phone") }}</label>
                                    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" value="{{ old('phone', isset($incident->driver) ? $incident->driver->phone : null) }}" placeholder="Enter phone number">
                                    
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="residential_address">{{ __("Address (Residential)") }}</label>
                                    <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="residential_address" name="residential_address" value="{{ old('residential_address', isset($incident->driver) ? $incident->driver->residential_address : null) }}" placeholder="Enter residential address">
                                    
                                    @if ($errors->has('residential_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('residential_address') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">        
                <div class="card-body">
                    <h4 class="card-title">Details (Comment)</h4>
                    <div class="row">
                        <div class="col-12">
                            {{-- Comment --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" id="comment" cols="30" rows="10" placeholder="You can write any other comment about the incident...">{{ old('comment', isset($incident->comment) ? $incident->comment :null) }}</textarea>
                                            @if ($errors->has('comment'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('comment') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center pt-5">
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-lg" type="submit"><i class="mdi mdi-send"></i> @if( isset($incident->id))  Update @else Submit @endif </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
