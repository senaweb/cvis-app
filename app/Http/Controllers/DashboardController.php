<?php

namespace App\Http\Controllers;

use DB;
use App\Vehicle;
use App\Driver;
use App\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Query\Builder;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }


    /**
     * Display home page
     */
    public function index()
    {
        $viewData = $this->viewData([
            'pageTitleAndHeading' => 'Dashboard',
            'monthlyIncidentsData' => $this->filterYearDataThroughMonths(),
            'yearlyIncidentsData' => $this->separateTotalCountFromLabels($this->tenYearsIncidents(), 'year'),
            'todayIncidents' => $this->todayIncidents(),
            'weeklyIncidentsData' => $this->separateTotalCountFromLabels($this->getCurrentMonthData(), 'day', $formatDateToDayOnly = true)
            // 'weeklyIncidentsData' => $this->getCurrentMonthData()
        ]);

        return view('dashboard.index', $viewData);
    }




    /**
     * Incidents that was created today
     */
    protected function todayIncidents()
    {
        return Incident::whereDate('created_at', today())->count();
    }

    /**
     * Get Weekly Data
     * @return Illuminate\Support\Collection
     */
    protected function getCurrentMonthData()
    {
        return DB::table('incidents')
            ->select(
                DB::raw('count(id) as `totalRetrieved`'),
                DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') day")
                // DB::raw("TIMESTAMP(created_at) date")
            )->where('created_at', '>', now()->startOfWeek())
            ->where('created_at', '<', now()->endOfWeek())
            ->groupBy('day')->get();
    }

    /**
     * Get the latest 10 years data
     * @return Illuminate\Support\Collection
     */
    protected function tenYearsIncidents(): Collection
    {
        return DB::table('incidents')
            ->select(
                DB::raw('count(id) as `totalRetrieved`'),
                // DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
                DB::raw('YEAR(created_at) year')
            )->whereBetween('created_at', [now()->subYear(10), now()])
            ->groupBy('year')->get();
    }

    /**
     * Separate total count of data from its pertaining year. 
     * @Eg { totalRetrieved: 10, year: 2011 }, { totalRetrieved: 13, year: 2012 }
     * @return array of separated data.
     */
    protected function separateTotalCountFromLabels($itemsToSeparate, $dayMonthOrYear, $formatDateToDayOnly = false): array
    {
        $totalRetrieved = [];
        $labels = [];
        foreach ($itemsToSeparate as $incidentData) {
            $totalRetrieved[] = $incidentData->totalRetrieved;

            if (!$formatDateToDayOnly) {
                $labels[] = $incidentData->$dayMonthOrYear;
            } else {
                $labels[] = \DateTime::createFromFormat("Y-m-d", $incidentData->$dayMonthOrYear)->format("D");
            }
        }
        return ['totalRetrieved' => $totalRetrieved, $dayMonthOrYear . 's' => $labels];
    }


    /**
     * Filter through months to get number of incidents
     * @return array
     */
    protected function filterYearDataThroughMonths()
    {
        $results = \DB::table('incidents')
            ->whereYear('created_at', date('Y'))

            ->selectRaw("COUNT(*) total, DATE_FORMAT(created_at, '%m') month")
            ->orderBy('month', 'desc')
            ->groupBy('month')
            ->take(365)
            ->get();

        return array_map(function ($month) use ($results) {
            return array_flatten(collect($results)->where('month', $month))[0]->total ?? 0;
        }, range(1, 12));
    }


    /**
     * Search by vehicle incident number or drivers license
     */
    public function search(Request $request)
    {
        $viewData = $this->viewData([
            'pageTitleAndHeading' => 'Seach Results',
            'searchResults' => $this->getIncident($request),
        ]);
        return view('dashboard.incident.search', $viewData);
    }


    /***
     * Perform the actual serach
     * @param $request \Illuminate\Http\Request
     * @param $column the column to search
     */
    protected function getIncident(Request $request)
    {
        switch ($request->input('searchable_type')) {
            case "vehicle_id_number";
                $foundVehicle = Vehicle::where($request->searchable_type, $request->keyword)->first();
                if ($foundVehicle)
                    return $foundVehicle->incidents;
                break;

            case "registration_number";
                $foundVehicle = Vehicle::where($request->searchable_type, $request->keyword)->first();
                if ($foundVehicle)
                    return $foundVehicle->incidents;
                break;

            case 'id':
                Incident::where($request->searchable_type, $request->keyword)->get();
                break;

            case 'licence_id_number':
                if ($driver = Driver::where($request->searchable_type, $request->keyword)->first())
                    if ($driver)
                        return $driver->incidents;
                break;
        }
    }
}
