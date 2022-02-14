<?php

namespace App\Http\Controllers;


use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addView(){
        return view('admin.add_doctor');
    }
    public function calenderView(){
        //$doctors = Doctor::with('appointments')->get();
        $doctors = Doctor::join('appointments', 'doctors.id', '=', 'appointments.doctor_id')
        ->get(['doctors.*', 'appointments.date']);  
        return view('admin.calender', compact('doctors'));
    }
    public function store(Request $request){
        
    }

}
