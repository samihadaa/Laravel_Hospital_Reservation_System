<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Booking;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function getData(Request $request){
        return view('index');
    }
    public function getAllDepartments(Request $request){
        $depatments = Department::all();
        return view('index',['departments'=>$depatments]);
    }
    public function showAppointments(Request $request){
        $department_id = $request->input('department_id');
         $appointments = Appointment::all();
        return view('appointments',['appointments'=>$appointments]);
    }
    public function bookAppointment(Request $request){
        $appointment_id = $request->input('appointment_id');
        $department_name = $request->input('department_name');
        $appointment_date = $request->input('appointment_date');
        $exists = Booking::where('appointment_id','=',$appointment_id)->exists();

        if($exists){
            //tell the user that it has been booked by somebody else
            Session::flash('message','Appointment was already booked');
            Session::flash('alert-class','alert-danger');
            return redirect('/');
        }
        else {
            //book this appointment
            $booking = new Booking;
            $booking->appointment_id = $appointment_id;
            $booking->department_name = $department_name;
            $booking->appointment_date = $appointment_date;
            $booking->username = Auth::user()->name;
            $booking->user_id = Auth::user()->id;
            $booking->save();

            //Change appointment status to 1 -> taken
            Appointment::where('id',$appointment_id)->update(['taken'=>1]);
            //Tell the user that the appointment was booked successfully.
            Session::flash('message','appointment booked successfully');
            Session::flash('alert-class','alert-success');
            return redirect('/');

        }
    }
    public function myBookings(Request $request){
        $bookings = Booking::where('user_id',Auth::user()->id)->get();
        return view('myBookings',['bookings'=>$bookings]);
    }
}
