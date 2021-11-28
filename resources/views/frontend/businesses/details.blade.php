@extends('frontend.layout.header') 
@section('css')
<link href="{{asset('/frontend/css/hotel.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
   <div class="container">
      <div class="breadcrumb-content">
         <h2>{{$data['details']->name}}</h2>
         <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="hotel.html">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Businesses</li>
               <li class="breadcrumb-item active" aria-current="page">{{$data['details']->type}}</li>
               <li class="breadcrumb-item active" aria-current="page">{{$data['details']->name}} Details</li>
            </ul>
         </nav>
      </div>
   </div>
   <div class="section-overlay"></div>
</section>
<!-- BreadCrumb Ends -->
<!-- hotel detail --> 
<section class="main-content detail pad-bottom-80">
   <div class="container">
      <div class="row">
         <div id="content" class="col-lg-8">
            <div class="detail-content content-wrapper">
               <div class="detail-info">
                  <div class="detail-info-content clearfix">
                     <h2>{{$data['details']->name}}</h2>
                     <div class="trip-ad-btn">
                   <a href="{{url('/reservation/'.$data['details']->id.'/'.$data['details']->feature)}}" class="btn-blue btn-red reserve">{{$data['details']->feature}}</a></div>
                  </div>
               </div>
               <div class="gallery detail-box">
                  <!-- Paradise Slider -->
                  <div id="in_th_030" class="carousel slide in_th_brdr_img_030 thumb_scroll_x swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="4000" data-duration="2000">
                     <!-- Indicators -->
                     <ol class="carousel-indicators">
                        <!-- 1st Indicator -->
                   @if(isset($data['details']->images)?$data['details']->images:'')
                   @foreach(json_decode($data['details']->images) as $key=>$row)
                        <li data-target="#in_th_030" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}}">
                           <!-- 1st Indicator Image -->
                           <img src="{{url('/')}}{{isset($row)?$row:''}}" alt="in_th_030_01_sm" />
                        </li>
                   @endforeach
                   @endif
                     </ol>
                     <!-- /Indicators -->


                     <!-- Wrapper For Slides -->
                     <div class="carousel-inner" role="listbox">
                        <!-- First Slide -->
                   @if(isset($data['details']->images)?$data['details']->images:'')
                   @foreach(json_decode($data['details']->images) as $key=>$row)
                        <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                           <!-- Slide Background -->
                           <img src="{{url('/')}}{{isset($row)?$row:''}}" alt="in_th_030_01" />                                        
                        </div>
                   @endforeach
                   @endif
                     </div>
                     <!-- End of Wrapper For Slides -->
                  </div>
                  <!-- End Paradise Slider -->
               </div>


               <div class="description detail-box">
                  <div class="detail-title">
                     <h3>Description</h3>
                  </div>
                  <div class="description-content">
                     <p>{{$data['details']->details}}</p>
                  </div>
               </div>
               <div class="location-map detail-box">
                  <div class="detail-title">
                     <h3>Location Map</h3>
                  </div>
                  <div class="map-frame">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28185.510535377554!2d86.90746548742861!3d27.98811904127681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e854a215bd9ebd%3A0x576dcf806abbab2!2z4KS44KSX4KSw4KSu4KS-4KSl4KS-!5e0!3m2!1sne!2snp!4v1544516755007" style="border:0" allowfullscreen></iframe>
                  </div>
               </div>
            </div>
         </div>
         <div id="sidebar-sticky" class="col-lg-4">
            <aside class="detail-sidebar sidebar-wrapper">
               <div class="sidebar-item">
                  <div class="detail-title">
                     <h3>Related Businesses</h3>
                  </div>
                  <div class="sidebar-content sidebar-slider">
                     @foreach($data['businesses'] as $value)                       
                     <div class="sidebar-package">
                        <div class="sidebar-package-image">
                           <img src="{{url(isset($value->dp) ? $value->dp:'')}}" alt="Images" width="432" height="224">
                        </div>
                        <div class="destination-content sidebar-package-content">
                           <h4><a href="hotel-detail.html">{{$value->name}}</a></h4>
                           <p><i></i>Discount : <span class="bold">{{$value->discount}}</span> </p>
                           <a href="{{url('business_details/'.$value-> id)}}" class="btn-red">View Details</a>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
               <div class="sidebar-item sidebar-helpline">
                  <div class="sidebar-helpline-content">
                     <h3>Any Questions?</h3>
                     <p>If you have any quaries then email or contact us</p>
                     <p><i class="flaticon-phone-call"></i> (012)-345-6789</p>
                     <p><i class="flaticon-mail"></i>info@themaxhype.com</p>
                  </div>
               </div>
            </aside>
         </div>
      </div>
   </div>
</section>
<!-- Hotel Detail Ends -->
@endsection
@section('js')
<script src="{{asset('/frontend/js/rangeslider.js')}}"></script>
@endsection