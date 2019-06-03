@extends('layouts.app')

@section('content')

<div class="row justify-content-center {{ $incidents ? 'position-exactly-center' : 'position-in-between-top-center' }}">
    <div class="col-12 col-md-10 col-lg-8">
        <form class="card card-sm" action="{{ request()->url() }}" method="GET" autocomplete="off">
            <div class="card-body row no-gutters align-items-center">
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" name="vin" type="search" value="{{ request()->vin }}" placeholder="Search Vehicle Identification Number" required>
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" type="submit">Search</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
    
    @includeWhen($incidents, 'app.partials.incident-table', ['data' => $incidents])

    @if(isset(request()->vin) && empty($incidents))
        <div class="container pt-5">
            <div class="col-md-12">
                <div class="alert alert-info alert-border no-border margin-bottom-40 margin-top-neg40 text-center">
                    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button> 
                    <strong><i class="fa fa-info-circle"></i> Notice! </strong> There are no such data in our records.
                </div>
            </div>
        </div>
    @endif
        <!--end of col-->
</div>
@endsection