@extends('layouts.user_layout')

@section('content')
@include('sweetalert::alert')
 <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Appointment</h3>
            </div>
            <div class="modal-body" style="margin-top: 3rem">
                <form id="appointmentForm" action="{{route('update_appointment', $appointement->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="department">Doctor *</label>
                        <select id="department" name="doctor_name" value="{{$appointement->doctor_name}}" required>
                            <option value="">-- Select Department --</option>
                            <option value="general">General Medicine</option>
                            <option value="cardiology">Cardiology</option>
                            <option value="neurology">Neurology</option>
                            <option value="pediatrics">Pediatrics</option>
                            <option value="orthopedics">Orthopedics</option>
                            <option value="dermatology">Dermatology</option>
                            <option value="gynecology">Gynecology</option>
                            <option value="ophthalmology">Ophthalmology</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="appointmentDate">Preferred Date *</label>
                            <input type="date" id="appointmentDate" name="appointment_date" value="{{$appointement->appointment_date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="appointmentTime">Preferred Time *</label>
                            <select id="appointmentTime" name="appointment_time" value="{{$appointement->appointment_time}}" required>
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
                            placeholder="Brief description of your symptoms or reason for visit">{{$appointement->message}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary text-center" style="width: 100%;">
                            <span class="btn-text text-center">Update Appointment</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
@endsection
