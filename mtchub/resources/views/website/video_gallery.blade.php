@extends('layouts.master')


@push('title')
    Video Gallery
@endpush



@section('content')
    <div class="page-title-area bg_cover"
        style="background-image: url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">Video Gallery</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <section class="gallery-folder">
        <div class="container">
            <div class="row">
                @foreach ($photos as $photo)
                    <div class="col-md-6">
                        <iframe width="100%" height="315" src="{{ $photo->link }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                @endforeach


            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.inner-details -->
@endsection
