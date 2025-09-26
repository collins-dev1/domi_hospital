@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
    <div>
        <h1>All Health Card</h1>
        <p>Manage all the Health Cards created by the Patient</p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Genotype</th>
                        <th scope="col">Allergies</th>
                        <th scope="col">Existing Condition</th>
                        <th scope="col">Past Medications</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $rowNumber = 1 @endphp
                    @foreach ($cards as $card)
                        <tr>
                            <td>{{ $rowNumber++ }}</td>
                            <td>{{ $card->user->name }}</td>
                            <td>{{ $card->user->email }}</td>
                            <td>{{ $card->user->phone }}</td>
                            <td>{{ $card->blood_group }}</td>
                            <td>{{ $card->genotype }}</td>
                            <td>{{ $card->allergies }}</td>
                            <td>{{ $card->existing_conditions }}</td>
                            <td>{{$card->past_medications}}</td>
                            <td>
                                @if ($card->status == '0')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($card->status == '1')
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                            <td style="display: flex; gap: 10px;">
                               <a href="">
                                <button class="btn" style="background-color: rgb(16, 85, 16); color:#fff;">Approve</button>
                               </a>
                                <a href="{{route('delete_card', $card->id)}}" onclick="return confirm('Are you sure you want to delete this card?');">
                                    <button class="btn" style="background-color: rgb(193, 25, 25); color:#fff">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
