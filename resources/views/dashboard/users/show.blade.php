@extends('layouts.dashboard')

@section('content')
    @if(!empty($user))
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">        
                    <div class="card-body">
                        <h4 class="card-title pb-3">User Information</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fullname">Fullname:</label>
                                        <p class="pt-2">{{ $user->fullName }}</p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                        <p class="pt-2">{{ $user->email }}</p>
                                    </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="make">Organization Unit:</label>
                                        <p class="pt-2">{{ $user->organization_unit }}</p>
                                    </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="make">Phone:</label>
                                        <p class="pt-2">{{ $user->phone }}</p>
                                </div>
                            </div>
                        </div>

                        <hr>                        

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="make">Date Created:</label>
                                        <p class="pt-2">{{ $user->created_at }}</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
