<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
use App\Incident;
use Illuminate\Http\Request;

class IncidentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['role_or_permission:super admin'])->only('delete');
    }

    public function index()
    {
        $viewData = $this->viewData([
            'pageTitle' => 'Vehicle Incidents', 'pageHeading' => 'Vehicle Incidents',
            'incidents' => Incident::orderBy('id', 'desc')->paginate(10)
        ]);
        return view('dashboard.incident.index', $viewData);
    }

    /**
     * Show the form to create a new incident.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('dashboard.incident.create', $this->viewData(['pageTitleAndHeading' => 'Add Vehicle Incident']));
    }

    /**
     * Store incident record in the databse
     * @param $request is \Illuminate\Http\Request
     * @param $vehicle is a typehint \App\Vehicle::class
     * @param $driver is a typehint of \App\Driver::class
     * @param $incident is a typehint of \App\Driver::class
     */
    public function store(Request $request, Vehicle $vehicle, Driver $driver, Incident $incident)
    {
        $request->validate($incident->storeIncidentValidationRules());

        $vehicle = $this->preparedVehicleInput($vehicle, $request);

        $driver = $this->preparedDriverInput($driver, $request);

        $incident = $this->preparedIncidentInput($vehicle, $driver, $incident, $request);

        return redirect()->back()->with('success', 'New incident recorded successfully');
    }


    /**
     * Prepare data from form pertaining to vehicle
     * @return array of model column names associated with form request input.
     * @param $vehicle is an instance of \App\Vehicle::class
     * @param $request is \Illuminate\Http\Request
     */
    protected function preparedVehicleInput($vehicle, $request)
    {
        return $vehicle->firstOrCreate([
            'vehicle_id_number' => $request->vin,
            'registration_number' => $request->vrn,
            'make' => $request->make,
            'model' => $request->model
        ]);
    }


    /**
     * Prepare data from form pertaining to driver
     * @return array of model column names associated with form request input.
     * @param $driver is an instance of \App\Driver::class
     * @param $request is \Illuminate\Http\Request
     */
    protected function preparedDriverInput($driver, $request)
    {
        return $driver->firstOrCreate([
            'licence_id_number' => $request->licence_id_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'residential_address' => $request->residential_address
        ]);
    }


    /**
     * Prepare data from form pertaining to incident
     * @return array of model column names associated with form request input.
     * @param $vehicle is an instance of \App\Vehicle::class
     * @param $driver is an instance of \App\Driver::class
     * @param $incident is an instance of \App\Incident::class
     * @param $request is \Illuminate\Http\Request
     */
    protected function preparedIncidentInput($vehicle, $driver, $incident, $request)
    {
        return $incident->firstOrCreate([
            'vehicle_id' => $vehicle->id,
            'driver_id' => $driver->id,
            'incident_type' => $request->incident_type,
            'date_of_incident' => $request->incident_date,
            'time_of_incident' => $request->incident_time,
            'location' => $request->incident_location,
            'passengers' => $request->passengers,
            'casualties' => $request->casualties,
            'properties_damaged' => $request->properties_damaged,
            'comment' => $request->comment
        ]);
    }


    /**
     * show records 
     */
    public function show(Incident $incident)
    {
        $viewData = $this->viewData([
            'pageTitle' => "Incident # $incident->id",
            'pageHeading' => "Incident # $incident->id ($incident->incident_type)",
            'incident' => $incident
        ]);

        return view('dashboard.incident.show', $viewData);
    }


    /**
     * show records 
     */
    public function edit(Incident $incident)
    {
        $viewData = $this->viewData([
            'pageTitleAndHeading' => 'Edit - ' . $incident->incident_type,
            'incident' => $incident
        ]);

        return view('dashboard.incident.edit', $viewData);
    }


    /**
     * update incident record
     */
    public function update(Request $request, Vehicle $vehicle, Driver $driver, Incident $incident)
    {
        $request->validate($incident->storeIncidentValidationRules());

        $incident->vehicle->update([
            'vehicle_id_number' => $request->vin,
            'registration_number' => $request->vrn,
            'make' => $request->make,
            'model' => $request->model
        ]);

        $incident->driver->update([
            'licence_id_number' => $request->licence_id_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'residential_address' => $request->residential_address
        ]);

        $incident->update([
            'vehicle_id' => $incident->vehicle->id,
            'driver_id' => $incident->driver->id,
            'incident_type' => $request->incident_type,
            'date_of_incident' => $request->incident_date,
            'time_of_incident' => $request->incident_time,
            'location' => $request->incident_location,
            'passengers' => $request->passengers,
            'casualties' => $request->casualties,
            'properties_damaged' => $request->properties_damaged,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Record has been updated successfully');
    }


    /**
     * Delete an incident record
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->back()->with('success', 'Incident successfully deleted !');
    }
}
