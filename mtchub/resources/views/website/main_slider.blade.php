


    <section class="banner-slide banner-slide-2">
  @foreach ($sliders as $slider)

        <div class="banner-area bg_cover d-flex align-items-center" style="background-image: url({{ $slider->banner_image }});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="banner-content text-center">
                            <h1 data-animation="fadeInDown" data-delay=".5s" class="title">{{$slider->caption ?? " " }} </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
     
    </section>