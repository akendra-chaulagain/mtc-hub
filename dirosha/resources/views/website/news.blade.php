@extends('layouts.master')

{{-- @push('title')
    Home
@endpush --}}

@section('content')
    	<!-- Page Title -->
			<section class="page-title bg-dark-overlay text-center" style="background-image: url(/website/images/portfolio.jpg);">
				<div class="container">
					<div class="page-title__holder">
						<h1 class="page-title__title">News & Events</h1>
						<ul class="breadcrumbs">
							<li class="breadcrumbs__item">
								<a href="/" class="breadcrumbs__url">Home</a>
							</li>
							<li class="breadcrumbs__item breadcrumbs__item--current">
								News & Events
							</li>
						</ul>
					</div>
				</div>
			</section> <!-- end page title -->

			<!-- Blog -->
			<section class="section-wrap">
				<div class="container">
					<div class="row">

                        @foreach ($news_lists as $news_list)
                        <div class="col-lg-4 col-md-6">
							<article class="entry">
								<div class="entry__img-holder">
									<a href="#">
                                        @if ($news_list->banner_image)
                                            <img src="{{ $news_list->banner_image }}" class="entry__img" alt="">
                                        @else
                                            <img src="/website/images/award.jpg" alt="">
                                        @endif
										
									</a>
								</div>
								<div class="entry__body">
									
									<h2 class="entry__title">
										<a href="#">{{ $news_list->caption }}</a>
									</h2>
									<a href="{{ route('single_news', $news_list->nav_name) }}" class="read-more">
										<span class="read-more__text">Read More</span>
										<i class="ui-arrow-right read-more__icon"></i>
									</a>
								</div>
							</article>
						</div>
                            
                        @endforeach

						

						

					</div> <!-- end row -->
				</div>
			</section> <!-- end blog -->
@endsection
