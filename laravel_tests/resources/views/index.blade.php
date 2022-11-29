@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">
  <div class="row mt-5 ms-5">
  @foreach($departments as $department)
     <div class="col-lg-3 col-md-4 col-sm-12 mb-3 text-center mx-5">
        <div class="card" style="width: 18rem;">
         <img src="{{$department->image}}" style="width:200px; margin:0 auto" />
         <div class="card-body">
            <div class="card-title">{{$department->name}}</div>
            <div class="card-text">{{$department->description}}</div>
            <form method="post" action="{{route('showAppointments')}}" class="mt-2">
               <input type="text" value="{{$department->id}}" style="display: none;"/>
               <input type="submit" value="show appointments" class="btn btn-primary "/>
            </form>
         </div>
        </div>
     </div>
     @endforeach
  </div>
</div>

@endsection