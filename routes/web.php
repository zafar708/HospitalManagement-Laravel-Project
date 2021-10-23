<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');




Route::group(['middleware'=>['CheckUser']], function(){

Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myappointments/{id}',[HomeController::class,'myappointments']);

Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel_appointment']);

});


Route::group(['middleware'=>['ChekRole']], function(){
	
Route::get('/add_doctor_view',[AdminController::class,'addview']);

Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::get('/showappointments',[AdminController::class,'showappointments']);

Route::get('/approve_appointment/{id}',[AdminController::class,'approve_appointment']);


Route::get('/showdoctors',[AdminController::class,'showdoctors']);

Route::get('/statuscancel_appointment/{id}',[AdminController::class,'statuscancel_appointment']);


Route::get('/delete_doctor/{id}',[AdminController::class,'delete_doctor']);

Route::get('/update_doctor/{id}',[AdminController::class,'update_doctor']);

Route::post('/update_doctor/{id}',[AdminController::class,'update_doctor_data']);

Route::get('/email_view/{id}',[AdminController::class,'email_view']);

Route::post('/send_mail/{id}',[AdminController::class,'send_mail']);

});