@extends('layouts.dashboard')

@section('content')
<form action="{{ route('incidents.update', $incident->id) }}" method="POST">
    @csrf @method('PUT')
    @include('dashboard.incident.create-edit-form')
</form>
@endsection
