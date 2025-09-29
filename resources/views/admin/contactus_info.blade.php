@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
<div>
    <h1>Contact Information</h1>
    <p>Manage all the informations on our contact us page</p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead align="center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Preferred Department</th>
                    <th scope="col">Message</th>
                    <th scope="col">Priority Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody align="center">
                @php $rowNumber = 1 @endphp
                @foreach ($infos as $info)
                <tr>
                    <td>{{ $rowNumber++ }}</td>
                    <td>{{$info->first_name}}</td>
                    <td>{{$info->last_name}}</td>
                    <td>{{$info->email}}</td>
                    <td>{{$info->phone_no}}</td>
                    <td>{{$info->subject}}</td>
                    <td>{{$info->department}}</td>
                    <td>{{$info->message}}</td>
                    <td>{{$info->level}}</td>
                    <td style="display: flex; gap: 10px;">
                        {{-- <a href="" onclick="return confirm('Are you sure you want to Edit this Doctor???')">
                            <button class="btn btn-success" style="border-radius: 10px;">Edit</button>
                        </a> --}}
                        <a href="{{route('delete_info', $info->id)}}" onclick="return confirm('Are you sure you want to Delete this Information???')">
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
