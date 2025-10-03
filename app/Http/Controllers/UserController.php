<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor;
use App\Models\health_card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function appointments()
{
    $user = Auth::user();

    if ($user->usertype == 1) { // Admin
        $appointments = appointment::with('user')->get();
    } else {
        $appointments = appointment::where('user_id', $user->id)->with('user')->get();
    }

    $doctors = doctor::all();

    return view('user.appointment', compact('appointments', 'doctors'));
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
    $user = Auth::user();

    if ($user->usertype === '1') {
        // Admin can see all cards
        $cards = health_card::with('user')->get();
    } else {
        // Normal user sees only their card
        $cards = health_card::where('user_id', $user->id)->get();
    }

    $card = $cards->first();

    return view('user.health_card', compact('user', 'card', 'cards'));
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

        return redirect()->route('payment_option');
    }

    public function payment_option(){
        return view('user.payment_method');
    }

    public function delete_appointments($id)
    {
        $appointement = appointment::find($id);
        $appointement->delete();
        Alert::html(
            '<h3 style="color:black;">Appointment Deleted Successfully!</h3>',
            '<p style="color:black;">You have successfully deleted this appointment from the system.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function edit_appointment($id)
    {
        $appointement = appointment::find($id);

        return view('user.edit_appointment', compact('appointement'));
    }

    public function update_appointment(Request $request, $id)
    {
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

        return redirect()->route('appointments');
    }

    public function edit_card($id)
    {
        $card = health_card::find($id);

        return view('user.edit_card', compact('card'));
    }

    public function update_card(Request $request, $id)
    {
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

        return redirect()->route('health_card');
    }

    public function delete_cards($id)
    {
        $card = health_card::find($id);
        $card->delete();
        Alert::html(
            '<h3 style="color:black;">Health Card Deleted Successfully!</h3>',
            '<p style="color:black;">You have successfully deleted this health card from the system.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function user_profile(){
        $user = Auth::user();

    if ($user->usertype === '1') {
        // Admin can see all cards
        $cards = health_card::with('user')->get();
    } else {
        // Normal user sees only their card
        $cards = health_card::where('user_id', $user->id)->get();
    }

    $card = $cards->first();
        return view('user.profile', compact('user', 'card', 'cards'));
    }

    public function edit_user_profile(){
        return view('user.edit_user');
    }

    public function update_user_profile(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->save();
        Alert::html(
            '<h3 style="color:black;">Profile Updated Successfully!!!</h3>',
            '<p style="color:black;">You have successfully updated your profile.</p>',
            'success'
        )->persistent();
        return redirect()->route('user_profile');
    }

    public function user_password(){
        return view('user.user_password');
    }

    public function update_user_password(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            Alert::html(
            '<h3 style="color:black;">The current password is incorrect</h3>',
            '<p style="color:black;">You have current write an incorrect password!!!.</p>',
            'success'
        )->persistent();

        return redirect()->back();
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Alert::html(
            '<h3 style="color:black;">Password Changed Successfully!!!</h3>',
            '<p style="color:black;">You have successfully updated your password!!!.</p>',
            'success'
        )->persistent();

        return redirect()->route('user_profile');
    }

    public function update_user_pics(Request $request, $id){
        $profile = User::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/profile_pics'), $filename);

            // Use the correct column name
            $profile->profile_pic = $filename;
        }

        $profile->save();

        Alert::html(
            '<h3 style="color:black;">Profile Picture Uploaded Successfully!!!</h3>',
            '<p style="color:black;">You have successfully uploaded your profile picture.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function delete_user_pics(){
        $profile = Auth::user();
        if ($profile->profile_pic) {
            Storage::delete('public/uploads/profile_pics/' . $profile->profile_pic); // Adjust the path as necessary
            $profile->profile_pic = null; // Remove the reference in the database
            $profile->save(); // Save the changes to the database
        }
        Alert::html(
            '<h3 style="color:black;">Profile Picture Deleted Successfully!!!</h3>',
            '<p style="color:black;">You have successfully deleted your profile picture.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }
}
