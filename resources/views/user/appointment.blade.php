@extends('layouts.user_layout')

@section('content')
@include('sweetalert::alert')
    <div id="overview" class="content-panel active">
        <div class="page-header">
            <h1 class="page-title">My Appointments</h1>
            <p class="page-subtitle">Manage your scheduled appointments</p>
        </div>

        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Appointment History</h2>
                <button class="btn btn-primary" onclick="openModal('appointmentModal')">
                    <i class="fas fa-plus"></i> Book New
                </button>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Doctor</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->appointment_date}}</td>
                        <td>{{$appointment->appointment_time}}</td>
                        <td>{{$appointment->doctor_name}}</td>
                        <td>{{$appointment->message}}</td>
                            <td>
                                @if ($appointment->status == '1')
                                    <span class="status-badge status-confirmed">Approved</span>
                                @elseif ($appointment->status == '2')
                                    <span class="status-badge status-pending">Cancelled</span>
                                @else
                                    <span class="status-badge status-completed">Pending</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('delete_appointments', $appointment->id)}}" onclick="return confirm('Are you sure you want to Delete this Appointment???')">
                                    <button class="btn" style="background-color: rgb(193, 25, 25); color:#fff">Delete</button>
                                </a>
                                <a href="{{route('edit_appointment', $appointment->id)}}" onclick="return confirm('Are you sure you want to Edit this Appointment???')">
                                    <button class="btn" style="background-color: rgb(16, 85, 16); color:#fff;">Edit</button>
                                </a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Appointment Modal -->
    <div class="modal" id="appointmentModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Book Appointment</h3>
                <button class="close" onclick="closeModal('appointmentModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="appointmentForm" action="{{ route('add_appointment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="department">Doctor *</label>
                        <select id="department" name="doctor_name" required>
                            <option>-- Select Doctor --</option>
                            @foreach ($doctors as $doctor)
                            <option>{{$doctor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="appointmentDate">Preferred Date *</label>
                            <input type="date" id="appointmentDate" name="appointment_date" required>
                        </div>
                        <div class="form-group">
                            <label for="appointmentTime">Preferred Time *</label>
                            <select id="appointmentTime" name="appointment_time" required>
                                <option value="">Select Time</option>
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                                <option value="17:00">05:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason for Visit</label>
                        <textarea id="reason" name="message" rows="5"
                            placeholder="Brief description of your symptoms or reason for visit"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary text-center" style="width: 100%;">
                            <span class="btn-text text-center">Book Appointment</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Modal Functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }
    </script>
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
        }

        .modal-content {
            background: var(--white);
            margin: 5% auto;
            padding: 0;
            border-radius: 15px;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: var(--primary-color);
            color: var(--white);
            padding: 1.5rem;
            border-radius: 15px 15px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
        }

        .close {
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
    </style>
@endsection
