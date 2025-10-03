@extends('layouts.user_layout')

@section('content')
@include('sweetalert::alert')
    <div class="container">
        <h2>Change and Update Password</h2>
            <form method="POST" action="{{route('update_user_password')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Current Password</label>
                    <input type="password" name="current_password" required>
                </div>

                <div class="form-group">
                    <label for="email">New Password</label>
                    <input type="password" name="new_password" required>
                </div>

                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-save">Update Password</button>
                </div>
            </form>
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
