@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
    <div>
        <h1 class="text-dark">Update and Manage Years of Experience</h1>
        <p class="text-dark">Updating Years of Experience</p>
    </div>
    <div class="mt-4">
        <form action="{{route('create_years')}}" method="POST">
            @csrf
            <div class="mt-3">
                <label for="">Update Hospital Years of Experience</label>
                <input type="number" class="form-control" name="years" id="years"
                    placeholder="Hospital Years of Experience" value="{{ old('years', $years->years ?? '') }}">
            </div>
            <div class="myself-button mt-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>

    <div class="mt-5">
        <p>Managing Years of Experience</p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead align="center">
                    <tr>
                        <th scope="col">Hospital Years of Expereience</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @if ($years)
                        <tr>
                            <td>{{$years->years}}</td>
                            <td>
                                <a href="{{route('delete_years', $years->id)}}"
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
