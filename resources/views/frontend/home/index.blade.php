@extends('frontend.layout.header') 
@section('content')
<!-- Banner start -->
@include('frontend.home.banners')
<!-- Banner Ends -->
<!-- Deals -->
@include('frontend.home.deals')

<!-- Deals Ends -->
<!-- Top Destinations -->
@include('frontend.home.destinations')

<!-- Top Destination Ends -->
<!-- Trip Ad -->
@include('frontend.home.tripsAds')

<!-- Trip Ad Ends -->
<!-- Deals On Sale -->
@include('frontend.home.dealsOnSales')

<!-- Deals On Sale Ends -->
<!-- Testimonials -->
@include('frontend.home.testimonials')

<!-- Testimonials Ends -->
<!-- Countdown -->
@include('frontend.home.countdown')

<!-- Countdown Ends -->
<!-- Affiliates -->
@include('frontend.home.affiliates')

<!-- Affiliates Ends -->
@endsection