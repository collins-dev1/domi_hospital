@extends('layouts.user_layout')

@section('content')
    <div id="overview" class="content-panel active">
        <div class="page-header">
            <h1 class="page-title">My Appointments</h1>
            <p class="page-subtitle">Manage your scheduled appointments</p>
        </div>

        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Upcoming Appointments</h2>
                <button class="btn btn-primary">
                    <i class="fas fa-plus"></i> Book New
                </button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                        <th>Doctor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dec 15, 2024</td>
                        <td>Cardiology Consultation</td>
                        <td>Dr. Sarah Johnson</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>Dec 18, 2024</td>
                        <td>Lab Test - Blood Work</td>
                        <td>Lab Department</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>Dec 22, 2024</td>
                        <td>Follow-up Appointment</td>
                        <td>Dr. Sarah Johnson</td>
                        <td><span class="status-badge status-confirmed">Confirmed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Appointment History</h2>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                        <th>Doctor</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dec 15, 2024</td>
                        <td>Cardiology Consultation</td>
                        <td>Dr. Sarah Johnson</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                         <td><span class="status-badge status-completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>Dec 18, 2024</td>
                        <td>Lab Test - Blood Work</td>
                        <td>Lab Department</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                         <td><span class="status-badge status-completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>Dec 22, 2024</td>
                        <td>Follow-up Appointment</td>
                        <td>Dr. Sarah Johnson</td>
                        <td><span class="status-badge status-confirmed">Confirmed</span></td>
                         <td><span class="status-badge status-completed">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
