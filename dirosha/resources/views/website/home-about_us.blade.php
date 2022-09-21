


<section class="section-wrap intro pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="intro__title">{{ $about->caption ?? '' }}</h2>
                <p>{!! $about->short_content ?? '' !!}</p>
                <a href="inner.html">Read More +</a>
                <p>{!! $about->long_content ?? '' !!}</p>


            </div>
            <div class="col-lg-5">
                <img src="{{ $about->banner_image }}" class="img-full-width" alt="">
            </div>
        </div>
    </div>
</section>
