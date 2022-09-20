@php
$global_setting = App\Models\GlobalSetting::all()->first();

$products = App\Models\Navigation::find($notice_heading->parent_page_id);

$productsParent = App\Models\Navigation::find($products->parent_page_id);

@endphp


@extends('layouts.master')

@push('title')
    {{-- {{ $information_detail->caption ?? 'Courses Details ' }} --}}
@endpush

@section('content')
    <div class="page-title-area bg_cover"
        style="background-image:  url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">{{ $notice_heading->caption }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>

                                @if ($productsParent)
                                    <li class="breadcrumb-item"><a
                                            href="/{{ $productsParent->nav_name }}">{{ $productsParent->caption ?? ' ' }}</a>
                                    </li>


                                    <li class="breadcrumb-item"><a
                                            href="/{{ $productsParent->nav_name }}/{{ $products->nav_name }}">{{ $products->caption ?? ' ' }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $notice_heading->caption }}
                                    </li>
                                @else



                               


                                <li class="breadcrumb-item"><a href="/{{ $products->nav_name }}">{{ $products->caption ?? " " }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $notice_heading->caption }}</li>


                                @endif



                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG DETAILS PART ENDS ======-->

    <section class="inner-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="inner-details__content">
                        <h3>{{ $notice_heading->caption ?? ' ' }}</h3>
                        <p>{!! $notice_heading->short_content ?? ' ' !!}</p>
                    </div><!-- /.inner-details__content -->
                    <div class="gallery-area gallery-page">
                        <div class="gallery-itmes">
                            <div class="row">
                                @foreach ($product_item_details as $product_item_detail)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="gallery-thumb mt-30">
                                            <img src="{{ $product_item_detail->banner_image }}" alt="gallery">
                                            <a class="main-btn image-popup"
                                                href="{{ $product_item_detail->banner_image }}"><i
                                                    class="flaticon-plus"></i></a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-8 -->
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">{{ $products->caption }}</h3>
                            <ul class="sidebar__category-list">



                                @foreach ($products->childs as $product_details_product)
                                    <li class="sidebar__category-list-item">
                                        <a href="{{ $product_details_product->nav_name }}">{{ $product_details_product->caption }}<i
                                                class="fa fa-angle-right"></i></a>

                                    </li>
                                @endforeach




                            </ul><!-- /.sidebar__category-list -->
                        </div><!-- /.sidebar__single -->

                    </div><!-- /.sidebar -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.inner-details -->
@endsection
