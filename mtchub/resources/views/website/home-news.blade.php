  <section class="news-2-area news-page">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-5">
                  <div class="news-title text-center">
                      <h3 class="title">News & events.</h3>
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              @foreach ($home_news as $home_newsitem)
                  <div class="col-lg-4 col-md-7 col-sm-9">
                      <div class="news-item mt-30">
                          <div class="news-thumb">
                              @if ($home_newsitem->banner_image)
                                  <img src="{{ $home_newsitem->banner_image }}" alt="news">
                              @else
                                  <img src="/website/news-1.jpg" alt="news">
                              @endif

                          </div>
                          <div class="news-content">
                              <a href="{{ route('single_news', $home_newsitem->nav_name) }}">
                                  <h3 class="title">{{ $home_newsitem->caption }} <i class="flaticon-right-arrow"></i>
                                  </h3>
                              </a>
                          </div>
                      </div>
                  </div>
              @endforeach


          </div>
          <div class="row justify-content-center text-center">
              <div class="col-lg-5">
                  <a class="main-btn main-btn-2" href="/news&events">View All</a>
              </div>
          </div>
      </div>
  </section>
