@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Booking id</th>
            <th scope="col">Appointment id</th>
            <th scope="col">Department name</th>
            <th scope="col">Appointment date</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="table bg-dark text-white h5">
        @foreach($bookings as $booking)
    <tr>
            <th scope="row">{{$booking->id}}</th>
            <td>{{$booking->appointment_id}}</td>
            <td>{{$booking->department_name}}</td>
            <td>{{$booking->appointment_date}}</td>
    </tr>
        @endforeach
    </tbody>
</div>

@endsection