@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
    <div>
        <h1 class="text-dark">Update and Manage Hospital Award</h1>
        <p class="text-dark">Updating Hospital Award</p>
    </div>
    <div class="mt-4">
        <form action="{{route('create_award')}}" method="POST">
            @csrf
            <div class="mt-3">
                <label for="">Update Hospital Award</label>
                <input type="number" class="form-control" name="award" id="award"
                    placeholder="Hospital Award" value="{{ old('award', $award->award ?? '') }}">
            </div>
            <div class="myself-button mt-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>

    <div class="mt-5">
        <p>Managing Hospital Award</p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead align="center">
                    <tr>
                        <th scope="col">Hospital Award</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @if ($award)
                        <tr>
                            <td>{{$award->award}}</td>
                            <td>
                                <a href="{{route('delete_award', $award->id)}}"
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
