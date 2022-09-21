@extends('layouts.master')

@push('title')
    Gallery
@endpush
@section('content')


    <section class="page-title bg-dark-overlay text-center" style="background-image: url(/website/images/portfolio.jpg);">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">Image Gallery</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="/" class="breadcrumbs__url">Home</a>
                    </li>
                    <li class="breadcrumbs__item breadcrumbs__item--current">
                        Image Gallery
                    </li>
                </ul>
            </div>
        </div>
    </section> <!-- end page title -->



    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG DETAILS PART ENDS ======-->

    <section class="gallery-folder " style="margin-top: 30px">
        <div class="container">
            <div class="row">
                @if (isset($photos))
                    @foreach ($photos as $photo)
                        <div class="col-lg-3 col-md-4">
                            <a href="{{ route('galleryview', $photo->nav_name) }}">
                                <div class="folder">
                                    <div class="paper folder-pop"><img src="{{ $photo->banner_image }}" width="100%">
                                    </div>
                                    <div class="paper folder-pop-middle"><img src="{{ $photo->banner_image }}"
                                            width="100%">
                                    </div>
                                    <div class="paper folder-pop-last"><img src="{{ $photo->banner_image }}" width="100%">
                                    </div>
                                </div>
                                <h5 class="folder-text">{{ $photo->caption }}</h5>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.inner-details -->





@endsection
