@extends('layouts.admin_layout')

@section('content')
    <div>
        <h1>Admin Dashboard</h1>
    </div>
    <div class="container">
        <a href="{{ route('patients') }}">
            <div class="box">
                <h3>All Registered Patients</h3>
                <h1>{{ $users }}</h1>
            </div>
        </a>
        <a href="{{ route('manage_appointments') }}">
            <div class="box">
                <h3>All Appointments</h3>
                <h1>{{ $countappointment }}</h1>
            </div>
        </a>
        <a href="{{ route('manage_appointments') }}">
            <div class="box">
                <h3>All Pending Appointments</h3>
                <h1>{{ $pendingappointment }}</h1>
            </div>
        </a>
        <a href="{{ route('manage_appointments') }}">
            <div class="box">
                <h3>All Approved Appointments</h3>
                <h1>{{ $approvedappointment }}</h1>
            </div>
        </a>
        <a href="{{ route('manage_appointments') }}">
            <div class="box">
                <h3>All Cancelled Appointments</h3>
                <h1>{{ $cancelappointment }}</h1>
            </div>
        </a>

        <a href="{{ route('health_cards') }}">
            <div class="box">
                <h3>All Health Cards</h3>
                <h1>{{ $healthcard }}</h1>
            </div>
        </a>
        <a href="{{ route('health_cards') }}">
            <div class="box">
                <h3>All Pending Health Cards</h3>
                <h1>{{ $pendingcard }}</h1>
            </div>
        </a>
        <a href="{{ route('health_cards') }}">
            <div class="box">
                <h3>All Approved Health Cards</h3>
                <h1>{{ $approvedcard }}</h1>
            </div>
        </a>
        <a href="{{ route('manage_doctors') }}">
            <div class="box">
                <h3>All Doctors</h3>
                <h1>{{ $alldoctor }}</h1>
            </div>
        </a>
        <a href="{{ route('contact_information') }}">
            <div class="box">
                <h3>All Contact Informations</h3>
                <h1>{{ $contactinfo }}</h1>
            </div>
        </a>
        <a href="{{ route('served') }}">
            <div class="box">
                <h3>Hospital Patients Served</h3>
                <h1>{{ $served->served }}</h1>
            </div>
        </a>
         <a href="{{ route('years') }}">
            <div class="box">
                <h3>Hospital Years of Experience</h3>
                <h1>{{ $years->years }}</h1>
            </div>
        </a>
         <a href="{{ route('award') }}">
            <div class="box">
                <h3>Hospital Award</h3>
                <h1>{{ $award->award }}</h1>
            </div>
        </a>
         <a href="{{ route('department') }}">
            <div class="box">
                <h3>Hospital Specialized Departments</h3>
                <h1>{{ $department->department }}</h1>
            </div>
        </a>

    </div>
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .container .box {
            padding: 20px;
            background-color: #0b0844;
            border-radius: 20px;
            text-align: center;
        }

        .container .box h1,
        h3 {
            color: #fff;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
@endsection
