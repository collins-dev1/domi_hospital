<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function appointments(){
        return view('user.appointment');
    }

    public function add_appointment(Request $request){
        $appointement = new appointment();
        $appointement->patient_name = $request->patient_name;
        $appointement->patient_number = $request->patient_number;
        $appointement->patient_email = $request->patient_email;
        $appointement->appointment_date = $request->appointment_date;
        $appointement->appointment_time = $request->appointment_time;
        $appointement->doctor_name = $request->doctor_name;
        $appointement->message = $request->message;
        $appointement->save();
        Alert::html(
            '<h3 style="color:black;">Appointment created Successfully!</h3>',
            '<p style="color:black;">You have successfully created this appointment wait for the hospital or doctor to Confirm your appointment!!!.</p>',
            'success'
        )->persistent();
        return redirect()->back();
    }
}
