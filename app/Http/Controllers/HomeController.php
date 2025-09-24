<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function redirect(){
        $userType = Auth::user()->usertype;
         $ban_status = Auth::user()->banned_status;
        if($userType == 0 && $ban_status == 0){
            return view('user.dashboard');
        }
        elseif($userType == 1 && $ban_status == 0){
            return view('admin.dashboard');
        }
        else{
            return view('auth.login');
        }
    }
}
