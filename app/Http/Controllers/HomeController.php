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
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function redirect()
    {
        $userType = Auth::user()->usertype;
        $ban_status = Auth::user()->banned_status;
        if ($userType == 0 && $ban_status == 0) {
            $user = Auth::user();

            if ($user->usertype == 1) { // Admin
                $appointments = appointment::with('user')->get();
            } else {
                $appointments = appointment::where('user_id', $user->id)->with('user')->get();
            }
            $countappointments = appointment::where('user_id', $user->id)->with('user')->count();
            // get the current user's card (if any)
            $card = health_card::where('user_id', Auth::id())->first();

            if ($user->usertype === '1') {
                // Admin can see all cards
                $cards = health_card::with('user')->get();
            } else {
                // Normal user sees only their card
                $cards = health_card::where('user_id', $user->id)->get();
            }

            $card = $cards->first();

            return view('user.dashboard', compact('appointments', 'countappointments', 'card', 'user'));
        } elseif ($userType == 1 && $ban_status == 0) {
            $users = User::count();
            $countappointment = appointment::count();
            $pendingappointment = appointment::where('status', '0')->count();
            $approvedappointment = appointment::where('status', '1')->count();
            $cancelappointment = appointment::where('status', '2')->count();
            $healthcard = health_card::count();
            $pendingcard = health_card::where('status', '0')->count();
            $approvedcard = health_card::where('status', '1')->count();
            $alldoctor = doctor::count();
            $contactinfo = contact_info::count();
            $years = years_of_experience::first();
            $award = award::first();
            $served = patient_served::first();
            $department = departments::first();

            return view('admin.dashboard', compact('users', 'countappointment', 'pendingappointment', 'approvedappointment', 'cancelappointment', 'healthcard', 'pendingcard', 'approvedcard', 'alldoctor', 'contactinfo', 'years', 'award', 'served', 'department'));
        } else {
            return view('auth.login');
        }
    }
}
