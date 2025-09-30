@extends('layouts.admin_layout')

@section('content')
    @include('sweetalert::alert')
    <div>
        <h1 class="text-dark">Add Doctor</h1>
        <p class="text-dark">Adding Doctors information</p>
    </div>
    <div class="mt-4">
        <form action="{{ route('create_doctor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Full Name</label>
                <input type="text" class="form-control" name="name" id="name"
                    placeholder="Add the Doctor Full Name">
            </div>
            <div class="mt-3">
                <label for="">Doctor Email Address</label>
                <input type="email" class="form-control" name="email" id="email"
                    placeholder="Add the Doctor Email Address">
            </div>
            <div class="mt-3">
                <label for="">Doctor Phone Number</label>
                <input type="tel" class="form-control" name="phone" id="phone"
                    placeholder="Add the Doctor Phone Number ">
            </div>
            <div class="mt-3">
                <label for="">Doctor Position</label>
                <input type="text" class="form-control" name="position" id="position"
                    placeholder="Add the Doctor Position">
            </div>
            <div class="mt-3">
                <label for="">Doctor Years of Experience</label>
                <input type="number" class="form-control" name="years_of_experience" id="years_of_experience"
                    placeholder="Add the Doctor Years of Experience">
            </div>
            <div class="mt-3">
                <label for="">Doctor University</label>
                <input type="text" class="form-control" name="university" id="university"
                    placeholder="Add the Doctor University">
            </div>
            <div class="mt-3">
                <label for="">Doctor Description</label>
                <textarea name="description" id="description" class="form-control" rows="4"
                    placeholder="Add the Doctor Description"></textarea>
            </div>
            <div class="mt-3">
                <label for="">Doctor Photo</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="myself-button mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
