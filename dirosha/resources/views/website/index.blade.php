@extends('layouts.master')

@push('title')
    Home
@endpush

@section('content')
    @include('website.main_slider')
    @include('website.home-services')
    @include('website.home-about_us')
    {{-- @include('website.home-about_us')
    @include('website.best-product')
    @include('website.testomonial')

    @include('website.home-news')
    @include('website.company_partner') --}}

    



@endsection
