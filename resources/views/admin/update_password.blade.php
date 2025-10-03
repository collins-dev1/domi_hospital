@extends('layouts.admin_layout')

@section('content')
<div class="mt-2">
    <h2 class="text-2xl mb-6 text-center">Change Password</h2>

    {{-- @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc ml-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

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
