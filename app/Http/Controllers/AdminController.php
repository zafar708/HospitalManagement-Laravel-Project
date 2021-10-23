<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Notification;

class AdminController extends Controller
{
    public function addview(){

    	return view('admin.add_doctor');
    }
    public function upload(Request $request){
    	
    	$image=$request->file;
    	$imagename=time().'.'.$image->getClientOriginalExtension();
    	$request->file->move('doctorimage',$imagename);

    	$created=Doctor::create([

    		'name'=>$request->name,
    		'phone'=>$request->number,
    		'speciality'=>$request->speciality,
    		'room'=>$request->room,
    		'image'=>$imagename,

    	]);
    	if ($created) {
    		return redirect()->back()->with('message','Doctor Added Successfully');
    	}
    }


    public function showappointments(){

       $appointments=Appointment::all();
        //$appointments=Appointment::orderBy('name','asc')->paginate(2);
        

        return view('admin.showappointments',compact('appointments'));
    }

    public function approve_appointment($id){

        $approve=Appointment::find($id);
        $approve->status='Approved';
        $approve->save();
        return redirect()->back()->with('message','Appointment Status Approved Successfully');
    }

     public function statuscancel_appointment($id){

        $approve=Appointment::find($id);
        $approve->status='Canceled';
        $approve->save();
        return redirect()->back()->with('message','Appointment Status Canceled Successfully');
    }

    public function showdoctors(){

        $doctors=Doctor::all();
        return view('admin.showdoctors',compact('doctors'));
    }

    public function delete_doctor($id){

        $doctor=Doctor::find($id);
        $doctor->delete();

        return redirect()->back()->with('message','Doctor Record Deleted Successfully');
    }
    public function update_doctor($id){

        $doctor=Doctor::find($id);
        return view('admin.updatedoctor',compact('doctor'));
    }

    public function update_doctor_data(Request $request, $id){

        $update_doctor=Doctor::find($id);
        $update_doctor->name=$request->name;
        $update_doctor->phone=$request->number;
        $update_doctor->speciality=$request->speciality;
        $update_doctor->room=$request->room;
        if($request->hasFile('file')){
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $image->move('doctorimage',$imagename);


        $update_doctor->image=$imagename;
    }   
        $update_doctor->save();

        return redirect('showdoctors')->with('message','Doctor Record Updated Successfully');


    }


    public function email_view($id){

        $appoint_id=Appointment::find($id);

        return view('admin.email_view', compact('appoint_id'));
    }

    public function send_mail(Request $request,$id){

        $appoint_id=Appointment::find($id);

        $details=[

            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart

        ];

        Notification::send($appoint_id, new SendEmailNotification($details));

            return redirect('showappointments')->with('message','Email Notification Send Successfully');

    }


}