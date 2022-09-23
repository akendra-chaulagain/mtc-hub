@extends('layouts.master')
@push('title')
    Contact us
@endpush

@section('content')
    <!-- Page Title -->
    <section class="page-title bg-dark-overlay text-center" style="background-image: url(/dirosha/website/images/portfolio.jpg);">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">Contact</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="/dirosha/" class="breadcrumbs__url">Home</a>
                    </li>
                    <li class="breadcrumbs__item breadcrumbs__item--current">
                        Contact Us
                    </li>
                </ul>
            </div>
        </div>
    </section> <!-- end page title -->

    <!-- Contact -->
    <section class="section-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact">
                        <h5 class="contact__title">Dirosa Office</h5>
                        <ul class="contact__items">
                            <li class="contact__item">
                                <span class="contact__item-label">Registered Address:</span>
                                <address>{{$global_setting->website_full_address}}</address>
                            </li>
                            <li class="contact__item">
                                <span class="contact__item-label">Corporate Address:</span>
                                <address>{{$global_setting->address_ne}}</address>
                            </li>
                            <li class="contact__item">
                                <span class="contact__item-label">Phone: </span>
                                <a href="tel:{{  $global_setting->phone }}">{{  $global_setting->phone }}</a> , <a href="tel:{{  $global_setting->phone_ne }}">{{  $global_setting->phone_ne }}</a>
                            </li>
                            <li class="contact__item">
                                <span class="contact__item-label">Email: </span>
                                <a href="mailto:{{ $global_setting->site_email }}">{{ $global_setting->site_email }}</a>
                            </li>
                        </ul>

                        <h5 class="contact__title mt-40">Follow Us</h5>
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
                <div class="col-lg-7 offset-lg-1">
                    <h2 class="section-title">Get a Free Quote</h2>
                    <p class="mb-40">If you have any question about project, get in touch.</p>
                    <!-- Contact Form -->
                    <form id="contact-form" class="contact-form material" action="{{ route('contactstore') }}"
                        method="POST" autocomplete="on" enctype='multipart/form-data'>
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Name -->
                                <div class="material__form-group form-group">
                                    <input type="text" name="name" id="name" class="form-input material__input"
                                        required="">
                                    <label for="name" class="material__label">Name
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <span class="material__underline"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Email -->
                                <div class="material__form-group form-group">
                                    <input type="email" name="email" id="email" class="form-input material__input"
                                        required="">
                                    <label for="email" class="material__label">Email
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <span class="material__underline"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Number -->
                                <div class="material__form-group form-group">
                                    <input type="number" name="number" id="number" class="form-input material__input"
                                        required="">
                                    <label for="number" class="material__label">Number
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <span class="material__underline"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Subject -->
                                <div class="material__form-group form-group">
                                    <input type="text" name="apply_for" id="subject"
                                        class="form-input material__input">
                                    <label for="subject" class="material__label">Subject
                                    </label>
                                    <span class="material__underline"></span>
                                </div>
                            </div>
                        </div>

                        <div class="material__form-group form-group">
                            <textarea id="message" name="message" rows="7" class="form-input material__input" required=""></textarea>
                            <label for="message" class="material__label">Message
                                <abbr title="required" class="required">*</abbr>
                            </label>
                            <span class="material__underline"></span>
                        </div>

                        <input type="submit" class="btn btn--lg btn--color btn--button" value="Send Message"
                            id="submit-message">
                        <div id="msg" class="message"></div>
                    </form>
                </div>
            </div>
        </div>
    </section> <!-- end contact -->


    <!-- Google Map -->
    <section class="google-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14127.923625025607!2d85.3227237!3d27.7178758!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf45b721e058e266f!2sNarayanhiti%20Palace%20Museum%20North%20Gate%20Rd%20Bus%20Stop!5e0!3m2!1sen!2snp!4v1659594514104!5m2!1sen!2snp"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>








    </section>
@endsection
