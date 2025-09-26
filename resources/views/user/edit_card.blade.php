@extends('layouts.user_layout')

@section('content')
@include('sweetalert::alert')
<div class="modal" id="appointmentModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Health Card</h3>
            </div>
            <div class="modal-body" style="margin-top: 3rem">
                <form id="appointmentForm" action="{{ route('update_card', $card->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="department">Blood Group *</label>
                        <select name="blood_group" id="blood_group" required>
                            <option value="">-- Select Blood Group --</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="Unknown">Unknown</option>
                            <option value="Not Sure">Not Sure</option>
                        </select>


                    </div>
                    <div class="form-group">
                        <label for="department">Genotype *</label>
                        <select name="genotype" id="genotype" required>
                            <option value="">-- Select Genotype --</option>
                            <option value="AA">AA</option>
                            <option value="AS">AS</option>
                            <option value="SS">SS</option>
                            <option value="AC">AC</option>
                            <option value="SC">SC</option>
                            <option value="Unknown">Unknown</option>
                            <option value="Not Sure">Not Sure</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Allergies</label>
                        <input type="text" name="allergies" value="{{$card->allergies}}" placeholder="E.g. Peanuts, Pollen">
                    </div>
                    <div class="form-group">
                        <label for="">Existing Conditions</label>
                        <input type="text" name="existing_conditions" value="{{$card->existing_conditions}}" placeholder="E.g. Diabetes, Hypertension">
                    </div>
                    <div class="form-group">
                        <label for="">Past Medication</label>
                        <input type="text" name="past_medications" value="{{$card->past_medications}}" placeholder="E.g. Insulin, Aspirin">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary text-center" style="width: 100%;">
                            <span class="btn-text text-center">Update Card</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

