<section class="section-wrap pt-0 pb-0 pt-sm-40 offset-top-100">
    <div class="container">
        <div class="row">
            @foreach ($home_services as $home_service)
                  <div class="col-md-4">
                <div class="benefit">
                    <i class="{{ $home_service->icon_image_caption ?? " " }} benefit__icon"></i>
                    <h4 class="benefit__title">{{ $home_service->caption ?? " " }}</h4>
                    <p class="benefit__text">{{ $home_service->short_content ?? " " }}</p>
                </div>
            </div>
            @endforeach
          
           
        </div>
    </div>
</section> <!-- end benefits -->
