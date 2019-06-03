@extends('layouts.dashboard')

@section('content')
<form action="{{ route('incidents.store') }}" method="POST">
    @csrf
    @include('dashboard.incident.create-edit-form')
</form>
@endsection
