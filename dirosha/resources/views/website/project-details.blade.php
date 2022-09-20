@php

// $products = App\Models\Navigation::find($project_heading->parent_page_id);
// $products_data = App\Models\Navigation::find($products->parent_page_id);
@endphp












@extends('layouts.master')
{{-- @push('title')
    {{ $normal->caption ?? ' ' }}
@endpush --}}
@section('content')


<div class="slick-slider slick-single-image">
				<img src="/uploads/featured_image/{{ $normal->featured_image ?? " " }}" class="project__featured-img" alt="featured-img">
                <img src="/uploads/icon_image/{{ $normal->icon_image ?? " " }}" class="project__featured-img" alt="featured-img">
				
			</div>			

			<section class="section-wrap pb-0">
				<div class="container">
					<div class="row">
				
						<div class="col-lg-8 project__info mb-md-40">
							<h4>{{ $normal->caption }}</h4>
							<p>{!! $normal->short_content !!}</p>
							<p>{!! $normal->long_content !!}</p>
							<div class="gallery gallery-size-large">
								<figure class="gallery-item">
									<div class="gallery-icon landscape">
										<img src="images/service-1.jpg" class="attachment-large size-large"
										alt="">
									</div>
								</figure>
								<figure class="gallery-item">
									<div class="gallery-icon landscape">
										<img src="images/service-2.jpg" class="attachment-large size-large"
										alt="">
									</div>
								</figure>
							</div>
						</div> <!-- project info -->
				
						<div class="col-lg-4 project__details">
							{!! $normal->project_details !!}
						</div>
				
					</div>
				</div>
			</section> <!-- 




   
@endsection
