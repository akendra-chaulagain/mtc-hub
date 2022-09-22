@extends('layouts.master')


@push('title')
    Contact
@endpush


@section('content')

    <div class="page-title-area bg_cover"
        style="background-image: url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">Contact</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== CONTACT INFO PART START ======-->

    <section class="contact-info-area">
        <div class="container">
            <div class="contact-info">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="write-massage-area">
                            <div class="write-massage-content">
                                <div class="write-massage-title">
                                    <h3 class="title">Feel free to get in touch with us.</h3>
                                </div>
                                <div class="write-massage-input">
                                    <form action="{{ route('contactstore') }}" method="POST" autocomplete="on"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-box mt-10">
                                                    <input type="text" name="name" placeholder="Name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box mt-10">
                                                    <input type="text" name="email" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box mt-10">
                                                    <input type="number" name="number" placeholder="Phone" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box mt-10">
                                                    <input type="text" name="apply_for" placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="input-box mt-10">
                                                    <textarea name="message" id="#" cols="30" rows="10" placeholder="Message"></textarea>
                                                    <button class="main-btn main-btn-2">Send message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-info-content">
                            <h3 class="title">Contact info.</h3>
                            <ul>
                                <li><i class="flaticon-placeholder"></i> <strong>Registered Address:</strong>  {{ $global_setting->website_full_address }}
                                        </li>
                                <li><i class="flaticon-placeholder"></i> <strong>Corporate Address:</strong> {{ $global_setting->address_ne }}</li>

                                <li><i class="flaticon-message"></i> <a href="{{ $global_setting->site_email }}">{{ $global_setting->site_email }}</a> 
                                    {{-- <a href="mailto:mtchub@gmail.com"> mtchub@gmail.com</a> --}}
                                </li>

                                <li><i class="flaticon-phone-call"></i> <a href="{{ $global_setting->phone }}">{{ $global_setting->phone }}</a> / <a
                                        href="tel:{{ $global_setting->phone_ne }}">{{ $global_setting->phone_ne }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        




    </section>
@endsection
