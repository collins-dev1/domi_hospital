<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\health_card;
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
            return view('admin.dashboard');
        } else {
            return view('auth.login');
        }
    }
}
