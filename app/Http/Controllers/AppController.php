<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display home page
     */
    public function index(Request $request, Vehicle $vehicle)
    {
        $viewData = $this->viewData([
            'pageTitleAndHeading' => 'Home Search',
            'request' => $request,
            'incidents' => $this->getSearchResultsBy($request, $vehicle)
        ]);

        return view('app.home', $viewData);
    }


    /**
     * Get search results. ie: incident with driver
     * @return \Illuminate\Database\Eloquent\Collection/null;
     */
    public function getSearchResultsBy($request, $vehicle)
    {
        if (!empty($vin = $request->input('vin'))) {
            // Do the search
            $data = $vehicle::where('vehicle_id_number', $vin)->first();
            return $data ? $data->incidents : null;
        }
    }
}
