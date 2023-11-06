@extends('frontend.layout.header')
@section('css')
<link href="{{asset('/frontend/css/hotel.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
   <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>City Business</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">City Business</li>
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
                <h2>Popular City <span>Businesses</span></h2>
                <p>We provide the facility to link with your neeeded businesses. FInd the most appropriate services to meet your needs.</p>
            </div>
            <div class="row">
                @if(count($data['results'])>0)
                @foreach($data['results'] as $value)
               <div class="col-md-4">
                <a href="{{url('business_details/'.$value->id)}}">
                    <div class="package-item">
                        <img src="{{url(isset($value->dp) ? $value->dp:'')}}" alt="Image" width="432" height="224">
                        <div class="package-content">
                            <h5>Discount : <span>{{$value->discount}}</span> / PER </h5>
                            <h3><a href="{{url('business_details/'.$value->id)}}">{{$value->name}}</a></h3>
                            <h5><span>Country :</span>&nbsp {{isset($value->countries->location_country_name) ? $value->countries->location_country_name : ''}}</h5>
                            <h5><span>City :</span>&nbsp {{isset($value->cities->   location_city_name) ? $value->cities->location_city_name : ''}}</h5>
                            <h5><span>Zipcode :</span> {{$value->postal_code}}</h5>
                            <p>{{Str::words(strip_tags($value->details), 15)}}</p>
                        </div>
                    </div>
                   </a>
                </div>
                @endforeach
                @else
                <h2>Data Not Found</h2>
                @endif
            </div>
        </div>
    </section>
    <!-- Popular Packages Ends -->
@endsection
@section('js')
<script src="{{asset('/frontend/js/rangeslider.js')}}"></script>
@endsection