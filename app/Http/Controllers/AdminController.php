<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // View all patients
    public function patients(){
        $currentUser = Auth::user();
        $users = User::where('id', '!=', $currentUser->id)->get();
        return view('admin.patients', compact('users'));
    }

    // Ban User
    public function ban($id){
        $user = User::find($id);
        $user->banned_status = "1";
        $user->save();
        Alert::html(
            '<h3 style="color:black;">Patient Banned Successfully!</h3>',
            '<p style="color:black;">You have successfully banned this patient from accessing his or her dashboard.</p>',
            'success'
        )->persistent();
        return redirect()->back();
    }

    // Unban User
    public function unban($id){
        $user = User::find($id);
        $user->banned_status = "0";
        $user->save();
        Alert::html(
            '<h3 style="color:black;">Patient Unbanned Successfully!</h3>',
            '<p style="color:black;">You have successfully unbanned this patient from accessing his or her dashboard.</p>',
            'success'
        )->persistent();
        return redirect()->back();
    }

    // Delete Patient
    public function delete_patient($id){
        $user = User::find($id);
        $user->delete();
        Alert::html(
            '<h3 style="color:black;">Patient Deleted Successfully!</h3>',
            '<p style="color:black;">You have successfully deleted this patient from the system.</p>',
            'success'
        )->persistent();
        return redirect()->back();
}
}
