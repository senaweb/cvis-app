<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasRoles;

    protected $guarded = [];

    protected $guard_name = 'web';

    protected $dates = ['date_of_incident', 'created_at'];

    // protected $times = ['time_of_incident'];

    protected $with = ['vehicle', 'driver'];

    /**
     * Get the vehicle that was involved in the incident
     * @return \Illuminate\Database\Eloquent
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }


    /**
     * Get the driver who was driving the vehicle at that time
     * @return \Illuminate\Database\Eloquent
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    /**
     * Validation rules for creating a record
     * @return array
     */
    public function storeIncidentValidationRules(): array
    {
        return [
            'vin' => 'required|min:4',
            'vrn' => 'required|min:3',
            'model' => 'required',
            'make' => 'required',

            'incident_type' => 'required',
            'incident_date' => 'required|date',
            'incident_time' => 'required|date_format:H:i',
            'passengers' => 'required|numeric',
            'casualties' => 'required',
            'properties_damaged' => 'required',
            'licence_id_number' => 'required',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'gender' => 'required',
            'dob' => 'required|date',
            'phone' => 'required|min:4',
            'address' => 'requried',
            'comment' => 'sometimes|nullable'
        ];
    }
}
