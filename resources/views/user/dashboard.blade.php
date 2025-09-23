@extends('layouts.user_layout')

@section('content')
    <div id="overview" class="content-panel active">
        <div class="page-header">
            <h1 class="page-title">Welcome Back, obinna!</h1>
            <p class="page-subtitle">Here's your health summary and recent activities</p>
        </div>

        <!-- Quick Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">3</div>
                <div class="stat-label">Upcoming Appointments</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">2</div>
                <div class="stat-label">Active Prescriptions</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">1</div>
                <div class="stat-label">Pending Lab Results</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">$245</div>
                <div class="stat-label">Outstanding Balance</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon" style="background: var(--accent-color);">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <div class="card-title">
                        <h3>Book Appointment</h3>
                        <p>Schedule your next visit</p>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="bookNewAppointment()">
                    <i class="fas fa-plus"></i> Book Now
                </button>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon" style="background: var(--primary-color);">
                        <i class="fas fa-file-medical-alt"></i>
                    </div>
                    <div class="card-title">
                        <h3>View Records</h3>
                        <p>Access your medical history</p>
                    </div>
                </div>
                <button class="btn btn-outline" onclick="showPanel('medical-records')">
                    <i class="fas fa-eye"></i> View Records
                </button>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon" style="background: var(--warning-color);">
                        <i class="fas fa-prescription-bottle-alt"></i>
                    </div>
                    <div class="card-title">
                        <h3>Refill Prescription</h3>
                        <p>Request prescription refills</p>
                    </div>
                </div>
                <button class="btn btn-accent" onclick="requestRefill()">
                    <i class="fas fa-redo"></i> Request Refill
                </button>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Recent Activities</h2>
                <button class="btn btn-outline btn-sm">View All</button>
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
    </div>
@endsection
