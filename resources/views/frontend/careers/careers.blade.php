@extends('frontend.layout.header') 
@section('css')
<link href="{{asset('/frontend/css/hotel.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<section class="breadcrumb-outer text-center">
   <div class="container">
      <div class="breadcrumb-content">
         <h2>Careers</h2>
         <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Careers</li>
            </ul>
         </nav>
      </div>
   </div>
   <div class="section-overlay"></div>
</section>
<section class="popular-packages package-inner pad-bottom-80">
    <div class="container">
        <div class="section-title">
            <h2>Jobs At <span>Maxhypechannel</span></h2>
        </div>
        @if(count($data['results'])>0)
        @foreach($data['results'] as $key=>$value)
            <div class="row">
                <div class="col-lg-12">
                    <div class="room-main">
                        <div class="room-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="room-content">
                                        <h3>{{$value->title}}</h3>
                                        <p class="mar-0">{{Str::words(strip_tags($value->description), 1000)}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3 mt-4">
                                    <div class="fw-btns">
                                        <div>
                                        <b class="font-weight-bold">Posted Date</b> : <span class="job-details">{{$value->created_at->format('Y.m.d')}}</span><br>
                                       <b class="font-weight-bold">Job Country</b> : <span class="job-details">{{$value->country}}</span><br>
                                       <b class="font-weight-bold">Job City</b> : <span class="job-details">{{$value->city}}</span><br>
                                        <b class="font-weight-bold">Qualifications</b> : <span class="job-details">{{$value->education}}</span><br>
                                        <b class="font-weight-bold">Salary Range</b> : <span class="career-details">{{$value->salary}}</span>
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-md-3 mb-3 mt-4">
                                    <div class="fw-btns">
                                        <div>
                                            <b class="font-weight-bold">Total Positions</b> : <span class="career-details">{{$value->total_position}}</span><br>
                                            <b class="font-weight-bold">Last Date To Apply</b> : <span class="career-details">{{$value->apply_last_date}}</span></p>
                                        </div>
                                        <a href="{{url('/apply_now/'.$value->id)}}" class="btn-red" tabindex="0">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       @endforeach
        @else
         <h4 class="text-center">No Data Available</h4>
        @endif
        </div>
    </section>
    <!-- Popular Packages Ends -->
@endsection
@section('js')
<script src="{{asset('/frontend/js/rangeslider.js')}}"></script>
@endsection