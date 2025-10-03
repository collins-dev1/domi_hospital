@extends('layouts.user_layout')

@section('content')
    <div id="overview" class="content-panel active">
        <div class="page-header">
            @auth
                <h1 class="page-title">Welcome Back, {{ auth()->user()->name }}!</h1>
            @endauth
            <p class="page-subtitle">Here's your health summary and recent activities</p>
        </div>

        <!-- Quick Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">{{ $countappointments }}</div>
                <div class="stat-label">My Appointments</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{$all_doctors}}</div>
                <div class="stat-label">Active Doctors</div>
            </div>
            {{-- <div class="stat-card">
                <div class="stat-value">1</div>
                <div class="stat-label">Pending Lab Results</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">$245</div>
                <div class="stat-label">Outstanding Balance</div>
            </div> --}}
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
                <a href="{{ route('appointments') }}">
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i> Book Now
                    </button>
                </a>
            </div>

            @if (!$card || $card->status == 0)
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="card-icon" style="background: var(--warning-color);">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="card-title">
                            <h3>Get Health Card</h3>
                            <p>digital health card for easy access to medical care.</p>
                        </div>
                    </div>
                    <a href="{{ route('health_card') }}">
                        <button class="btn btn-accent">
                            <i class="fas fa-heartbeat"></i> Get Health Card
                        </button>
                    </a>
                </div>
            @elseif ($card->status == 1)
                <div class="dashboard-card">
                    {{-- Approved card --}}
                    <div class="content-section">
                        <div class="health-card">
                            <div class="card-header"
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                                <div>
                                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                        <img src="{{ asset('hospital_website/img/domilogo.png') }}" alt=""
                                            width="50" height="50">
                                        <div>
                                            <h3 style="margin: 0; font-size: 1.3rem;">Domi Clinic</h3>
                                            <p style="font-size:0.5rem">....Bringing health to your doorsteps</p>
                                        </div>
                                    </div>
                                    <p style="margin: 0; opacity: 0.8;">Digital Health Card</p>
                                </div>
                                <div>
                                    <i class="fas fa-heartbeat" style="font-size: 3rem;"></i>
                                </div>
                            </div>
                            <div class="card-info-grid">
                                <div>
                                    <div class="info-item">
                                        <div class="info-label">Patient ID</div>
                                        <div class="info-value">MED00 {{ Auth::user()->id }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Full Name</div>
                                        <div class="info-value">{{ Auth::user()->name }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Email Address</div>
                                        <div class="info-value">{{ Auth::user()->email }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Date of Birth</div>
                                        <div class="info-value">{{ Auth::user()->dob }}</div>
                                    </div>

                                </div>
                                <div>
                                    <div class="info-item">
                                        <div class="info-label">Blood Group</div>
                                        <div class="info-value">{{ $user->health_card->blood_group ?? 'Null' }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Geneotype</div>
                                        <div class="info-value">{{ $user->health_card->genotype ?? 'Null' }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Phone Number</div>
                                        <div class="info-value">{{ Auth()->user()->phone }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Registration Date</div>
                                        <div class="info-value">{{ $user->health_card->created_at ?? 'Null' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="text-align: center; margin-top: 2rem;">
                            <button class="btn btn-primary" onclick="printHealthCard()" style="margin-right: 1rem;">
                                <i class="fas fa-print"></i> Print Card
                            </button>
                            <button class="btn btn-accent" onclick="downloadHealthCard()">
                                <i class="fas fa-download"></i> Download PDF
                            </button>
                            <button class="btn btn-outline" onclick="shareHealthCard()">
                                <i class="fas fa-share"></i> Share
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Recent Activities -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Appointment History</h2>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Doctor</th>
                        <th>Message</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->doctor_name }}</td>
                            <td>{{ $appointment->message }}</td>
                            <td>
                                @if ($appointment->status == '1')
                                    <span class="status-badge status-confirmed">Approved</span>
                                @elseif ($appointment->status == '2')
                                    <span class="status-badge status-pending">Cancelled</span>
                                @else
                                    <span class="status-badge status-completed">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
