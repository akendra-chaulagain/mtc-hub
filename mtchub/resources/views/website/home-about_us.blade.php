





<section class="best-creative-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="best-creative-bg">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-7">
                            <div class="best-creative-content">
                                <h3 class="title">{{ $about->caption ?? '' }}</h3>
                                <p>{!! $about->short_content ?? '' !!}</p>
                                <p>{!! $about->long_content ?? '' !!}</p>
                                <a class="main-btn main-btn-2" href="/about-us">Read More</a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="best-creative-list">
                                <div class="best-creative-list-item">
                                    <ul>
                                        @foreach ($home_product_data as $home_productitem)
                                            <li><i class="fa fa-check"></i>{{ $home_productitem->caption }}</li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="best-creative-area-pattern">
        <img src="/website/images/testimonial-pattern.png" alt="">
    </div>
</section>
