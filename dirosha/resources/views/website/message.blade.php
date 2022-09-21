
@php

// $products = App\Models\Navigation::find($project_heading->parent_page_id);

@endphp






<section class="section-wrap blog-grid">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="blog-grid__title-col d-flex flex-column mb-lg-48">
                    <div class="title-row">
                        <p class="subtitle">Message From</p>
                        <h2 class="section-title">Chairman</h2>
                        <p>{!! $message->short_content !!}</p>
                        <a href="{{ route('single_news', $message->nav_name) }}">Read More +</a>
                        <br>
                        <br>
                        <strong>Chairman Name Here</strong>
                        <br>
                        <small>{{ $message->caption }}</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 offset-lg-1">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="subtitle">Latest news</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="view-all"><a href="/news&events">View All</a></p>
                    </div>
                </div>
                <div class="from-blog">
                    <div class="row row-60">
                        @foreach ($home_news as $home_messageitem)
                               <div class="col-lg-6">
                            <article class="entry">
                                <div class="entry__img-holder">
                                    <a href="{{ route('single_news', $home_messageitem->nav_name) }}">

                                         @if ($home_messageitem->banner_image)
                                             <img src="{{ $home_messageitem->banner_image }}" class="entry__img" alt="">
                                        @else
                                            <img src="/website/images/award.jpg" alt="">
                                        @endif

                                       

                                    </a>
                                </div>
                                <div class="entry__body">
                                   
                                    <h2 class="entry__title">
                                        <a href="{{ route('single_news', $home_messageitem->nav_name) }}">{{ $home_messageitem->caption }}</a>
                                    </h2>
                                    <a href="{{ route('single_news', $home_messageitem->nav_name) }}" class="read-more">
                                        <span class="read-more__text">Read More</span>
                                        <i class="ui-arrow-right read-more__icon"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                     
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> <!-- end from blog -->
