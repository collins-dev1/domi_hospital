@extends('layouts.admin_layout')

@section('content')
    @include('sweetalert::alert')
    <div>
        <h1>All Appointments</h1>
        <p>Manage all the appointments booked by the Patient</p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $rowNumber = 1 @endphp
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $rowNumber++ }}</td>
                            <td>{{ $appointment->user->name }}</td>
                            <td>{{ $appointment->user->email }}</td>
                            <td>{{ $appointment->user->phone }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->doctor_name }}</td>
                            <td>{{ $appointment->message }}</td>
                            <td>
                                @if ($appointment->status == '1')
                                    <span class="badge badge-success">Approved</span>
                                @elseif ($appointment->status == '2')
                                    <span class="badge badge-danger">Cancelled</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td style="display: flex; gap: 10px;">
                                @if ($appointment->status == '0')
                                    <a href="{{ route('cancel_appointment', $appointment->id) }}"
                                        onclick="return confirm('Are you sure you want to Cancel this Appointment???')">
                                        <button class="btn btn-danger" style="border-radius: 10px;">Cancel</button>
                                    </a>

                                    <a href="{{ route('approve_appointment', $appointment->id) }}"
                                        onclick="return confirm('Are you sure you want to Approve this Appointment???')">
                                        <button class="btn btn-success" style="border-radius: 10px;">Approve</button>
                                    </a>
                                    <a href="{{ route('delete_appointment', $appointment->id) }}"
                                        onclick="return confirm('Are you sure you want to Delete this Appointment???')">
                                        <button class="btn btn-danger" style="border-radius: 10px;">Delete</button>
                                    </a>
                                @elseif ($appointment->status == '1')
                                   <a href="{{ route('cancel_appointment', $appointment->id) }}"
                                        onclick="return confirm('Are you sure you want to Cancel this Appointment???')">
                                        <button class="btn btn-danger" style="border-radius: 10px;">Cancel</button>
                                    </a>
                                    <a href="{{ route('delete_appointment', $appointment->id) }}"
                                        onclick="return confirm('Are you sure you want to Delete this Appointment???')">
                                        <button class="btn btn-danger" style="border-radius: 10px;">Delete</button>
                                    </a>
                                @elseif ($appointment->status == '2')
                                    <a href="{{ route('approve_appointment', $appointment->id) }}"
                                        onclick="return confirm('Are you sure you want to Approve this Appointment???')">
                                        <button class="btn btn-success" style="border-radius: 10px;">Approve</button>
                                    </a>
                                    <a href="{{ route('delete_appointment', $appointment->id) }}"
                                        onclick="return confirm('Are you sure you want to Delete this Appointment???')">
                                        <button class="btn btn-danger" style="border-radius: 10px;">Delete</button>
                                    </a>
                                    @else
                                    <a href="{{ route('delete_appointment', $appointment->id) }}"
                                        onclick="return confirm('Are you sure you want to Delete this Appointment???')">
                                        <button class="btn btn-danger" style="border-radius: 10px;">Delete</button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
