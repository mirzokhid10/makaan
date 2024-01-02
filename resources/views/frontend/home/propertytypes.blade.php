@php
    $ptype = App\Models\PropertyType::latest()
        ->limit(8)
        ->get();
@endphp
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Types</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            @foreach ($ptype as $item)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{asset('frontend/assets/img/icon-'.$item->type_icon.'.png')}}" alt="Icon">
                            </div>
                            <h6>{{ $item->type_name }}</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
