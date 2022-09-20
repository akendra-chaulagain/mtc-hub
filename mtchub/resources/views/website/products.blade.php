@php
$global_setting = App\Models\GlobalSetting::all()->first();

$products = App\Models\Navigation::query()
    ->where('nav_category', 'Main')
    ->where('page_type', '=', 'Group')
    ->where('page_status', '1')
    ->orderBy('position', 'ASC')
    ->first();
$home_best_products = $products->first()->childs;
if (isset($normal)) {
    $seo = $normal;
} elseif (isset($job)) {
    $seo = $job;
} elseif (isset($job)) {
    $seo = $job;
}

$productsBreed = App\Models\Navigation::find($notice_heading->parent_page_id);

@endphp




@extends('layouts.master')

@push('title')
    {{ $notice_heading->caption ?? '' }}
@endpush

@section('content')
    <div class="page-title-area bg_cover"
        style="background-image: url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">{{ $notice_heading->caption ?? ' ' }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>

                                
                                <li class="breadcrumb-item">
                                    <a href="/{{ $products->nav_name ?? ' ' }}">{{ $products->caption ?? ' ' }}</a>
                                
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $notice_heading->caption ?? ' ' }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="inner-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="inner-details__content">
                        <h3>{{ $notice_heading->caption ?? ' ' }}</h3>
                        <p>{!! $notice_heading->short_content !!}</p>
                    </div><!-- /.inner-details__content -->
                    <div class="product-box-area">
                        <h4>
                            {{ $notice_heading->caption ?? ' ' }} Items</li>

                        </h4>
                        <div class="row product-box-inner">
                            @foreach ($notices as $noticesitem)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <a href="{{ $noticesitem->nav_name }}">
                                        <div class="single-product mt-30">

                                            @if ($noticesitem->banner_image)
                                                <img src="{{ $noticesitem->banner_image }}">
                                            @else
                                                <img src="/website/defaultproduct.jpg">
                                            @endif



                                            <h4 class="title">{{ $noticesitem->caption }}</h4>
                                        </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Our Products</h3><!-- /.sidebar__title -->
                            <ul class="sidebar__category-list">
                                @foreach ($home_best_products as $home_best_product)
                                    <li class="sidebar__category-list-item"><a
                                            href="{{ $home_best_product->nav_name }}">{{ $home_best_product->caption ?? ' ' }}<i
                                                class="fa fa-angle-right"></i></a></li>
                                @endforeach

                            </ul><!-- /.sidebar__category-list -->
                        </div><!-- /.sidebar__single -->

                    </div><!-- /.sidebar -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.inner-details -->
@endsection
