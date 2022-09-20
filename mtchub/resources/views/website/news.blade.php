@extends('layouts.master')

{{-- @push('title')
    Home
@endpush --}}

@section('content')
    <div class="page-title-area bg_cover"
        style="background-image:  url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">{{ $page_parent->caption }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $page_parent->caption }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== NEWS LIST START ======-->
    <section class="news-2-area news-page">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($news_lists as $news_list)
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="news-item mt-30">
                            <div class="news-thumb">

                                @if ($news_list->banner_image)
                                    <img src="{{ $news_list->banner_image }}" alt="news">
                                @else
                                    <img src="/website/news-1.jpg" alt="news">
                                @endif

                            </div>
                            <div class="news-content">
                                <a href="{{ route('single_news', $news_list->nav_name) }}">
                                    <h3 class="title">{{ $news_list->caption }} <i class="flaticon-right-arrow"></i></h3>
                                </a>


                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
