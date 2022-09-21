@php

// $products = App\Models\Navigation::find($project_heading->parent_page_id);
// $products_data = App\Models\Navigation::find($products->parent_page_id);
@endphp












@extends('layouts.master')
@push('title')
    {{ $normal->caption ?? ' ' }}
@endpush
@section('content')
    @if ($normal->page_type == 'News' || $normal->page_type == 'Normal')
        <!-- Page Title -->
        <section class="page-title bg-dark-overlay text-center" style="background-image: url(/website/images/portfolio.jpg);">
            <div class="container">
                <div class="page-title__holder">
                    <h1 class="page-title__title"> {{ $normal->caption ?? ' ' }}</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs__item">
                            <a href="/" class="breadcrumbs__url">Home</a>
                        </li>


                         <li class="breadcrumbs__item">
                            <a href="/news&events" class="breadcrumbs__url">News &  Events</a>
                        </li>




                        <li class="breadcrumbs__item breadcrumbs__item--current">
                            {{ $normal->caption ?? ' ' }}
                        </li>
                    </ul>
                </div>
            </div>
        </section> <!-- end page title -->

        <!-- Inner Detail -->
        <section class="section-wrap">
            <div class="box-offset-container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="entry__article">
                                <p>{{ $normal->short_content }}</p>
                                <p>{{ $normal->long_content }}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end Inner Detail -->
    @else
        <div class="slick-slider slick-single-image">
            <img src="/uploads/featured_image/{{ $normal->featured_image ?? ' ' }}" class="project__featured-img"
                alt="featured-img">
            <img src="/uploads/icon_image/{{ $normal->icon_image ?? ' ' }}" class="project__featured-img"
                alt="featured-img">

        </div>

        <section class="section-wrap pb-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 project__info mb-md-40">
                        <h4>{!! $normal->short_content !!}</h4>
                        <p>{!! $normal->long_content !!}</p>
                        <div class="gallery gallery-size-large">
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <img src="images/service-1.jpg" class="attachment-large size-large" alt="">
                                </div>
                            </figure>
                            <figure class="gallery-item">
                                <div class="gallery-icon landscape">
                                    <img src="images/service-2.jpg" class="attachment-large size-large" alt="">
                                </div>
                            </figure>
                        </div>
                    </div>

                    <div class="col-lg-4 project__details">
                        {!! $normal->project_details !!}
                    </div>

                </div>
            </div>
        </section>
    @endif
@endsection
