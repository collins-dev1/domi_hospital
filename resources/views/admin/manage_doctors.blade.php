@extends('layouts.admin_layout')

@section('content')
    @include('sweetalert::alert')
    <div>
        <h1>All Doctors</h1>
        <p>Manage all the doctors Details</p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead align="center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Doctor Image</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Position</th>
                        <th scope="col">Years of Experience</th>
                        <th scope="col">University</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @php $rowNumber = 1 @endphp
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $rowNumber++ }}</td>
                            <td>
                                @if ($doctor->image == null)
                                    <i class="fa fa-fw fa-user-circle"></i>
                                @else
                                    <img src="{{ asset('uploads/doctors/' . $doctor->image) }}" alt=""
                                        style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
                                @endif
                            </td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->position }}</td>
                            <td>{{ $doctor->years_of_experience }}</td>
                            <td>{{ $doctor->university }}</td>
                            <td>{{ $doctor->description }}</td>
                            <td style="display: flex; gap: 10px;">
                                <a href="{{ route('edit_doctors', $doctor->id) }}"
                                    onclick="return confirm('Are you sure you want to Edit this Doctor???')">
                                    <button class="btn btn-success" style="border-radius: 10px;">Edit</button>
                                </a>
                                <a href="{{ route('delete_doctor', $doctor->id) }}"
                                    onclick="return confirm('Are you sure you want to Delete this Doctor???')">
                                    <button class="btn btn-danger" style="border-radius: 10px;">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
