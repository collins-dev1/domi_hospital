@extends('layouts.user_layout')

@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <h2>Edit User Profile</h2>
        @auth
            <form method="POST" action="{{ route('update_user_profile', auth()->user()->id) }}">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" id="phone" value="{{ auth()->user()->phone }}">
                </div>

                <div class="form-group">
                    <label for="">Date of Birth</label>
                    <input type="date" name="dob" value="{{ auth()->user()->dob }}">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-save">Save Changes</button>

                </div>
            </form>
        @endauth
        <div style="display: flex; flex-direction:row; justify-content:start; align-items:flex-start;" class="mt-3">
            <a href="{{route('user_password')}}">
                        <button class="btn btn-cancel">Change Password</button>
                    </a>
        </div>
    </div>
    <style>
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #4caf50;
            outline: none;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn-save {
            background: #4caf50;
            color: white;
        }

        .btn-save:hover {
            background: #43a047;
        }

        .btn-cancel {
            background: #f44336;
            color: white;
        }

        .btn-cancel:hover {
            background: #e53935;
        }
    </style>
@endsection
