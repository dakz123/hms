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
        // $doctors = Doctor::join('appointments', 'doctors.id', '=', 'appointments.doctor_id')
        // ->where('specialisation','dental')
        // ->get(['doctors.*', 'appointments.date']); 
        // foreach($doctors as $doctor) {
        //     $events[]=['name'=>$doctor->doctor_name,'date'=>$doctor->date,];
        // }
        $speclisations=Doctor::all();
       
       
        
        return view('admin.calender', compact('speclisations'));
    }
    public function show(Request $request){
        $type=$request->input('dep');
        $doctors = Doctor::join('appointments', 'doctors.id', '=', 'appointments.doctor_id')
        ->where('doctors.specialisation',$type)
        ->get(['doctors.*', 'appointments.date']); 
       
        if ($doctors->isEmpty()){
       
        return response()->json([
            'events'=>null, 
        ]); 
    }
    else{
        foreach($doctors as $doctor) {
            $events[]=['name'=>$doctor->doctor_name,'date'=>$doctor->date,];
        } 
        return response()->json([
            'events'=>$events,
        ]);
        
    }
    }

}
