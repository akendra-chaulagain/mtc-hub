

@php
$global_setting = App\Models\GlobalSetting::all()->first();

$galleryFeed = App\Models\Navigation::find($normal->parent_page_id);



@endphp





@extends('layouts.master')





@push('title')
    Image gallery
@endpush


@section('content')
    <div class="page-title-area bg_cover"
        style="background-image: url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">{{ $normal->caption }} </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/{{ $galleryFeed->nav_name }}">{{ $galleryFeed->caption }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $normal->caption }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== GALLERY PART START ======-->

    <section class="gallery-area gallery-page">
        <div class="container">
            <div class="gallery-itmes">
                <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="gallery-thumb mt-30">
                                <img src="/uploads/photo_gallery/{{ $photo->file }}" alt="gallery">
                                <a class="main-btn image-popup" href="/uploads/photo_gallery/{{ $photo->file }}"><i
                                        class="flaticon-plus"></i></a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
@endsection
