@extends('layouts.user_layout')

@section('content')
    @auth
        <div class="profile-container">
            <div class="profile-header">

                 @if (auth()->user()->profile_pic != null)
                        <div>
                            <img
                                src="{{ asset('uploads/profile_pics/' .auth()->user()->profile_pic) }}" alt="">
                        </div>
                    @else
                        <i class="fas fa-user"></i>
                    @endif
            </div>
            <div class="d-flex flex-row gap-3 mt-5 justify-content-center align-items-center" title="Update Profile Picture">

                <button type="button" class="btn" style="background-color: transparent" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <i class="ri-image-edit-fill fs-4 text-dark"></i>
                </button>

                <form action="{{ route('delete_user_pics') }}" method="POST"
                    onclick="return confirm('Are you sure want to delete your Profile Picture')">
                    @csrf
                    <button type="submit" class="btn" style="background-color: transparent">
                        <i class="ri-delete-bin-5-fill fs-4 text-dark" title="Delete Profile Picture"></i>

                    </button>
                </form>
            </div>

            <div class="profile-body">
                <h2>{{ auth()->user()->name }}</h2>
                <p class="role">Domi Clinic</p>

                <div class="info-card">
                    <h3>Personal Information</h3>
                    <p><strong>Phone:</strong> {{ auth()->user()->phone }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Gender:</strong> {{ auth()->user()->gender }}</p>
                    <p><strong>Martial Status:</strong> {{ auth()->user()->martial_status }}</p>
                    <p><strong>Date of Birth:</strong> {{ auth()->user()->dob }}</p>
                </div>

                <div class="info-card">
                    <h3>Professional Details</h3>
                    @if ($card)
                        <p><strong>Blood Group:</strong> {{ $card->blood_group }}</p>
                        <p><strong>GenoType:</strong> {{ $card->genotype }}</p>
                    @endif
                    <p><strong>License No.:</strong> MED00{{ auth()->user()->id }}</p>
                </div>

                <div class="profile-actions">
                    <a href="{{ route('edit_user_profile') }}">
                        <button class="btn-primary">Edit Profile</button>
                    </a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <button class="btn-secondary">Log Out</button>

                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Update your Profile Picture</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{route('update_user_pics', auth()->user()->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endauth

    <style>
        .profile-container {
            background: #fff;
            border-radius: var(--border-radius);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            width: 100%;
            overflow: hidden;
        }

        .profile-header {
            background: #06923E;
            height: 140px;
            position: relative;
        }

        .profile-header i {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 4px solid #fff;
            position: absolute;
            bottom: -55px;
            left: 50%;
            transform: translateX(-50%);
            object-fit: cover;
            background: #eee;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
        }

        .profile-header img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 4px solid #fff;
            position: absolute;
            bottom: -55px;
            left: 50%;
            transform: translateX(-50%);
            object-fit: cover;
            background: #eee;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .profile-body {
            padding: 15px 25px 25px;
            text-align: center;
        }

        .profile-body h2 {
            margin: 0;
            font-size: 1.6rem;
            color: var(--text-color);
        }

        .profile-body p.role {
            color: var(--light-text);
            margin: 6px 0 20px;
            font-size: 0.95rem;
        }

        .info-card {
            background: #06923E;
            border-radius: 20px;
            padding: 15px 20px;
            margin-bottom: 15px;
            text-align: left;
        }

        .info-card h3 {
            margin: 0 0 8px;
            font-size: 1rem;
            color: #fff;
        }

        .info-card p {
            margin: 3px 0;
            color: #fff;
            font-size: 0.9rem;
        }

        .profile-actions {
            text-align: center;
            margin-top: 15px;
        }

        .profile-actions button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .btn-primary {
            background: var(--primary-color);
            color: #fff;
        }

        .btn-primary:hover {
            background: #06923E;
        }

        .btn-secondary {
            background: #f1f1f1;
            color: var(--text-color);
        }

        .btn-secondary:hover {
            background: #ddd;
        }
    </style>
@endsection
