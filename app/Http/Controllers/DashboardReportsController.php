<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;

class DashboardReportsController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    /**
     * Report Generation Page
     */
    public function index()
    {
        return view(
            'dashboard.reports.index',
            $this->viewData([
                'pageTitleAndHeading' => 'Reports'
            ])
        );
    }


    public function reportsGenerate(Request $request)
    {
        if (!empty($generatorType = $request->input('generateBy'))) {
            $viewData = $this->{"generate" . ucfirst($generatorType) . "Report"}();
        }

        return view('dashboard.reports.index', $viewData);
    }


    protected function generateYearlyReport()
    {
        $yearlyIncidents = Incident::whereYear('created_at', date('Y'));

        return $this->viewData([
            'pageTitle' => $yearlyIncidents->get()->count() . ' Incidents',
            'pageHeading' => 'Incidents for the year - ' . date('Y'),
            // 'description' => "Incidents for the this year",
            'incidentsCount' => $yearlyIncidents->get()->count(),
            'incidents' => $yearlyIncidents->paginate(10)
        ]);
    }


    protected function generateMonthlyReport()
    {
        $montlyIncidents = Incident::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);

        return $this->viewData([
            'pageTitle' => $montlyIncidents->get()->count() . ' Incidents',
            'pageHeading' => 'Incidents for the month - ' . date('m'),
            'incidentsCount' => $montlyIncidents->get()->count(),
            'incidents' => $montlyIncidents->paginate(10)
        ]);
    }


    protected function generateWeeklyReport()
    {
        $weeklyIncidents = Incident::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);

        return $this->viewData([
            'pageTitle' => $weeklyIncidents->get()->count() . ' Incidents',
            'pageHeading' => 'Incidents for the week',
            'incidentsCount' => $weeklyIncidents->get()->count(),
            'incidents' => $weeklyIncidents->paginate(10)
        ]);
    }


    protected function generateTodayReport()
    {
        $todayIncidents = Incident::whereDate('created_at', \Carbon\Carbon::today());

        return $this->viewData([
            'pageTitle' => $todayIncidents->get()->count() . ' Incidents',
            'pageHeading' => 'Incidents for today',
            'incidentsCount' => $todayIncidents->get()->count(),
            'incidents' => $todayIncidents->paginate(10)
        ]);
    }

    protected function generateCustomDate(Request $request)
    {
        $incidentsByCustomDate = Incident::whereBetween('created_at', [$request->from_date, $request->to_date]);
        $viewData = $this->viewData([
            'pageTitle' => $incidentsByCustomDate->get()->count() . ' Incidents',
            'pageHeading' => 'Incidents for the week',
            'incidentsCount' => $incidentsByCustomDate->get()->count(),
            'incidents' => $incidentsByCustomDate->simplePaginate(10)->appends(request()->all())
        ]);
        return view('dashboard.reports.index', $viewData);
    }
}
