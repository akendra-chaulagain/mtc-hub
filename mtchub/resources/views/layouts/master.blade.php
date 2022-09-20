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
}

$notice = App\Models\Navigation::query()
    ->where('nav_category', 'Main')
    ->where('page_type', '=', 'Notice')

    ->where('page_status', '1')
    ->orderBy('position', 'ASC')
    ->get();
if (isset($normal)) {
    $seo = $normal;
} elseif (isset($job)) {
    $seo = $job;
}

@endphp



<!DOCTYPE html>
<html lang="en">

<head>

      <meta charset="UTF-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!-----SEO--------->

    <title> @stack('title') | {{ $seo->page_titile ?? $global_setting->page_title }}</title>
    <meta name="title" content="{{ $seo->page_titile ?? $global_setting->page_title }}">
    <meta name="description" content="{{ $seo->page_description ?? $global_setting->page_description }}">
    <meta name="keywords" content="{{ $seo->page_keyword ?? $global_setting->page_keyword }}">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="{{ $global_setting->site_name ?? '' }}">


    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $global_setting->website_full_address ?? '' }}">
    <meta property="og:title" content="{{ $seo->page_title ?? $global_setting->page_title }}">
    <meta property="og:description" content="{{ $seo->page_description ?? $global_setting->page_description }}">
    <meta property="og:image" content="{{ $seo->banner_image ?? '/uploads/icons/' . $global_setting->site_logo }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $global_setting->website_full_address ?? '' }}">
    <meta property="twitter:title" content="{{ $seo->page_title ?? $global_setting->page_title }}">
    <meta property="twitter:description" content="{{ $seo->page_description ?? $global_setting->page_description }}">
    <meta property="twitter:image"
        content="{{ $seo->banner_image ?? '/uploads/icons/' . $global_setting->site_logo }}">

    

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ '/uploads/icons/' . $global_setting->favicon }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="/website/css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="/website/css/font-awesome.min.css">

    <!--====== flaticon css ======-->
    <link rel="stylesheet" href="/website/css/flaticon.css">

    <!--====== nice select css ======-->
    <link rel="stylesheet" href="/website/css/nice-select.css">

    <!--====== animate css ======-->
    <link rel="stylesheet" href="/website/css/animate.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="/website/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="/website/css/slick.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="/website/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="/website/css/style.css">


</head>

<body>




    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="offcanvas-social">
                            <ul class="text-center">
                                <li>
                                    <a href="{{ $global_setting->facebook ?? '#' }}"><span
                                            class="fa fa-facebook"></span></a>
                                </li>
                                <li>
                                    <a target="_blank" href="{{ $global_setting->twitter ?? '#' }}"><span
                                            class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="{{ $global_setting->linkedin ?? '#' }}"><span
                                            class="fa fa-instagram"></span></a>
                                </li>

                            </ul>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                 <li>
                                            <a class="active" href="/">Home</a>
                                        </li>
                               
                               

                                   @foreach ($menus as $menu)
                                            @php $submenus = $menu->childs; @endphp
                                            <li class="menu-item-has-children" @if (isset($slug_detail) && $slug_detail->nav_name == $menu->nav_name)  @endif>
                                                {{-- <a href="product-list.html">Our Products<i
                                                    class="fa fa-angle-down"></i></a> --}}
                                                <a
                                                    @if ($submenus->count() > 0) href="{{ route('category', $menu->nav_name) }}" @else href="  
                                                    {{ route('category', $menu->nav_name) }}" @endif>{{ $menu->caption }}</a>




                                                @if ($submenus->count() > 0)
                                                    <ul class="sub-menu">
                                                        @foreach ($submenus as $sub)
                                                            <li>

                                                                <a
                                                                    href="{{ route('subcategory', [$menu->nav_name, $sub->nav_name]) }}">{{ $sub->caption }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach

                                        <li>
                                            <a href="/contact">Contact</a>
                                        </li>
                               
                             
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href=" {{ $global_setting->site_email }}"><i class="fa fa-envelope-o"></i>
                                     {{ $global_setting->site_email }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== OFFCANVAS MENU PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area header-2-area header-3-area">
        <div class="header-top-area header-top-3-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top">
                            <div class="header-logo">
                                <a href="index.html"><img src="{{ '/uploads/icons/' . $global_setting->site_logo }}"
                                        alt="logo"></a>
                            </div>
                            <ul>
                                <li><a href="{{ $global_setting->site_email }}"><i class="flaticon-message"></i>
                                        {{ $global_setting->site_email }}</a></li>
                                <li><a href=" {{ $global_setting->phone }}"><i class="flaticon-phone-call"></i>
                                        {{ $global_setting->phone }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-header-item d-flex d-lg-block justify-content-between align-items-center">
                            <div class="main-header-menus  d-flex justify-content-between">
                                <div class="header-menu d-none d-lg-block">
                                    <ul>
                                        <li>
                                            <a class="active" href="/">Home</a>
                                        </li>




                                        @foreach ($menus as $menu)
                                            @php $submenus = $menu->childs; @endphp
                                            <li @if (isset($slug_detail) && $slug_detail->nav_name == $menu->nav_name)  @endif>
                                                {{-- <a href="product-list.html">Our Products<i
                                                    class="fa fa-angle-down"></i></a> --}}
                                                <a
                                                    @if ($submenus->count() > 0) href="{{ route('category', $menu->nav_name) }}" @else href="  
                                                    {{ route('category', $menu->nav_name) }}" @endif>{{ $menu->caption }}</a>




                                                @if ($submenus->count() > 0)
                                                    <ul class="sub-menu">
                                                        @foreach ($submenus as $sub)
                                                            <li>

                                                                <a
                                                                    href="{{ route('subcategory', [$menu->nav_name, $sub->nav_name]) }}">{{ $sub->caption }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach

                                        <li>
                                            <a href="/contact">Contact</a>
                                        </li>


                                    </ul>
                                </div>
                                <div class="header-social d-flex align-items-center">
                                    <ul class="d-none d-lg-block">
                                       <li>
                                    <a href="{{ $global_setting->facebook ?? '#' }}"><span
                                            class="fa fa-facebook"></span></a>
                                </li>
                                <li>
                                    <a target="_blank" href="{{ $global_setting->twitter ?? '#' }}"><span
                                            class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="{{ $global_setting->linkedin ?? '#' }}"><span
                                            class="fa fa-instagram"></span></a>
                                </li>
                                    </ul>
                                    <div class="header-logo d-lg-none d-block">
                                        <a href="index.html"><img
                                                src="{{ '/uploads/icons/' . $global_setting->site_logo }}"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-social d-flex align-items-center">
                                <div class="toggle-btn ml-30 canvas_open d-lg-none d-block">
                                    <i class="fa fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>













    @yield('content')

    {{-- footer --}}




    <section class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="footer-about mt-30">
                        <div class="logo">
                            <a href="#"><img src="{{ '/uploads/icons/' . $global_setting->site_logo_nepali }}"
                                    alt="logo"></a>
                        </div>
                        <p>{{ $global_setting->page_description }}</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-list mt-30">
                        <h4 class="title">Company</h4>
                        <ul>
                            @foreach ($menus as $key => $menu)
                                @if ($key == 4)
                                @break

                                ;
                            @endif
                            <li> <a href="{{ route('category', $menu->nav_name) }}">{{ $menu->caption }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-list pl-35 mt-30">
                    <h4 class="title">Our Products</h4>

                    <ul>

                        @foreach ($home_best_products as $key => $home_best_product)
                            @if ($key == 4)
                            @break

                            ;
                        @endif
                        <li><a
                                href="{{ route('category', $home_best_product->nav_name) }}">{{ $home_best_product->caption }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="footer-address footer-about mt-30">
                <h3 class="title">Contact Info</h3>
                <ul>
                    <li><a href="{{ $global_setting->site_email }}">{{ $global_setting->site_email }}</a>
                        {{-- / <a
                            href="mailto:mtchub@gmail.com"> mtchub@gmail.com</a> --}}
                    </li>
                    <li><a href="{{ $global_setting->phone }}">{{ $global_setting->phone }}</a> / <a
                            href="{{ $global_setting->phone_ne }}">{{ $global_setting->phone_ne }}</a></li>
                </ul>
                <p> {{ $global_setting->website_full_address }}
                    {{ $global_setting->address_ne }}</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14127.724416313076!2d85.3095379!3d27.7194134!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c4739e13d66582f!2sSorhakhutte%20Bus%20Stop!5e0!3m2!1sen!2snp!4v1659518758556!5m2!1sen!2snp"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copyright d-block d-md-flex justify-content-between align-items-center">
                    <p>© 2022 All Rights Reserved. Developed by <a href="https://radiantnepal.com/"
                            target="_blank">Radiant Infotech Nepal</a></p>
                    <ul>
                        <li>
                            <a href="{{ $global_setting->facebook ?? '#' }}"><span
                                    class="fa fa-facebook"></span></a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ $global_setting->twitter ?? '#' }}"><span
                                    class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ $global_setting->linkedin ?? '#' }}"><span
                                    class="fa fa-instagram"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</section>




<div class="go-top-area">
<div class="go-top-wrap">
    <div class="go-top-btn-wrap">
        <div class="go-top go-top-btn">
            <i class="fa fa-angle-double-up"></i>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
</div>
</div>






<!--====== jquery js ======-->
<script src="/website/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/website/js/vendor/jquery-3.5.0.js"></script>

<!--====== Bootstrap js ======-->
<script src="/website/js/bootstrap.min.js"></script>
<script src="/website/js/popper.min.js"></script>

<!--====== Slick js ======-->
<script src="/website/js/slick.min.js"></script>

<!--====== odometer js ======-->
<script src="/website/js/jquery.counterup.min.js"></script>
<script src="/website/js/jquery.waypoints.min.js"></script>

<!--====== wow js ======-->
<script src="/website/js/wow.js"></script>

<!--====== nice select js ======-->
<script src="/website/js/jquery.nice-select.min.js"></script>

<!--====== Magnific Popup js ======-->
<script src="/website/js/jquery.magnific-popup.min.js"></script>

<!--====== Main js ======-->
<script src="/website/js/main.js"></script>









</body>

</html>
