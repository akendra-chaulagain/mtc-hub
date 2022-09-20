@php
$global_setting = App\Models\GlobalSetting::all()->first();

$menus = App\Models\Navigation::query()
    ->where('nav_category', 'Main')
    ->where('page_type', '!=', 'Job')
    ->where('page_type', '!=', 'Photo Gallery')
    ->where('page_type', '!=', 'Notice')
    ->where('parent_page_id', 0)
    ->where('page_status', '1')
    ->orderBy('position', 'ASC')
    ->get();
if (isset($normal)) {
    $seo = $normal;
} elseif (isset($job)) {
    $seo = $job;
}


$newsBreed = App\Models\Navigation::find($normal->parent_page_id);





@endphp







@extends('layouts.master')
@push('title')
    {{ $normal->caption ?? ' ' }}
@endpush
@section('content')
    <div class="page-title-area bg_cover"
        style="background-image: url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">{{ $normal->caption }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                @if ($normal->page_type == 'News')
                                    <li class="breadcrumb-item"><a href="/news&events">{{ $newsBreed->caption }}</a></li>
                                @else
                                @endif
                                <li class="breadcrumb-item active" aria-current="page">{{ $normal->caption }}</li>
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
                        <h3>{{ $normal->caption }}</h3>
                        <p>{!! $normal->short_content ?? ' ' !!}</p>

                        <p>{!! $normal->long_content !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__category">
                            <ul class="sidebar__category-list">
                                @foreach ($menus as $menusitem)
                                    <li class="sidebar__category-list-item"><a
                                            href="  
                                                    {{ route('category', $menusitem->nav_name) }}">{{ $menusitem->caption }}<i
                                                class="fa fa-angle-right"></i></a></li>
                                @endforeach
                                <li class="sidebar__category-list-item"><a href="/contact">Contact<i
                                            class="fa fa-angle-right"></i></a></li>

                            </ul><!-- /.sidebar__category-list -->
                        </div><!-- /.sidebar__single -->
                        <div class="sidebar__single sidebar__tags">
                            <p>specialized Trading Company working principally in the field of Export and Import and
                                Supplying businesses.</p>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
< @endsection
