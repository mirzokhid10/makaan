<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{ asset('frontend/assets/img/icon-deal.png') }}" alt="Icon"
                    style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">Makaan</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ route('index')}}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about')}}" class="nav-item nav-link">About</a>
                <a href="{{ route('propertylist')}}" class="nav-link">Property List</a>
                <a href="{{ route('contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            @auth
                <div class="sign-box d-flex gap-2">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary px-3 d-none d-lg-flex">Dashboard</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-primary px-3 d-none d-lg-flex">Logout</a>
                </div>
            @else
                <div class="sign-box">
                    <a href="{{ route('login') }}" class="btn btn-primary px-3 d-none d-lg-flex">Sign In</a>
                </div>

            @endauth
        </div>
    </nav>
</div>
