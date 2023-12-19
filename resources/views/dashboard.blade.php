@extends('frontend.frontend_dashboard')
@section('main')
    @php
        $id = Auth::user()->id;
        $userData = App\Models\User::find($id);
    @endphp


        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                            <div class="user-info">
                                <img class="img-profile img-circle img-responsive center-block rounded-circle"
                                    src="https://bootdey.com/img/Content/avatar/avatar1.png" alt>
                                <ul class="meta list list-unstyled">
                                    <li class="name">
                                        {{$userData->name}}
                                    </li>
                                    <li class="email">
                                        {{$userData->email}}
                                    </li>
                                    <li class="activity">Last logged in: Today at 2:18pm</li>
                                </ul>
                            </div>
                            @include('frontend.dashboard.dashboard_sidebar')
                        </div>

                        <div class="content-panel">
                            <form class="form-horizontal" action="" >
                                @csrf
                                <fieldset class="fieldset">
                                    <h3 class="fieldset-title">Personal Info</h3>
                                    <div class="form-group d-flex row">
                                        <h1>Coming soon</h1>
                                    </div>
                                </fieldset>
                                <hr>
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
@endsection
