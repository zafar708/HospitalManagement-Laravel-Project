<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
class HomeController extends Controller
{
	public function index(){
		if (Auth::id()){
			return redirect('home');
		}
		else{
			$doctor=Doctor::all();
			return view('user.home',compact('doctor'));
		}
	}
    public function redirect(){
    	if(Auth::id()){
    		if(Auth::user()->usertype=='0'){
    			$doctor=Doctor::all();
				return view('user.home',compact('doctor'));
    		}
    		else{
    			return view('admin.home');
    		}
    	}
    	else{
    		return redirect()->back();
    	}
    }
    public function appointment(Request $request){
    	
    	$appointment=Appointment::create([

    		'name' => $request->name,
    		'email' => $request->email,
    		'date' => $request->date,
    		'doctor' => $request->doctor,
    		'number' => $request->number,
    		'message' => $request->message,
    		'status' => 'Pending',
    		
    		'user_id' => Auth::user()->id,
    		

    	]);
    	if($appointment){
    		return redirect()->back()->with('message','Sendind Appointment Successfully We Contact You Soon');
    	}
        else{
            return redirect()->back();
        }
    }

    public function myappointments($id){

    	if(Auth::id()){
    		$appointments=User::find($id);

    		$appointments=$appointments->appointments;
    		return view('user.my_appointments',compact('appointments'));

    	}
    	else{
    		return redirect()->back();
    	}
    }

    public function cancel_appointment($id){
    	if(Auth::id()){
    		$appointment=Appointment::find($id);
    		$appointment->delete();
    		return redirect()->back()->with('message','Appointment Cancel Successfully');
    	}
    	else{
    		return redirect()->back();
    	}

    }



}
