@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
    <div>
        <h1 class="text-dark">Update and Manage Hospital Patients Served</h1>
        <p class="text-dark">Updating Hospital Patients Served</p>
    </div>
    <div class="mt-4">
        <form action="{{route('create_served')}}" method="POST">
            @csrf
            <div class="mt-3">
                <label for="">Update Hospital Patients Served</label>
                <input type="number" class="form-control" name="served" id="served"
                    placeholder="Hospital Patients Served" value="{{ old('served', $served->served ?? '') }}">
            </div>
            <div class="myself-button mt-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>

    <div class="mt-5">
        <p>Managing Hospital Patients Served</p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead align="center">
                    <tr>
                        <th scope="col">Hospital Patients Served</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @if ($served)
                        <tr>
                            <td>{{$served->served}}</td>
                            <td>
                                <a href="{{route('delete_served', $served->id)}}"
                                    onclick="return confirm('Are you sure you want to Delete this Years of Experience???')">
                                    <button class="btn btn-danger" style="border-radius: 10px;">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
