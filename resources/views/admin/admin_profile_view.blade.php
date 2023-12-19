@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="row">
            <main class="main-content col-lg-12 col-md-9 col-sm-12 p-0 ">
                <div class="">
                    <!-- Page Header -->
                    <div class="page-header row">
                        <div class="col-12 col-sm-4 text-start text-sm-left mb-0">
                            <span class="profile-overview text-uppercase page-subtitle">Overview</span>
                            <h3 class="profile-profile page-title">User Profile</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-small mb-4 pt-3">
                                <div class="card-header border-bottom text-center bg-transparent">
                                    <div class="mb-3 mx-auto">
                                        <img class="rounded-circle" style="width:180px; height:180px;" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                                    </div>
                                    <h4 class="mb-0">{{$profileData->username}}</h4>
                                    <span class="text-muted d-block mb-2 m-3">Project Manager</span>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-4">
                                        <div class="progress-wrapper">
                                            <strong class="text-muted d-block mb-2">Workload</strong>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 74%;">
                                                    <span class="progress-value">74%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item p-4">
                                        <strong class="text-muted d-block mb-2">Description</strong>
                                        <span>{{$profileData->description}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card card-small mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0">Update Admin Profile</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="feFirstName">Name</label>
                                                            <input type="text" class="form-control" name="name"
                                                            id="feFirstName" value="{{ $profileData->name }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="feLastName">Username</label>
                                                            <input type="text" class="form-control" name="username"
                                                            id="feLastName" value="{{ $profileData->username }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="feEmailAddress">Email</label>
                                                            <input type="email" class="form-control"
															name="email" id="feEmailAddress"
                                                            value="{{ $profileData->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Old Password </label>
                                                            <input type="password" name="old_password" class="form-control
                                                            @error('old_password') is-invalid @enderror " id="old_password"
                                                            autocomplete="off" >
                                                            @error('old_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">New Password </label>
                                                            <input type="password" name="new_password" class="form-control
                                                            @error('new_password') is-invalid @enderror " id="new_password"
                                                            autocomplete="off" >
                                                            @error('new_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="exampleInputEmail1">Confirm Password </label>
                                                            <input type="password" name="new_password_confirmation"
                                                            class="form-control" id="new_password_confirmation"
                                                            autocomplete="off" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label for="feInputAddress">Address</label>
                                                            <input type="text" class="form-control" id="feInputAddress"
                                                            name="address" value="{{ $profileData->address}}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="feInputCity">City</label>
                                                            <input type="text" class="form-control" name="city"
                                                            id="feInputCity" value="{{ $profileData->city}}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="feInputState ">State</label>
                                                            <select id="feInputState" class="form-control bg-transparent py-3" value="{{ $profileData->state }}">
                                                                <option selected>Choose...</option>
                                                                <option>...</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputZip">Phone Number</label>
                                                            <input type="text" class="form-control"
                                                            id="inputZip" value="{{ $profileData->phone }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="feDescription">Description</label>
                                                            <textarea class="form-control" name="feDescription" rows="5" value="{{ $profileData->description }}">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-8">
                                                            <label for="feInputAddress">Choose Photo</label>
                                                            <input type="file"  class="form-control" id="image"
                                                            name="photo" value="{{ $profileData->address}}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="feInputAddress" class="form-label"></label>
                                                            <img id="showImage" class="rounded-circle" style="height: 80px; width:80px;" src="{{(!empty($profileData->photo)) ?
                                                            url('upload/admin_images/'.$profileData->photo) : url('uplaod/no_image.jpg') }}"
                                                            alt="">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Account</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Default Light Table -->
                </div>
            </main>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
