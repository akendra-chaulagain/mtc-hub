@extends('layouts.master')


@push('title')
    Video Gallery
@endpush



@section('content')
     <section class="page-title bg-dark-overlay text-center" style="background-image: url(/website/images/portfolio.jpg);">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">Video Gallery</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="/" class="breadcrumbs__url">Home</a>
                    </li>
                    <li class="breadcrumbs__item breadcrumbs__item--current">
                        Video Gallery
                    </li>
                </ul>
            </div>
        </div>
    </section> <!-- end page title -->

   

    <section class="gallery-folder" style="margin-top: 40px">
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
