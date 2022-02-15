<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date=$request->input('date');
        $department=$request->input('departement');
        $count=Appointment::where('date', $date)->get();
        $count2=Appointment::where('specialisation', $department)->get();
        $a=sizeof($count);
        $b=sizeof($count2);
        if(  $b<2){
        $data= new Appointment;
        
        $doctor_id=Doctor::where('specialisation', $department)->first()->id;
 $data->full_name=$request->input('full_name');
 $data->date=$request->input('date');
 $data->phone_number=$request->input('phone_number');
 $data->message=$request->input('message');
 $data->doctor_id=$doctor_id;
 $data->specialisation=$request->input('departement');
 $data->save();
      return response()->json([
    'status'=>200,
    'message'=>'Appoinment Added Successfully',
]);
        }
        else{
            
        }
        return response()->json([
                'status'=>204,
                'message'=>'Appoinment Not Taken Today!!',
            ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
