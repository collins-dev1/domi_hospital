@extends('layouts.admin_layout')

@section('content')
<div>
    <h1>All Patients</h1>
    <p>Manage all the patients who registered</p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Marital Status</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Banned Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $rowNumber = 1 @endphp
                @foreach ($users as $user)
                <tr>
                    <td>{{ $rowNumber++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{$user->martial_status}}</td>
                    <td>{{$user->dob}}</td>
                    <td>
                        @if ($user->banned_status == 0)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Banned</span>
                        @endif
                    </td>
                    <td style="display: flex; gap: 10px;">
                        @if ($user->banned_status == 0)
                        <a href="{{route('ban', $user->id)}}" onclick="return confirm('Are you sure you want to Ban this Patient???')">
                            <button class="btn btn-danger" style="border-radius: 10px;">Ban</button>
                        </a>
                        @elseif ($user->banned_status == 1)
                        <a href="{{route('unban', $user->id)}}" onclick="return confirm('Are you sure you want to Unban this Patient???')">
                            <button class="btn btn-success" style="border-radius: 10px;">Unban</button>
                        </a>
                        @endif
                        <a href="{{route('delete_patient', $user->id)}}" onclick="return confirm('Are you sure you want to Delete this Patient???')">
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
