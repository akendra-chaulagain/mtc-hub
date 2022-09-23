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



$footer = App\Models\Navigation::query()
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

// return $notice;

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
    <meta property="og:image" content="/dirosha/{{ $seo->banner_image ?? '/dirosha/uploads/icons/' . $global_setting->site_logo }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $global_setting->website_full_address ?? '' }}">
    <meta property="twitter:title" content="{{ $seo->page_title ?? $global_setting->page_title }}">
    <meta property="twitter:description" content="{{ $seo->page_description ?? $global_setting->page_description }}">
    <meta property="twitter:image"
        content="{{ $seo->banner_image ?? '/dirosha/uploads/icons/' . $global_setting->site_logo }}">


    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Barlow:400,600%7COpen+Sans:400,400i,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="/dirosha/website/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/dirosha/website/css/font-icons.css" />
    <link rel="stylesheet" href="/dirosha/website/revolution/css/settings.css" />
    <link rel="stylesheet" href="/dirosha/website/css/style.css" />

    <!-- Favicons -->
    {{-- <link rel="shortcut icon" href="images/favicon.png"> --}}
    <link rel="shortcut icon" href="{{ '/dirosha/uploads/icons/' . $global_setting->favicon }}" type="image/png">

    <link rel="stylesheet" href='https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css'>

</head>

<body>

    <!-- Preloader -->
    {{-- <div class="loader-mask">
		<div class="loader">
			"Loading..."
		</div>
	</div> --}}

    <main class="main-wrapper">

        <!-- Navigation -->
        <header class="nav">
            <div class="nav__holder nav--sticky">
                <div class="container-fluid nav__container nav__container--side-padding">
                    <div class="flex-parent">

                        <div class="nav__header">
                            <!-- Logo -->
                            <a href="/dirosha/" class="logo-container flex-child">
                                <img class="logo" src={{ '/dirosha/uploads/icons/' . $global_setting->site_logo }}
                                    alt="logo">
                            </a>

                            <!-- Mobile toggle -->
                            <button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse"
                                data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="nav__icon-toggle-bar"></span>
                                <span class="nav__icon-toggle-bar"></span>
                                <span class="nav__icon-toggle-bar"></span>
                            </button>
                        </div>

                        <!-- Navbar -->
                        <nav id="navbar-collapse" class="nav__wrap collapse navbar-collapse">
                            <ul class="nav__menu">
                                <li class="active">
                                    <a href="/dirosha/">Home</a>
                                </li>

                                @foreach ($menus as $menu)
                                    @php $submenus = $menu->childs; @endphp
                                    <li class="nav__dropdown" @if (isset($slug_detail) && $slug_detail->nav_name == $menu->nav_name)  @endif><a
                                            aria-haspopup="true"
                                            @if ($submenus->count() > 0) href="#" @else href="{{ route('category', $menu->nav_name) }}" @endif>{{ $menu->caption }}</a>
                                        <i class="ui-arrow-down nav__dropdown-trigger" role="button"
                                            aria-haspopup="true" aria-expanded="false"></i>
                                        @if ($submenus->count() > 0)
                                            <ul class="nav__dropdown-menu">
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
                                    <a href="/dirosha/contact">Contact us</a>
                                </li>
                            </ul> <!-- end menu -->
                            <div class="nav__phone nav__phone--mobile d-lg-none">
                                <span class="nav__phone-text">Call us:</span>
                                <a href="tel:{{ $global_setting->phone }}"
                                    class="nav__phone-number">+{{ $global_setting->phone }}</a>
                            </div>

                            <div class="nav__socials nav__socials--mobile d-lg-none">
                                <div class="socials">
                                    <a href="{{ $global_setting->twitter ?? '#' }}" class="social social-twitter"
                                    aria-label="twitter" title="twitter" target="_blank"><i
                                        class="ui-twitter"></i></a>
                                <a href="{{ $global_setting->facebook ?? '#' }}" class="social social-facebook"
                                    aria-label="facebook" title="facebook" target="_blank"><i
                                        class="ui-facebook"></i></a>
                                <a href="{{ $global_setting->linkedin ?? '#' }}" class="social social-youtube"
                                    aria-label="youtube" title="google plus" target="_blank"><i
                                        class="ui-youtube"></i></a>
                                    {{-- <a href="#" class="social social-instagram" aria-label="instagram"
                                        title="instagram" target="_blank"><i class="ui-instagram"></i></a> --}}
                                </div>
                            </div>
                        </nav> <!-- end nav-wrap -->

                        <div class="nav__phone nav--align-right d-none d-lg-block">
                            <span class="nav__phone-text"><i class="top-bar__icon ui-phone"></i></span>
                            <a href="tel:{{ $global_setting->phone }}"
                                class="nav__phone-number">{{ $global_setting->phone }}</a>
                        </div>
                        <div class="nav__mail d-none d-lg-block">
                            <span class="nav__mail-text"><i class="top-bar__icon ui-email"></i></span>
                            <a href="mailto:  {{ $global_setting->site_email }}" class="nav__mail__id">
                                {{ $global_setting->site_email }}</a>
                        </div>

                        <div class="nav__socials d-none d-lg-block">
                            <div class="socials">
                                <a href="{{ $global_setting->twitter ?? '#' }}" class="social social-twitter"
                                    aria-label="twitter" title="twitter" target="_blank"><i
                                        class="ui-twitter"></i></a>
                                <a href="{{ $global_setting->facebook ?? '#' }}" class="social social-facebook"
                                    aria-label="facebook" title="facebook" target="_blank"><i
                                        class="ui-facebook"></i></a>
                                <a href="{{ $global_setting->linkedin ?? '#' }}" class="social social-youtube"
                                    aria-label="youtube" title="google plus" target="_blank"><i
                                        class="ui-youtube"></i></a>
                                {{-- <a href="#" class="social social-instagram" aria-label="instagram"
                                    title="instagram" target="_blank"><i class="ui-instagram"></i></a> --}}
                            </div>
                        </div>
                    </div> <!-- end flex-parent -->
                </div> <!-- end container -->

            </div>
        </header> <!-- end navigation -->







        <div class="content-wrapper content-wrapper--boxed oh">

            <div class="rev-offset"></div>




            @yield('content')



        </div>



        <footer class="footer bg-dark-overlay" style="background-image: url(/website/images/1.jpg);">
            <div class="container-fluid">
                <div class="footer__widgets">
                    <div class="row">

                        <div class="col-lg-3 col-md-3">
                            <div class="widget widget-about-us">
                                <!-- Logo -->
                                <a href="/dirosha/" class="logo-container flex-child">
                                    <img class="logo" src={{ '/dirosha/uploads/icons/' . $global_setting->site_logo }} alt="logo">
                                </a>
                            </div>
                        </div> <!-- end logo -->

                        <div class="col-lg-2 col-md-3">
                            <div class="widget widget_nav_menu">
                                <ul>
                                    <li> <a href="/dirosha/">Home</a>

                                <li> <a href="/dirosha/About-us">Video Galery</a>

                               
                                <li> <a href="/dirosha/news&events">News & Events</a>
                               
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <div class="widget widget_nav_menu">
                            <ul>
                                <li> <a href="/dirosha/gallery/photo-gallery">Image Gallery</a>

                                <li> <a href="/dirosha/gallery/video-gallery">Video Galery</a>

                               
                                <li> <a href="/dirosha/contact">Contact</a>
                            </li>
                            </ul>

                            
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <div class="widget widget_nav_menu">
                            <ul>
                                <li><a href="#" target="_blank">  {{ $global_setting->other }}</a></li>
                                <li><a href="tel:{{  $global_setting->phone }}">{{  $global_setting->phone }}</a></li>
                                <li><a href="mailto:{{ $global_setting->site_email }}">{{ $global_setting->site_email }}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="widget">
                            <div class="socials">
                                 <a href="{{ $global_setting->twitter ?? '#' }}" class="social social-twitter"
                                    aria-label="twitter" title="twitter" target="_blank"><i
                                        class="ui-twitter"></i></a>
                                <a href="{{ $global_setting->facebook ?? '#' }}" class="social social-facebook"
                                    aria-label="facebook" title="facebook" target="_blank"><i
                                        class="ui-facebook"></i></a>
                                <a href="{{ $global_setting->linkedin ?? '#' }}" class="social social-youtube"
                                    aria-label="youtube" title="google plus" target="_blank"><i
                                        class="ui-youtube"></i></a>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end container -->

        <div class="footer__bottom">
            <div class="container-fluid text-right text-md-center">
                <span class="copyright">
                    © 2022 Dirosha Contrade Pvt. Ltd. - All Rights Reserved, Developed By <a
                        href="http://radiantnepal.com/" target="_blank">Radiant Infotech Nepal</a>
                </span>
            </div>
        </div> <!-- end footer bottom -->
    </footer>









    <!-- jQuery Scripts -->
    <script src="/dirosha/website/js/jquery.min.js"></script>
    <script src="/dirosha/website/js/bootstrap.min.js"></script>
    <script src="/dirosha/website/js/plugins.js"></script>
    <script src="/dirosha/website/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="/dirosha/website/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/dirosha/website/js/rev-slider.js"></script>
    <script src="/dirosha/website/js/scripts.js"></script>


    <!-- Rev Slider Offline Scripts -->
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="/dirosha/website/revolution/js/extensions/revolution.extension.parallax.min.js"></script>






    <!-- gllery js -->
    <script src="/dirosha/website/js/gallery/picturefill.min.js"></script>
    <script src="/dirosha/website/js/gallery/lightgallery.js"></script>
    <script src="/dirosha/website/js/gallery/lg-pager.js"></script>
    <script src="/dirosha/website/js/gallery/lg-autoplay.js"></script>
    <script src="/dirosha/website/js/gallery/lg-fullscreen.js"></script>
    <script src="/dirosha/website/js/gallery/lg-zoom.js"></script>
    <script src="/dirosha/website/js/gallery/lg-hash.js"></script>
    <script src="/dirosha/website/js/gallery/lg-share.js"></script>
    <!--End gllery js -->

    <script src="/dirosha/website/js/scripts.js"></script>

    <script>
        lightGallery(document.getElementById('lightgallery'));

        $(function() {
            var selectedClass = "";
            $(".filter").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#lightgallery").fadeTo(100, 0.1);
                $("#lightgallery div").not("." + selectedClass).fadeOut().removeClass('animation');
                setTimeout(function() {
                    $("." + selectedClass).fadeIn().addClass('animation');
                    $("#lightgallery").fadeTo(300, 1);
                }, 300);
            });
        });
    </script>















    <script src="//dirosha/cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (Session::has('contact'))
        <script>
            Swal.fire(
                'Thanks!',
                "Form submitted sucessfully!!!",
                'success'
            )
        </script>
    @endif





</body>

</html>
