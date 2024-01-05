@php
    $agents = App\Models\Agent::latest()
        ->limit(4)
        ->get();
@endphp
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Agents</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            @foreach ($agents as $agent)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{$agent->agent_photo}}" alt="">
                            <div
                                class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href="{{$agent->agent_facebookurl}}"><i
                                    class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href="{{$agent->agent_twitterurl}}"><i
                                    class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href="{{$agent->agent_instagramurl}}"><i
                                    class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">{{$agent->agent_name}}</h5>
                            <small>{{$agent->agent_email}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
