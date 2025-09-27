<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor;
use App\Models\health_card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // View all patients
    public function patients()
    {
        $currentUser = Auth::user();
        $users = User::where('id', '!=', $currentUser->id)->get();

        return view('admin.patients', compact('users'));
    }

    // Ban User
    public function ban($id)
    {
        $user = User::find($id);
        $user->banned_status = '1';
        $user->save();
        Alert::html(
            '<h3 style="color:black;">Patient Banned Successfully!</h3>',
            '<p style="color:black;">You have successfully banned this patient from accessing his or her dashboard.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Unban User
    public function unban($id)
    {
        $user = User::find($id);
        $user->banned_status = '0';
        $user->save();
        Alert::html(
            '<h3 style="color:black;">Patient Unbanned Successfully!</h3>',
            '<p style="color:black;">You have successfully unbanned this patient from accessing his or her dashboard.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Delete Patient
    public function delete_patient($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::html(
            '<h3 style="color:black;">Patient Deleted Successfully!</h3>',
            '<p style="color:black;">You have successfully deleted this patient from the system.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Manage Appointments
    public function manage_appointments()
    {
        $appointments = appointment::with('user')->get();

        return view('admin.appointments', compact('appointments'));
    }

    // Delete Appointment
    public function delete_appointment($id)
    {
        $appointment = appointment::find($id);
        $appointment->delete();
        Alert::html(
            '<h3 style="color:black;">Appointment Deleted Successfully!</h3>',
            '<p style="color:black;">You have successfully deleted this appointment from the system.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Approve Appointment
    public function approve_appointment($id)
    {
        $appointment = appointment::find($id);
        $appointment->status = '1';
        $appointment->save();
        Alert::html(
            '<h3 style="color:black;">Appointment Approved Successfully!</h3>',
            '<p style="color:black;">You have successfully approved this appointment.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Cancel Appointment
    public function cancel_appointment($id)
    {
        $appointment = appointment::find($id);
        $appointment->status = '2';
        $appointment->save();
        Alert::html(
            '<h3 style="color:black;">Appointment Cancelled Successfully!</h3>',
            '<p style="color:black;">You have successfully cancelled this appointment.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // View Health Cards
    public function health_cards()
    {
        $cards = health_card::with('user')->get();

        return view('admin.health_cards', compact('cards'));
    }

    // Delete Health Card
    public function delete_card($id)
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

    // Approve Card
    public function approve_card($id)
    {
        $card = health_card::find($id);
        $card->status = '1';
        $card->save();
        Alert::html(
            '<h3 style="color:black;">Health Card Approved Successfully!</h3>',
            '<p style="color:black;">You have successfully approved this health card.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Add Doctor View
    public function add_doctor()
    {
        return view('admin.add_doctors');
    }

    // Create Doctor
    public function create_doctor(Request $request)
    {
        $doctor = new doctor;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->position = $request->position;
        $doctor->university = $request->university;
        $doctor->years_of_experience = $request->years_of_experience;
        $doctor->description = $request->description;

        // Check if file is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/doctors'), $filename); // Save in public/uploads/patients
            $doctor->image = $filename; // Save filename in DB
        }
        $doctor->save();
        Alert::html(
            '<h3 style="color:black;">Doctor Added Successfully!</h3>',
            '<p style="color:black;">You have successfully added a new doctor to the system.</p>',
            'success'
        )->persistent();
        return redirect()->route('manage_doctors');
    }

    // Manage Doctors
    public function manage_doctors(){
        $doctors = doctor::all();
        return view('admin.manage_doctors', compact('doctors'));
    }

}
