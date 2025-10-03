@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
<div class="mt-2">
    <h2 class="text-2xl mb-6 text-center">Change Password</h2>

    <form action="{{ route('update_password') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="current_password" class="block font-semibold">Current Password</label>
            <input type="password" name="current_password" class="form-control w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="new_password" class="block font-semibold">New Password</label>
            <input type="password" name="new_password" class="form-control w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="new_password_confirmation" class="block font-semibold">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="btn btn-success">Update Password</button>
    </form>
</div>
@endsection
