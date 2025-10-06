@extends('layouts.admin_layout')

@section('content')
@include('sweetalert::alert')
    <div>
        <div>
            <h1 class="text-dark fw-bold mb-2">My Profile</h1>
            <h5 class="text-dark">Account Details</h5>
        </div>
        <div class="row mt-5 px-2">
            @auth
                <div class="col-6"
                    style="width: 100px; height:220px; background-color:#1E3E62; border-top-right-radius:300px; border-top-left-radius:300px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; display:flex; flex-direction:column;align-items:center; justify-content:center;">
                    @if (auth()->user()->profile_pic != null)
                        <div>
                            <img style="border-radius: 50%; object-fit:cover; width: 120px; height:120px;"
                                src="{{ asset('storage/profile_pics/' . auth()->user()->profile_pic) }}" alt="">
                        </div>
                    @else
                        <div
                            style="display:flex; flex-direction:column;align-items:center; justify-content:center; width: 100px; height:100px; background-color: #FEF9F2;; border-radius:50%">
                            <i class="fa fa-user display-4 text-dark"></i>
                        </div>
                    @endif
                    <div class="d-flex flex-row gap-3 mt-3 justify-content-center align-items-center"
                        title="Update Profile Picture">

                        <button type="button" class="btn" style="background-color: transparent" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <i class="ri-image-edit-fill fs-4 text-light"></i>
                        </button>

                        <form action="{{route('delete_pics')}}" method="POST" onclick="return confirm('Are you sure want to delete your Profile Picture')">
                            @csrf
                            <button type="submit" class="btn" style="background-color: transparent">
                                <i class="ri-delete-bin-5-fill fs-4 text-light" title="Delete Profile Picture"></i>

                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            <div class="col-6">
                @auth
                    <div>
                        <label for="">User Name</label>
                        <input type="text" value="{{ auth()->user()->name }}" readonly class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="">Email Address</label>
                        <input type="email" value="{{ auth()->user()->email }}" class="form-control" readonly>
                    </div>
                    <div class="mt-3">
                        <label for="">Phone Number</label>
                        <input type="tel" value="{{ auth()->user()->phone }}" class="form-control" readonly>
                    </div>
                    <div class="mt-3">
                        <a href="{{route('edit_profile')}}">
                            <button class="btn btn-success">Edit Profile</button>
                        </a>
                    </div>
                @endauth
            </div>


        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Update your Profile Picture</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        X
                    </button>
                </div>
                <form action="{{route('update_pic', auth()->user()->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
