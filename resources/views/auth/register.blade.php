<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Makaan - Real Estate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row" style="height: 100vh">
            <div class="col-md-6 mx-auto d-flex justify-content-center align-items-center">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="form-group d-flex flex-column">
                                <label class="my-1">User name</label>
                                <input type="text" style="height: calc(3.5rem + 2px); padding: 1rem .75rem;" name="name" id="name" required="">
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label class="my-1">Email</label>
                                <input type="email" style="height: calc(3.5rem + 2px); padding: 1rem .75rem;" name="email" id="email" required="">
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label class="my-1">Password</label>
                                <input type="password" style="height: calc(3.5rem + 2px); padding: 1rem .75rem;" name="password" id="password" required="">
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label class="my-1">Confirm password</label>
                                <input type="password" style="height: calc(3.5rem + 2px); padding: 1rem .75rem;" name="confirm_password" id="confirm_password" required="">
                            </div>
                            <div class="form-group message-btn">
                                <button type="submit" class="btn btn-primary w-100 py-3">Register</button>
                            </div>
                            <div class="othre-text">
                                <p>Have account? <a href="{{route('login')}}">Sign in</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>

</html>
