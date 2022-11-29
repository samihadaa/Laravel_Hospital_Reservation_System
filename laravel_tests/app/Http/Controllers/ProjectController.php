<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getData(Request $request){
        return view('index');
    }
    public function getAllDepartments(Request $request){
        $depatments = Department::all();
        return view('index',['departments'=>$depatments]);
    }
}
