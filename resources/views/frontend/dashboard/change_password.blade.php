@extends('frontend.frontend_dashboard')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    @php
                        $id = Auth::user()->id;
                        $userData = App\Models\User::find($id);
                    @endphp
                    <div class="side-bar">
                        <div class="user-info">
                            <figure class="">
                                <a href="blog-details.html">
                                    <img class="img-profile img-circle img-responsive center-block rounded-circle"
                                        src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('upload/no_image.jpg') }}"
                                        alt=""></a>
                            </figure>
                            {{-- <img class="img-profile img-circle img-responsive center-block rounded-circle"
                            src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}" alt> --}}
                            <ul class="meta list list-unstyled">
                                <li class="name">
                                    {{ $userData->name }}
                                </li>
                                <li class="email">
                                    {{ $userData->email }}
                                </li>
                                <li class="activity">Last logged in: Today at 2:18pm</li>
                            </ul>
                        </div>
                        @include('frontend.dashboard.dashboard_sidebar')
                    </div>
                    <div class="content-panel">
                        <form class="form-horizontal" action="{{ route('user.password.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset class="fieldset">
                                <h3 class="fieldset-title">Change Password</h3>
                                <div class="form-group d-flex row my-3">
                                    <label class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">
                                        Old Password
                                    </label>
                                    <div class="col-md-8 t col-sm-9 col-xs-12">
                                        <input type="password" name="old_password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            id="old_password">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group d-flex row my-3">
                                    <label class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">
                                        New Password
                                    </label>
                                    <div class="col-md-8 t col-sm-9 col-xs-12">
                                        <input type="password" name="new_password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            id="new_password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group d-flex row my-3">
                                    <label class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">
                                        Confirm Password
                                    </label>
                                    <div class="col-md-8 t col-sm-9 col-xs-12">
                                        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group d-flex row my-3">
                                    <label class="col-md-2"></label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        <button type="submit" class="btn btn-primary px-3 d-none d-lg-flex ms-auto">Save Changes </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
