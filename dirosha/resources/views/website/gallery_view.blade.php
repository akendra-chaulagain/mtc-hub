@php
$global_setting = App\Models\GlobalSetting::all()->first();

$galleryFeed = App\Models\Navigation::find($normal->parent_page_id);

@endphp





@extends('layouts.master')





@push('title')
    Image gallery
@endpush


@section('content')
    <section class="page-title bg-dark-overlay text-center" style="background-image: url(/website/images/portfolio.jpg);">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">{{ $galleryFeed->caption }}</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="/dirosha/" class="breadcrumbs__url">Home</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="/dirosha/{{ $galleryFeed->nav_name }}" class="breadcrumbs__url">{{ $galleryFeed->caption }}</a>
                    </li>
                    <li class="breadcrumbs__item breadcrumbs__item--current">
                        {{ $normal->caption }}
                    </li>
                </ul>
            </div>
        </div>
    </section> <!-- end page title -->

    <!-- Inner Detail -->
    <section class="section-wrap">
        <div class="box-offset-container">
            <div class="container">

                <div class="gallery-view">
                    <div class="row" id="lightgallery">
                           @foreach ($photos as $photo)

                        <div class="item col-md-4 all 17"
                            data-src="/dirosha/uploads/photo_gallery/{{ $photo->file }}"
                          >
                            <a href="">
                                <img src="/dirosha/uploads/photo_gallery/{{ $photo->file }}"
                                    alt="Construction" />
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
