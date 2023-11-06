@extends('frontend.layout.header') 
@section('css')
@endsection
@section('content')
<section class="breadcrumb-outer text-center">
   <div class="container">
      <div class="breadcrumb-content">
         <h2>Testimonials</h2>
         <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
            </ul>
         </nav>
      </div>
   </div>
   <div class="section-overlay"></div>
</section>
<section class="testimonials">
   <div class="section-title text-center">
      <h2>Best Rated Businesses</h2>
      <div class="section-icon section-icon-white">
         <i class="flaticon-diamond"></i>
      </div>
   </div>
   <!-- Paradise Slider -->
   <div id="testimonial_094" class="carousel slide testimonial_094_indicators thumb_scroll_x swipe_x ps_easeOutSine" data-ride="carousel" data-pause="hover" data-interval="3000" data-duration="1000">
      <!-- Indicators -->
      <ol class="carousel-indicators">
         <li data-target="#testimonial_094" data-slide-to="0" class="active">
            <img src="{{asset('/frontend/images')}}/testemonial1.jpg" alt="testimonial_094_01"> <!-- 1st Image -->
         </li>
         <li data-target="#testimonial_094" data-slide-to="1">
            <img src="{{asset('/frontend/images')}}/testemonial2.jpg" alt="testimonial_094_02"> <!-- 2nd Image -->
         </li>
         <li data-target="#testimonial_094" data-slide-to="2">
            <img src="{{asset('/frontend/images')}}/testemonial3.jpg" alt="testimonial_094_03"> <!-- 3rd Image -->
         </li>
         <li data-target="#testimonial_094" data-slide-to="3">
            <img src="{{asset('/frontend/images')}}/testemonial4.jpg" alt="testimonial_094_04"> <!-- 4th Image -->
         </li>
      </ol>
      <!-- Wrapper For Slides -->
      <div class="carousel-inner" role="listbox">
         <!-- First Slide -->
         <div class="carousel-item active">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Amazing ! This is one of the best platform for your's businesses,I recomend this for all business owner to join it & promote your business.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
               </div>
               <h5><a href="#">Oliver Jake</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of First Slide -->
         <!-- Second Slide -->
         <div class="carousel-item">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Mind Blowing ! One of the best platform to promote your business in very short time also best place for businesses.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
               </div>
               <h5><a href="#">James Charlie</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of Second Slide -->
         <!-- Third Slide -->
         <div class="carousel-item">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Maxhype is best place to provide different businesses for customers to easily purchase or reseve the business product.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
               </div>
               <h5><a href="#">Harry Callum</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of Third Slide -->
         <!-- Fourth Slide -->
         <div class="carousel-item">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Surely, This is amazing platform to provide businesses in different location for customers and also to expend the business scope to purchase or reseve the business product from the different location.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
               </div>
               <h5><a href="#">Thomas Joe</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of Fourth Slide -->
         <!-- Fifth Slide -->
       
         <!-- /item -->
         <!-- End of Fifth Slide -->
      </div>
      <!-- End of Wrapper For Slides -->
   </div>
   <!-- End Paradise Slider -->
</section>
@endsection
@section('js')
@endsection