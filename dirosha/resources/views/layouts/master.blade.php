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

// return $notice;

@endphp










<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home | Dirosa Contrade Pvt. Ltd.</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Barlow:400,600%7COpen+Sans:400,400i,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="/website/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/website/css/font-icons.css" />
    <link rel="stylesheet" href="/website/revolution/css/settings.css" />
    <link rel="stylesheet" href="/website/css/style.css" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">

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
                            <a href="index.html" class="logo-container flex-child">
                                <img class="logo" src="images/logo.png" alt="logo">
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
                                    <a href="/">Home</a>
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
                                    <a href="/contact">Contact Us</a>
                                </li>
                            </ul> <!-- end menu -->
                            <div class="nav__phone nav__phone--mobile d-lg-none">
                                <span class="nav__phone-text">Call us:</span>
                                <a href="tel:+9779851081958" class="nav__phone-number">+977-9851081958</a>
                            </div>

                            <div class="nav__socials nav__socials--mobile d-lg-none">
                                <div class="socials">
                                    <a href="#" class="social social-twitter" aria-label="twitter" title="twitter"
                                        target="_blank"><i class="ui-twitter"></i></a>
                                    <a href="#" class="social social-facebook" aria-label="facebook"
                                        title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                                    <a href="#" class="social social-youtube" aria-label="youtube"
                                        title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                                    <a href="#" class="social social-instagram" aria-label="instagram"
                                        title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                                </div>
                            </div>
                        </nav> <!-- end nav-wrap -->

                        <div class="nav__phone nav--align-right d-none d-lg-block">
                            <span class="nav__phone-text"><i class="top-bar__icon ui-phone"></i></span>
                            <a href="tel:+9779851081958" class="nav__phone-number">+977-9851081958</a>
                        </div>
                        <div class="nav__mail d-none d-lg-block">
                            <span class="nav__mail-text"><i class="top-bar__icon ui-email"></i></span>
                            <a href="mailto:diroshacontrade@gmail.com"
                                class="nav__mail__id">diroshacontrade@gmail.com</a>
                        </div>

                        <div class="nav__socials d-none d-lg-block">
                            <div class="socials">
                                <a href="#" class="social social-twitter" aria-label="twitter" title="twitter"
                                    target="_blank"><i class="ui-twitter"></i></a>
                                <a href="#" class="social social-facebook" aria-label="facebook"
                                    title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                                <a href="#" class="social social-youtube" aria-label="youtube"
                                    title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                                <a href="#" class="social social-instagram" aria-label="instagram"
                                    title="instagram" target="_blank"><i class="ui-instagram"></i></a>
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









        <!-- jQuery Scripts -->
        <script src="/website/js/jquery.min.js"></script>
        <script src="/website/js/bootstrap.min.js"></script>
        <script src="/website/js/plugins.js"></script>
        <script src="/website/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="/website/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="/website/js/rev-slider.js"></script>
        <script src="/website/js/scripts.js"></script>


        <!-- Rev Slider Offline Scripts -->
        <script src="/website/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="/website/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="/website/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="/website/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="/website/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="/website/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="/website/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="/website/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="/website/revolution/js/extensions/revolution.extension.parallax.min.js"></script>








</body>

</html>
