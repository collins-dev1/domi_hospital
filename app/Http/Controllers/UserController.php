<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\health_card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function appointments()
    {
        $appointments = appointment::with('user')->get();

        return view('user.appointment', compact('appointments'));
    }

    public function add_appointment(Request $request)
    {
        $appointement = new appointment;
        $appointement->user_id = Auth::id();
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

    public function health_card()
    {
        $user = Auth::user()->load('health_card');

        // If you also want ALL cards (admin style)
        $cards = health_card::with('user')->get();

        // get the current user's card (if any)
    $card = health_card::where('user_id', Auth::id())->first();

        return view('user.health_card', compact('cards', 'user', 'card'));
    }

    public function create_health_card(Request $request)
    {
        $card = new health_card;
        $card->user_id = Auth::id();
        $card->blood_group = $request->blood_group;
        $card->genotype = $request->genotype;
        $card->allergies = $request->allergies;
        $card->existing_conditions = $request->existing_conditions;
        $card->past_medications = $request->past_medications;
        $card->save();
        Alert::html(
            '<h3 style="color:black;">Health Card created Successfully!</h3>',
            '<p style="color:black;">You have successfully created your health card make your payment for your card to be Approved!!!.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function delete_appointment($id){
        $appointement = appointment::find($id);
        $appointement->delete();
        Alert::html(
            '<h3 style="color:black;">Appointment Deleted Successfully!</h3>',
            '<p style="color:black;">You have successfully deleted this appointment from the system.</p>',
            'success'
        )->persistent();
        return redirect()->back();
    }

    public function edit_appointment($id){
        $appointement = appointment::find($id);
        return view('user.edit_appointment', compact('appointement'));
    }

    public function update_appointment(Request $request, $id){
        $appointement = appointment::find($id);
        $appointement->appointment_date = $request->appointment_date;
        $appointement->appointment_time = $request->appointment_time;
        $appointement->doctor_name = $request->doctor_name;
        $appointement->message = $request->message;
        $appointement->save();
        Alert::html(
            '<h3 style="color:black;">Appointment Updated Successfully!</h3>',
            '<p style="color:black;">You have successfully updated this appointment wait for the hospital or doctor to Confirm your appointment!!!.</p>',
            'success'
        )->persistent();

        return redirect()->route('dashboards');
    }

    public function edit_card($id){
        $card = health_card::find($id);
        return view('user.edit_card', compact('card'));
    }

    public function update_card(Request $request, $id){
        $card = health_card::find($id);
        $card->blood_group = $request->blood_group;
        $card->genotype = $request->genotype;
        $card->allergies = $request->allergies;
        $card->existing_conditions = $request->existing_conditions;
        $card->past_medications = $request->past_medications;
        $card->save();
        Alert::html(
            '<h3 style="color:black;">Health Card Updated Successfully!</h3>',
            '<p style="color:black;">You have successfully updated your health card make your payment for your card to be Approved!!!.</p>',
            'success'
        )->persistent();

        return redirect()->route('dashboards');
    }

    public function delete_cards($id){
        $card = health_card::find($id);
        $card->delete();
        Alert::html(
            '<h3 style="color:black;">Health Card Deleted Successfully!</h3>',
            '<p style="color:black;">You have successfully deleted this health card from the system.</p>',
            'success'
        )->persistent();
        return redirect()->back();
    }
}
