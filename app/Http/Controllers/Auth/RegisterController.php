<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Determine where to redirect users after registration.
     */
    protected function redirectTo()
    {
        if (Auth::user()->usertype == 1) {
            Alert::success('Welcome Admin', 'Login successful. Redirecting to your dashboard.');
            return '/admin/dashboard';
        }

        Alert::success('Registration Successful', 'Welcome to DomiClinic!');
        return '/dashboard';
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'marital_status' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'martial_status' => $data['marital_status'], // kept as you requested ✅
            'password' => Hash::make($data['password']),
        ]);
    }
}
