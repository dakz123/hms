<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 
// Route::get('/about', function () {
//     $data=['message'=>'hello this is a message','amount'=>2500,'friuts'=>['apple','orange','banana','grapes']];
//     return view('about',$data);
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
//Route::get("/posts","PostsController@index");
//Route::get('/posts', [PostsController::class, 'index']);
Route::get('/add_doctor_view', [AdminController::class, 'addView']);
Route::get('/calender', [AdminController::class, 'calenderView']);
Route::get('/', [HomesController::class, 'index']);
Route::get('/home', [HomesController::class, 'redirect']);
Route::post('/appointment', [AppointmentController::class, 'store']);
Route::post('/doctor', [DoctorController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
