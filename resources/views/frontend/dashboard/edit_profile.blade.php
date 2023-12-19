@extends('frontend.frontend_dashboard')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <div class="side-bar">
                        <div class="user-info">
                            <figure class="">
                                <a href="blog-details.html">
                                <img class="img-profile img-circle img-responsive center-block rounded-circle"
                                src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}"
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
                        <form class="form-horizontal" action="{{ route('user.profile.store') }}"
                        method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="fieldset">
                                <h3 class="fieldset-title">Personal Info</h3>
                                <div class="form-group d-flex row">
                                    <figure class="figure col-md-2 col-sm-3 col-12">
                                        <label for="formFile" class="form-label"> </label>
                                        <img id="showImage"
                                        class="float-end rounded-circle"
                                        src="{{ (!empty($userData->photo)) ?
                                        url('upload/user_images/'.$userData->photo) :
                                        url('upload/no_image.jpg') }}"
                                        alt="" style="width: 100px; height: 100px;">
                                    </figure>
                                    <div class="col-md-4 col-sm-4 col-12">
                                        <input class="form-control" name="photo" type="file" id="image">
                                    </div>
                                </div>
                                <div class="form-group d-flex row my-3">
                                    <label
                                        class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">User
                                        Name</label>
                                    <div class="col-md-8 t col-sm-9 col-xs-12">
                                        <input type="text" name="username" class="form-control" value="{{ $userData->name }}">
                                    </div>
                                </div>
                                <div class="form-group d-flex row my-3">
                                    <label
                                        class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">First
                                        Name</label>
                                    <div class="col-md-8 t col-sm-9 col-xs-12">
                                        <input type="text" name="name" class="form-control" value="{{ $userData->username }}">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="fieldset">
                                <h3 class="fieldset-title">Contact Info</h3>
                                <div class="form-group d-flex row">
                                    <label
                                        class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">Email</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        <input type="email" name="email" class="form-control" value="{{ $userData->email }}">
                                    </div>
                                </div>
                                <div class="form-group d-flex row my-3">
                                    <label
                                        class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">Phone</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        <input type="text" name="phone" class="form-control" value="{{ $userData->phone }}">
                                    </div>
                                </div>
                                <div class="form-group d-flex row my-3">
                                    <label
                                        class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">Address</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        <input type="text" name="address" class="form-control" value="{{ $userData->address }}">
                                    </div>
                                </div>
                                <div class="form-group d-flex row my-3">
                                    <label
                                        class="col-md-2 d-flex align-items-center col-sm-3 col-12 justify-content-end">City</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        <input type="text" name="city" class="form-control" value="{{ $userData->city }}">
                                    </div>
                                </div>
                                <div class="form-group d-flex row my-3">
                                    <label
                                        class="col-md-2 d-flex align-items-center col-sm-3 col-xs-12 control-label justify-content-end">State</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        <input type="text" name="state" class="form-control" value="{{ $userData->state }}">
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <div class="form-group">
                                <div
                                    class="col-md-10 col-sm-9 col-xs-12 d-flex align-items-center justify-content-end col-md-push-2 col-sm-push-3 col-xs-push-0">
                                    <button type="submit" class="btn btn-primary">Update Changes </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });


    </script>
@endsection
