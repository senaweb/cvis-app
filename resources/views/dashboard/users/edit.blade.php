@extends('layouts.dashboard')

@section('content')

<form method="POST" action="{{ route('users.update', $user->id) }}" autocomplete="false">
    @csrf @method("PUT")
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">        
                <div class="card-body">
                <h4 class="card-title">Edit: {{ $user->fullName }}</h4>
                    <p class="card-description">Add a user and assign roles and permissions</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="row pb-3">
                                    <div class="col-6">
                                        <label for="first_name">{{ __('Firstname') }}</label>
                                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name', $user->first_name) }}" required autofocus>

                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="col-6">
                                        <label for="last_name">{{ __('Lastname') }}</label>
                                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name', $user->last_name) }}" required >

                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="organization_id">{{ __('Organization Id') }}</label>
                                                <input id="organization_id" type="text" class="form-control{{ $errors->has('organization_id') ? ' is-invalid' : '' }}" name="organization_id" value="{{ old('organization_id', $user->organization_id) }}" required>
                                    
                                                @if ($errors->has('organization_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('organization_id') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="organizationId">{{ __('Organization Unit') }}</label>
                                                {{-- <input id="organization_unit" type="text" class="form-control{{ $errors->has('organization_unit') ? ' is-invalid' : '' }}" name="organization_unit" value="{{ old('organization_unit') }}" required> --}}

                                                <select class="form-control{{ $errors->has('organization_unit') ? ' is-invalid' : '' }}" name="organization_unit" id="organizationId" required>
                                                    <option value="">-- Select Option --</option>
                                                    <option value="Police Officer" {{ old('organization_unit', isset($user->organization_unit) && $user->organization_unit == 'Police Officer')  ? 'selected': '' }}>Police Officer</option>
                                                    <option value="Insurance Company" {{ old('organization_unit', isset($user->organization_unit) && $user->organization_unit == 'Insurance Company')  ? 'selected': '' }}>Insurance Company</option>
                                                    <option value="Health Center" {{ old('organization_unit', isset($user->organization_unit) && $user->organization_unit == 'Health Center')  ? 'selected': '' }}>Health Center</option>
                                                    <option value="Administrator" {{ old('organization_unit', isset($user->organization_unit) && $user->organization_unit == 'Administrator')  ? 'selected': '' }}>Administrator</option>

                                                </select>

                                                @if ($errors->has('organization_unit'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('organization_unit') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required autocomplete="false">

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="phone">{{ __('Phone Number') }}</label> 
                                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $user->phone) }}" required>

                                                @if ($errors->has('phone'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password">{{ __('Password') }}</label>

                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
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
                    <h4 class="card-title">Assign Permissions</h4>
                    {{-- <p class="card-description">Add a user and assign roles and permissions</p> --}}
                        <div class="row">
                            <div class="col-12">
                            <input type="hidden" name="role_id" id="" value="{{ $user->role_id }}">
                                @foreach(\App\Permission::all() as $permission)
                                    <div class="form-check form-check-inline permission-checkboxes">
                                
                                        <input class="form-check-input" type="checkbox" name="permissions[]" id="superAdmin" 
                                        @foreach($user->permissions as $userPermission) 
                                        {{-- {{ old('permissions', $permission->id == $userPermission->id ) ? 'checked="checked"' : '' }}  --}}
                                        {{ (is_array(old('permissions')) && in_array($permission->id, old('permissions'))) ? 'checked="checked"' : '' || $permission->id == $userPermission->id ? 'checked="checked"' : '' }} 
                                        @endforeach
                                        value="{{ $permission->id }}">
                                        <label class="form-check-label" for="superAdmin">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="pt-5">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="mdi mdi-content-save"> {{ __('Update') }} </i>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
