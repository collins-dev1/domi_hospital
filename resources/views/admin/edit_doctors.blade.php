@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
<div>
        <h1 class="text-dark">Edit Doctor</h1>
        <p class="text-dark">Editing Doctors information</p>
    </div>
    <div class="mt-4">
        <form action="{{route('update_doctor', $doctor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Full Name</label>
                <input type="text" class="form-control" value="{{$doctor->name}}" name="name" id="name" placeholder="Add the Doctor Full Name">
            </div>
            <div class="mt-3">
                <label for="">Doctor Email Address</label>
                <input type="email" class="form-control" name="email" value="{{$doctor->email}}" id="email" placeholder="Add the Doctor Email Address">
            </div>
            <div class="mt-3">
                <label for="">Doctor Phone Number</label>
                <input type="tel" class="form-control" name="phone" value="{{$doctor->phone}}" id="phone" placeholder="Add the Doctor Phone Number ">
            </div>
            <div class="mt-3">
                <label for="">Doctor Position</label>
                <input type="text" class="form-control" name="position" value="{{$doctor->position}}" id="position" placeholder="Add the Doctor Position">
            </div>
            <div class="mt-3">
                <label for="">Doctor Years of Experience</label>
                <input type="number" class="form-control" name="years_of_experience" value="{{$doctor->years_of_experience}}" id="years_of_experience" placeholder="Add the Doctor Years of Experience">
            </div>
            <div class="mt-3">
                <label for="">Doctor University</label>
                <input type="text" class="form-control" name="university" id="university" value="{{$doctor->university}}" placeholder="Add the Doctor University">
            </div>
            <div class="mt-3">
                <label for="">Doctor Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Add the Doctor Description">{{$doctor->description}}</textarea>
            </div>
            <div class="mt-3">
                <label for="">Current Photo</label>
                <img src="{{ asset('uploads/doctors/' . $doctor->image) }}" alt="" style="width: 100%; height: 300px; border-radius: 100px; object-fit: cover;">
            </div>
            <div class="mt-3">
                <label for="">Change Doctor Photo</label>
                <input type="file" class="form-control" value="{{$doctor->image}}" name="image" id="image">
            </div>
            <div class="myself-button mt-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
