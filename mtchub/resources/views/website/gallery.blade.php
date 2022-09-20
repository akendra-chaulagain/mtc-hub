@extends('layouts.master')

@push('title')
    Gallery
@endpush
@section('content')




    <div class="page-title-area bg_cover"
        style="background-image: url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">Image Gallery</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Image Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG DETAILS PART ENDS ======-->

    <section class="gallery-folder">
        <div class="container">
            <div class="row">
                @if (isset($photos))
                    @foreach ($photos as $photo)
                        <div class="col-lg-3 col-md-4">
                            <a href="{{ route('galleryview', $photo->nav_name) }}">
                                <div class="folder">
                                    <div class="paper folder-pop"><img src="{{ $photo->banner_image}}" width="100%"></div>
                                    <div class="paper folder-pop-middle"><img src="{{ $photo->banner_image }}" width="100%">
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
