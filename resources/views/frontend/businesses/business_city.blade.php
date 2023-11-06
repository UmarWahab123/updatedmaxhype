@extends('frontend.layout.header')
@section('css')
<link href="{{asset('/frontend/css/hotel.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
   <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Cities</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cities</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->
    <!-- Popular Packages -->
    <section class="popular-packages pad-bottom-80">
        <div class="container">
            <div class="section-title">
                <h2>Popular <span>Cities</span></h2>
                <p>We provide the facility to link with your neeeded businesses. FInd the most appropriate services to meet your needs.</p>
            </div>
            <div class="row">
                @foreach($data['results'] as $value)
               <div class="col-lg-3 popular-packages">
                <a href="{{url('business_city_detail/'.$value->id)}}">
                    <div class="package-item">
                        <div class="package-content">
                            <h5>{{$value->location_city_name}}</h5>
                        </div>
                    </div>
                   </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Popular Packages Ends -->
@endsection
@section('js')
<script src="{{asset('/frontend/js/rangeslider.js')}}"></script>
@endsection