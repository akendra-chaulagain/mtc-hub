@extends('layouts.master')

@push('title')
    Home
@endpush

@section('content')
    @include('website.main_slider')
    @include('website.home-about_us')
    @include('website.best-product')
    @include('website.testomonial')

    @include('website.home-news')
    @include('website.company_partner')

    



    {{-- @include('website.home-about_us')
    @include('website.home-courses')
    @include('website.message')
    @include('website.testomonials')
    @include('website.company_partner') --}}
@endsection
