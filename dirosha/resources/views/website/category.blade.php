@php

$products = App\Models\Navigation::find($project_heading->parent_page_id);
// $products_data = App\Models\Navigation::find($products->parent_page_id);
@endphp












@extends('layouts.master')
{{-- @push('title')
    {{ $normal->caption ?? ' ' }}
@endpush --}}
@section('content')
    <div class="content-wrapper content-wrapper--boxed oh">

        <!-- Page Title -->
        <section class="page-title bg-dark-overlay text-center" style="background-image: url(/website/images/portfolio.jpg);">
            <div class="container">
                <div class="page-title__holder">
                    <h1 class="page-title__title">Our Project</h1>
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs__item">
                            <a href="/dirosha/" class="breadcrumbs__url">Home</a>
                        </li>
                        <li class="breadcrumbs__item breadcrumbs__item--current">
                            Our Project
                        </li>
                    </ul>
                </div>
            </div>
        </section> <!-- end page title -->



        <section class="section-wrap">
            <div class="container-fluid container-semi-fluid">
                <div class="masonry-filter text-center">
                    <a href="#" class="filter active" data-filter="*">All</a>

                    @foreach ($products->childs as $project_headingitem)
                        <a href="#" class="filter "
                            data-filter=".{{ $project_headingitem->nav_name }}">{{ $project_headingitem->caption }}</a>
                    @endforeach

                </div>

                <div class="row masonry-grid">
                    @foreach ($products->childs as $project_headingitem)
                        @foreach ($project_headingitem->childs as $products_datatem)
                            <div
                                class="masonry-item col-xl-3 col-lg-4 col-md-6 project hover-trigger  {{ $project_headingitem->nav_name }}">
                                <div class="project__container">
                                    <div class="project__img-holder">
                                        <a href="{{ route('single_news', $products_datatem->nav_name) }}">
                                            <img src="/dirosha/{{ $products_datatem->banner_image }}" alt=""
                                                class="project__img">
                                            <div class="hover-overlay">
                                                <div class="project__description">
                                                    <h3 class="project__title">{{ $products_datatem->caption ?? ' ' }}</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach





                </div>
            </div>
        </section>





        <div id="back-to-top">
            <a href="#top"><i class="ui-arrow-up"></i></a>
        </div>

    </div>
@endsection
