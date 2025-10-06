<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\award;
use App\Models\contact_info;
use App\Models\departments;
use App\Models\doctor;
use App\Models\health_card;
use App\Models\patient_served;
use App\Models\User;
use App\Models\years_of_experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

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

        if ($request->hasFile('image')) {
    $file = $request->file('image');

    // Generate a unique filename
    $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

    // Store the image in storage/app/public/doctors
    $path = $file->storeAs('doctors', $filename, 'public');

    // Optionally delete the old image if it exists
    if ($doctor->image && Storage::disk('public')->exists('doctors/' . $doctor->image)) {
        Storage::disk('public')->delete('doctors/' . $doctor->image);
    }

    // Save the filename in the database
    $doctor->image = $filename;
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
    public function manage_doctors()
    {
        $doctors = doctor::all();

        return view('admin.manage_doctors', compact('doctors'));
    }

    // Edit Doctors
    public function edit_doctors($id)
    {
        $doctor = doctor::find($id);

        return view('admin.edit_doctors', compact('doctor'));
    }

    // Update Doctors
    public function update_doctor(Request $request, $id)
    {
        $doctor = doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->position = $request->position;
        $doctor->university = $request->university;
        $doctor->years_of_experience = $request->years_of_experience;
        $doctor->description = $request->description;

       if ($request->hasFile('image')) {
    $file = $request->file('image');

    // Generate a unique filename
    $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

    // Store the image in storage/app/public/doctors
    $path = $file->storeAs('doctors', $filename, 'public');

    // Optionally delete the old image if it exists
    if ($doctor->image && Storage::disk('public')->exists('doctors/' . $doctor->image)) {
        Storage::disk('public')->delete('doctors/' . $doctor->image);
    }

    // Save the filename in the database
    $doctor->image = $filename;
}

$doctor->save();
        Alert::html(
            '<h3 style="color:black;">Doctor Edited Successfully!</h3>',
            '<p style="color:black;">You have successfully edited a new doctor to the system.</p>',
            'success'
        )->persistent();

        return redirect()->route('manage_doctors');
    }

    // Delete Doctor
    public function delete_doctor($id)
    {
        $doctor = doctor::find($id);
        $doctor->delete();
        Alert::html(
            '<h3 style="color:black;">Doctor Deleted Successfully!</h3>',
            '<p style="color:black;">You have successfully deleted a new doctor to the system.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Contact Information
    public function contact_information()
    {
        $infos = contact_info::all();

        return view('admin.contactus_info', compact('infos'));
    }

    // create information
    public function create_info(Request $request)
    {
        $info = new contact_info;
        $info->first_name = $request->first_name;
        $info->last_name = $request->last_name;
        $info->email = $request->email;
        $info->phone_no = $request->phone_no;
        $info->subject = $request->subject;
        $info->department = $request->department;
        $info->message = $request->message;
        $info->level = $request->level;
        $info->save();
        Alert::html(
            '<h3 style="color:black;">Information Sent Successfully!!!</h3>',
            '<p style="color:black;">You have successfully sent your information to the adminstrator wait for their response.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Delete information
    public function delete_info($id)
    {
        $info = contact_info::find($id);
        $info->delete();
        Alert::html(
            '<h3 style="color:black;">Information Deleted Successfully!!!</h3>',
            '<p style="color:black;">You have successfully deleted this information.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Hospital Years of Experience
    public function years()
    {
        $years = years_of_experience::first();

        return view('admin.years_of_experience', compact('years'));
    }

    public function create_years(Request $request)
    {
        $years = years_of_experience::firstOrNew();
        $years->years = $request->years;
        $years->save();
        Alert::html(
            '<h3 style="color:black;">Years of Experience Updated Successfully!!!</h3>',
            '<p style="color:black;">You have successfully Updated your Hospital Years of Expereince.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function delete_years($id)
    {
        $years = years_of_experience::find($id);
        $years->delete();
        Alert::html(
            '<h3 style="color:black;">Years of Experience Deleted Successfully!!!</h3>',
            '<p style="color:black;">You have successfully Deleted your Hospital Years of Expereince.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Hospital Award
    public function award()
    {
        $award = award::first();

        return view('admin.award', compact('award'));
    }

    public function create_award(Request $request)
    {
        $award = award::firstOrNew();
        $award->award = $request->award;
        $award->save();
        Alert::html(
            '<h3 style="color:black;">Award Updated Successfully!!!</h3>',
            '<p style="color:black;">You have successfully Updated your Hospital Award.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function delete_award($id)
    {
        $award = award::find($id);
        $award->delete();
        Alert::html(
            '<h3 style="color:black;">Award Deleted Successfully!!!</h3>',
            '<p style="color:black;">You have successfully Deleted your Hospital Award.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // Department
    public function department()
    {
        $department = departments::first();

        return view('admin.department', compact('department'));
    }

    public function create_department(Request $request)
    {
        $department = departments::firstOrNew();
        $department->department = $request->department;
        $department->save();
        Alert::html(
            '<h3 style="color:black;">Specialized Departments Updated Successfully!!!</h3>',
            '<p style="color:black;">You have successfully Updated your Specialized Departments.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function delete_department($id)
    {
        $department = departments::find($id);
        $department->delete();
        Alert::html(
            '<h3 style="color:black;">Department Deleted Successfully!!!</h3>',
            '<p style="color:black;">You have successfully Deleted your Hospital department.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    // served
    public function served()
    {
        $served = patient_served::first();

        return view('admin.served', compact('served'));
    }

    public function create_served(Request $request)
    {
        $served = patient_served::firstOrNew();
        $served->served = $request->served;
        $served->save();
        Alert::html(
            '<h3 style="color:black;">Patients Served Updated Successfully!!!</h3>',
            '<p style="color:black;">You have successfully Updated your Patients Served.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function delete_served($id)
    {
        $served = patient_served::find($id);
        $served->delete();
        Alert::html(
            '<h3 style="color:black;">Patients Served Deleted Successfully!!!</h3>',
            '<p style="color:black;">You have successfully Deleted your Hospital Patients Served.</p>',
            'success'
        )->persistent();

        return redirect()->back();
    }

    public function admin_profile()
    {
        $profile = Auth::user();

        return view('admin.profile', compact('profile'));
    }

    public function update_pic(Request $request, $id)
    {
        $profile = User::findOrFail($id);

        if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Generate a unique filename
        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

        // Store the file in storage/app/public/profile_pics
        $path = $image->storeAs('profile_pics', $filename, 'public');

        // Optionally delete old image if it exists
        if ($profile->profile_pic && Storage::disk('public')->exists('profile_pics/' . $profile->profile_pic)) {
            Storage::disk('public')->delete('profile_pics/' . $profile->profile_pic);
        }

        // Save the filename in DB (not full path)
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

    public function delete_pics(){
        $profile = Auth::user();

    if ($profile->profile_pic) {
        // Delete from the public disk (storage/app/public/profile_pics)
        if (Storage::disk('public')->exists('profile_pics/' . $profile->profile_pic)) {
            Storage::disk('public')->delete('profile_pics/' . $profile->profile_pic);
        }

        // Remove the reference in the database
        $profile->profile_pic = null;
        $profile->save();
    }

    Alert::html(
        '<h3 style="color:black;">Profile Picture Deleted Successfully!!!</h3>',
        '<p style="color:black;">You have successfully deleted your profile picture.</p>',
        'success'
    )->persistent();

    return redirect()->back();
    }

    public function edit_profile(){
        return view('admin.edit_profile');
    }

    public function update_profile(Request $request, $id){
        $profile = User::find($id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->save();
        Alert::html(
            '<h3 style="color:black;">Profile Updated Successfully!!!</h3>',
            '<p style="color:black;">You have successfully updated your profile.</p>',
            'success'
        )->persistent();

        return redirect()->route('admin_profile');
    }

    public function change_password(){
        return view('admin.update_password');
    }

    // Update the password
    public function update_password(Request $request)
    {
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

        return redirect()->route('admin_profile');
    }
}
