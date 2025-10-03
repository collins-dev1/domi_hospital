@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
<div>
        <h1 class="text-dark fw-bold mb-2">Settings</h1>
        <h5 class="text-dark">Account Settings</h5>
    </div>
    @auth
        <div>
            <form action="{{route('update_profile', auth()->user()->id)}}" method="POST">
                @csrf
                <div class="mt-4">
                    <label for="">Update Name(If Neccessary)</label>
                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Update Email Address(If Neccessary)</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                        class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Update Phone Number(If Neccessary)</label>
                    <input type="tel" name="phone" id="phone" value="{{ auth()->user()->phone }}"
                        class="form-control">
                </div>
                <div class="myself-button mt-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            <div class="mt-4">
                <a href="{{route('change_password')}}">
                    <button class="btn btn-danger">Change and Update Password</button>
                </a>
            </div>
        </div>
    @endauth
@endsection
