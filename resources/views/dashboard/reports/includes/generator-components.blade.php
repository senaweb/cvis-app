<div class="row">
        <div class="col-12">
            {{-- Generate by today --}}
            <form class="d-inline" action="{{ route('dashboard.reports.generate') }}" method="GET">
                <input type="hidden" name="generateBy" value="today">
                <button type="submit" class="btn btn-primary text-white">Today's Report</button>
            </form>

            {{-- Generate by Weekly --}}
            <form class="d-inline" action="{{ route('dashboard.reports.generate') }}" method="GET">
                <input type="hidden" name="generateBy" value="weekly">
                <button type="submit" class="btn btn-info text-white">This Week's Report</button>
            </form>

            {{-- Generate by monthly --}}
            <form class="d-inline" action="{{ route('dashboard.reports.generate') }}" method="GET">
                <input type="hidden" name="generateBy" value="monthly">
                <button type="submit" class="btn btn-secondary text-white">This Month's Report</button>
            </form>

            {{-- Generate by yearly --}}
            <form class="d-inline" action="{{ route('dashboard.reports.generate') }}" method="GET">
                <input type="hidden" name="generateBy" value="yearly">
                <button type="submit" class="btn btn-warning text-dark">This year's Report</button>
            </form>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-12">
            <h6 class="card-title">Specify Date</h6>
            <form class="form-inline" action="{{ route('dashboard.reports.generate-custom') }}" method="GET">
                <div class="form-group mb-2">
                    <label for="fromDate">From: </label>
                    <input type="date" class="form-control" name="from_date" value="{{ request()->from_date }}" id="fromDate">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="toDate">To: </label>
                    <input type="date" class="form-control" name="to_date" value="{{ request()->to_date }}" id="toDate">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Go</button>
            </form>
        </div>
    </div>