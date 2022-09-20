@extends('layouts.master')
@push('title')
    {{ $normal->caption ?? 'Products ' }}
@endpush

@section('content')
    <div class="page-title-area bg_cover"
        style="background-image:  url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">{{ $normal->caption }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $normal->caption }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->


    <section class="news-area">
        <div class="container">
            <div class="row">
                @foreach ($category as $categoryitem)
                    <div class="col-lg-4 col-md-6">
                        <div class="news-item active bg_cover"
                            style="background-image: url({{ $categoryitem->banner_image }});">
                            <h3 class="title">{{ $categoryitem->caption }}</h3>
                            <a href="{{ $normal->nav_name }}/{{ $categoryitem->nav_name }}"><i
                                    class="flaticon-right-arrow"></i></a>



                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
