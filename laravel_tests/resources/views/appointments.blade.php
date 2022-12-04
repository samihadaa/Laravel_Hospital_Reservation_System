@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Department name</th>
            <th scope="col">Department Date</th>
            <th scope="col">Taken</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="table bg-dark text-white h5">
        @foreach($appointments as $appointment)
    <tr>
            <th scope="row">{{$appointment->id}}</th>
            <td>{{$appointment->department_name}}</td>
            <td>{{$appointment->appointment_date}}</td>
            @if($appointment->taken)
            <td> You can't book this</td>
            @else
              <td> 
                <form method="post" action="{{route('bookAppointment')}}">
                    @csrf
                    <input type="text" value="{{$appointment->id}}" name="appointment_id" style="display: none;"/>
                    <input type="text" value="{{$appointment->department_name}}" name="department_name" style="display: none;"/>
                    <input type="text" value="{{$appointment->appointment_date}}" name="appointment_date" style="display: none;"/>
                    <input type="submit" value="book" class="btn btn-primary"/>
                </form>
              </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</div>

@endsection