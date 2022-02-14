<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\User;
use Auth;
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
        return view('user.home');
    }
}
