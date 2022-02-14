<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Doctor;
use App\Http\Models\User;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
if(Auth::user()->usertype==1){
    return view('admin.home');
}
else{
    abort(404,'Page not found'); 
}
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index(){
        $speclisations=Doctor::all();
       
        return view('user.home',compact('speclisations'));
        
    }
}
