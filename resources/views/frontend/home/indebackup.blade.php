@extends('frontend.layout.header') 
@section('content')
<!-- Banner start -->
<section class="swiper-banner">
   <div class="slider">
      <div class="swiper-container">
         <div class="swiper-wrapper">
            <div class="swiper-slide"
               style="background-image:url({{url('/frontend')}}/images/slider/full-slide-4.jpg)">
               <div class="swiper-content" data-animation="animated fadeInDown">
                  <h2>Clubs PURCHASE BOTTLE SERVICES TO THE BEST CLUBS,PUBS,EVENTS AND LOUNGES</h2>
                  <h1>Clubs</h1>
                  <a href="tour-detail.html" class="btn-blue btn-red">View Our Clubs</a>
               </div>
            </div>
            <div class="swiper-slide" style="background-image:url({{url('/frontend')}}/images/slider/img_3.jpg)">
               <div class="swiper-content" data-animation="animated fadeInRight">
                  <h2>RIGID HORSES</h2>
                  <h1>Race Tracks</h1>
                  <a href="tour-detail.html" class="btn-blue btn-red">View Our HORSES</a>
               </div>
            </div>
            <div class="swiper-slide" style="background-image:url({{url('/frontend')}}/images/slider/img_6.jpg)">
               <div class="swiper-content" data-animation="animated fadeInUp">
                  <h2>MACHINE LOVERS</h2>
                  <h1>Luxury Cars</h1>
                  <a href="tour-detail.html" class="btn-blue btn-red">View Our Cars</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="overlay"></div>
   </div>
</section>
<!-- Banner Ends -->
<!-- Popular Packages --> 
<section class="popular-packages">
   <div class="container">
      <div class="section-title text-center mt-4">
         <h2>Popular Packages</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Duis aute irure dolor in reprehenderit..</p>
      </div>
      <div class="row package-slider slider-button">
         <div class="col-lg-4">
            <div class="package-item">
               <div class="package-image">
                  <img src="{{url('/frontend/images')}}/package1.jpg" alt="Image">
                  <div class="package-price">
                     <div class="deal-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                     </div>
                     <p><span>$659</span> / PER </p>
                  </div>
               </div>
               <div class="package-content">
                  <h3>Surfing at Goa, India</h3>
                  <p class="package-days"><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                  <div class="package-info">
                     <a href="tour-detail.html" class="btn-blue btn-red">View more details</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="package-item">
               <div class="package-image">
                  <img src="{{url('/frontend/images')}}/package2.jpg" alt="Image">
                  <div class="package-price">
                     <div class="deal-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                     </div>
                     <p><span>$659</span> / PER </p>
                  </div>
               </div>
               <div class="package-content">
                  <h3>Hot Air Ballooning</h3>
                  <p class="package-days"><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                  <div class="package-info">
                     <a href="tour-detail.html" class="btn-blue btn-red">View more details</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="package-item">
               <div class="package-image">
                  <img src="{{url('/frontend/images')}}/package3.jpg" alt="Image">
                  <div class="package-price">
                     <div class="deal-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                     </div>
                     <p><span>$659</span> / PER </p>
                  </div>
               </div>
               <div class="package-content">
                  <h3>Lake Tohoe Advanture</h3>
                  <p class="package-days"><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                  <div class="package-info">
                     <a href="tour-detail.html" class="btn-blue btn-red">View more details</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="package-item">
               <div class="package-image">
                  <img src="{{url('/frontend/images')}}/package1.jpg" alt="Image">
                  <div class="package-price">
                     <div class="deal-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                     </div>
                     <p><span>$659</span> / PER </p>
                  </div>
               </div>
               <div class="package-content">
                  <h3>Surfing at Goa, India</h3>
                  <p class="package-days"><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                  <div class="package-info">
                     <a href="tour-detail.html" class="btn-blue btn-red">View more details</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="package-item">
               <div class="package-image">
                  <img src="{{url('/frontend/images')}}/package2.jpg" alt="Image">
                  <div class="package-price">
                     <div class="deal-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                     </div>
                     <p><span>$659</span> / PER </p>
                  </div>
               </div>
               <div class="package-content">
                  <h3>Hot Air Ballooning</h3>
                  <p class="package-days"><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                  <div class="package-info">
                     <a href="tour-detail.html" class="btn-blue btn-red">View more details</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="package-item">
               <div class="package-image">
                  <img src="{{url('/frontend/images')}}/package3.jpg" alt="Image">
                  <div class="package-price">
                     <div class="deal-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-o"></span>
                        <span class="fa fa-star-o"></span>
                     </div>
                     <p><span>$659</span> / PER </p>
                  </div>
               </div>
               <div class="package-content">
                  <h3>Lake Tohoe Adventure</h3>
                  <p class="package-days"><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                  <div class="package-info">
                     <a href="tour-detail.html" class="btn-blue btn-red">View more details</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Popular Packages Ends -->
<!-- Deals -->
<section class="deals">
   <div class="container">
      <div class="section-title section-title-white text-center">
         <h2>Last Minute Deals</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Duis aute irure dolor in reprehenderit..</p>
      </div>
      <div class="deals-outer">
         <div class="row deals-slider slider-button">
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{url('/frontend/images')}}/deal1.jpg" alt="Image">
                        <span class="deal-price">$8600</span>
                     </div>
                     <div class="deal-content">
                        <div class="deal-rating">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star-o"></span>
                           <span class="fa fa-star-o"></span>
                        </div>
                        <h3>Paris and Bordeaus</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{url('/frontend/images')}}/deal2.jpg" alt="Image">
                        <span class="deal-price">$8600</span>
                     </div>
                     <div class="deal-content">
                        <div class="deal-rating">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star-o"></span>
                           <span class="fa fa-star-o"></span>
                        </div>
                        <h3>Paris and Bordeaus</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{url('/frontend/images')}}/deal3.jpg" alt="Image">
                        <span class="deal-price">$8600</span>
                     </div>
                     <div class="deal-content">
                        <div class="deal-rating">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star-o"></span>
                           <span class="fa fa-star-o"></span>
                        </div>
                        <h3>Paris and Bordeaus</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{url('/frontend/images')}}/deal4.jpg" alt="Image">
                        <span class="deal-price">$8600</span>
                     </div>
                     <div class="deal-content">
                        <div class="deal-rating">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star-o"></span>
                           <span class="fa fa-star-o"></span>
                        </div>
                        <h3>Paris and Bordeaus</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{url('/frontend/images')}}/deal2.jpg" alt="Image">
                        <span class="deal-price">$8600</span>
                     </div>
                     <div class="deal-content">
                        <div class="deal-rating">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star-o"></span>
                           <span class="fa fa-star-o"></span>
                        </div>
                        <h3>Paris and Bordeaus</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{url('/frontend/images')}}/deal1.jpg" alt="Image">
                        <span class="deal-price">$8600</span>
                     </div>
                     <div class="deal-content">
                        <div class="deal-rating">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star-o"></span>
                           <span class="fa fa-star-o"></span>
                        </div>
                        <h3>Paris and Bordeaus</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{url('/frontend/images')}}/deal4.jpg" alt="Image">
                        <span class="deal-price">$8600</span>
                     </div>
                     <div class="deal-content">
                        <div class="deal-rating">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star-o"></span>
                           <span class="fa fa-star-o"></span>
                        </div>
                        <h3>Paris and Bordeaus</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{url('/frontend/images')}}/deal3.jpg" alt="Image">
                        <span class="deal-price">$8600</span>
                     </div>
                     <div class="deal-content">
                        <div class="deal-rating">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star-o"></span>
                           <span class="fa fa-star-o"></span>
                        </div>
                        <h3>Paris and Bordeaus</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="section-overlay"></div>
</section>
<!-- Deals Ends -->
<!-- Top Destinations -->
<section class="top-destinations">
   <div class="container">
      <div class="section-title text-center">
         <h2>Top Businesess</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Duis aute irure dolor in reprehenderit..</p>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-4">
            <div class="top-destination-item">
               <img class="img-responsive" src="{{url('/frontend/images')}}/deal1.jpg" alt="Image">
               <div class="overlay">
                  <h2><a href="tour-detail.html">Bahamas</a></h2>
                  <p>Plan Your Tour to Bahamas With Us.</p>
               </div>
            </div>
            <div class="top-destination-item">
               <img class="img-responsive" src="{{url('/frontend/images')}}/deal2.jpg" alt="Image">
               <div class="overlay">
                  <h2><a href="tour-detail.html">Italy</a></h2>
                  <p>Plan Your Tour to Bahamas With Us.</p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4">
            <div class="top-destination-item destination-margin">
               <img class="img-responsive" src="{{url('/frontend/images')}}/deal5.jpg" alt="Image">
               <div class="overlay overlay-full">
                  <h2><a href="tour-detail.html">Egypt</a></h2>
                  <p>Plan Your Tour to Bahamas With Us.</p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4">
            <div class="top-destination-item">
               <img class="img-responsive" src="{{url('/frontend/images')}}/deal3.jpg" alt="Image">
               <div class="overlay">
                  <h2><a href="tour-detail.html">Nepal</a></h2>
                  <p>Plan Your Tour to Bahamas With Us.</p>
               </div>
            </div>
            <div class="top-destination-item">
               <img class="img-responsive" src="{{url('/frontend/images')}}/deal4.jpg" alt="Image">
               <div class="overlay">
                  <h2><a href="tour-detail.html">Thailand</a></h2>
                  <p>Plan Your Tour to Bahamas With Us.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Top Destination Ends -->
<!-- Trip Ad -->
<section class="trip-ad">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="trip-ad-content">
               <div class="ad-title">
                  <h2>Explore The <span>Thailand Trip</span></h2>
               </div>
               <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismody tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim adi minim veniam, qu nostrud exerci tation dolore magna aliquam erat volutpat.</p>
               <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismody tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim adi minim veniam, qu nostrud exerci tation dolore magna aliquam erat volutpat.</p>
               <div class="trip-ad-btn">
                  <a href="tour-detail.html" class="btn-blue btn-red">BOOK NOW</a>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="ad-price">
               <div class="ad-price-inner">
                  <span>Starting at <span class="rate">$300</span></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Trip Ad Ends -->
<!-- Deals On Sale -->
<section class="deals-on-sale">
   <div class="container">
      <div class="section-title text-center">
         <h2>Deals On Sale</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Duis aute irure dolor in reprehenderit..</p>
      </div>
      <div class="row sale-slider slider-button">
         <div class="col-md-12">
            <div class="sale-item">
               <div class="sale-image">
                  <img src="{{url('/frontend/images')}}/sale1.jpg" alt="Image">
               </div>
               <div class="sale-content">
                  <div class="sale-review">
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                  </div>
                  <h3><a href="#">Surfing at Bahamas</a></h3>
                  <p><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                  <a href="tour-detail.html" class="btn-blue btn-red">View More</a>
               </div>
               <div class="sale-tag">
                  <span class="old-price">$1449</span>
                  <span class="new-price"> $900</span>
               </div>
               <div class="sale-overlay"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="sale-item">
               <div class="sale-image">
                  <img src="{{url('/frontend/images')}}/sale2.jpg" alt="Image">
               </div>
               <div class="sale-content">
                  <div class="sale-review">
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                  </div>
                  <h3><a href="#">Surfing at Bahamas</a></h3>
                  <p><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                  <a href="tour-detail.html" class="btn-blue btn-red">View More</a>
               </div>
               <div class="sale-tag">
                  <span class="old-price">$1449</span>
                  <span class="new-price"> $900</span>
               </div>
               <div class="sale-overlay"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="sale-item">
               <div class="sale-image">
                  <img src="{{url('/frontend/images')}}/sale3.jpg" alt="Image">
               </div>
               <div class="sale-content">
                  <div class="sale-review">
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                  </div>
                  <h3><a href="#">Surfing at Bahamas</a></h3>
                  <p><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                  <a href="tour-detail.html" class="btn-blue btn-red">View More</a>
               </div>
               <div class="sale-tag">
                  <span class="old-price">$1449</span>
                  <span class="new-price"> $900</span>
               </div>
               <div class="sale-overlay"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="sale-item">
               <div class="sale-image">
                  <img src="{{url('/frontend/images')}}/sale4.jpg" alt="Image">
               </div>
               <div class="sale-content">
                  <div class="sale-review">
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                  </div>
                  <h3><a href="#">Surfing at Bahamas</a></h3>
                  <p><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                  <a href="tour-detail.html" class="btn-blue btn-red">View More</a>
               </div>
               <div class="sale-tag">
                  <span class="old-price">$1449</span>
                  <span class="new-price"> $900</span>
               </div>
               <div class="sale-overlay"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="sale-item">
               <div class="sale-image">
                  <img src="{{url('/frontend/images')}}/sale1.jpg" alt="Image">
               </div>
               <div class="sale-content">
                  <div class="sale-review">
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                  </div>
                  <h3><a href="#">Surfing at Bahamas</a></h3>
                  <p><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                  <a href="tour-detail.html" class="btn-blue btn-red">View More</a>
               </div>
               <div class="sale-tag">
                  <span class="old-price">$1449</span>
                  <span class="new-price"> $900</span>
               </div>
               <div class="sale-overlay"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="sale-item">
               <div class="sale-image">
                  <img src="{{url('/frontend/images')}}/sale3.jpg" alt="Image">
               </div>
               <div class="sale-content">
                  <div class="sale-review">
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                  </div>
                  <h3><a href="#">Surfing at Bahamas</a></h3>
                  <p><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                  <a href="tour-detail.html" class="btn-blue btn-red">View More</a>
               </div>
               <div class="sale-tag">
                  <span class="old-price">$1449</span>
                  <span class="new-price"> $900</span>
               </div>
               <div class="sale-overlay"></div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="sale-item">
               <div class="sale-image">
                  <img src="{{url('/frontend/images')}}/sale2.jpg" alt="Image">
               </div>
               <div class="sale-content">
                  <div class="sale-review">
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                  </div>
                  <h3><a href="#">Surfing at Bahamas</a></h3>
                  <p><i class="flaticon-time"></i> 5 days</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                  <a href="tour-detail.html" class="btn-blue btn-red">View More</a>
               </div>
               <div class="sale-tag">
                  <span class="old-price">$1449</span>
                  <span class="new-price"> $900</span>
               </div>
               <div class="sale-overlay"></div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Deals On Sale Ends -->
<!-- Testimonials -->
<section class="testimonials">
   <div class="section-title text-center">
      <h2>Best Rated Travel Agency</h2>
      <div class="section-icon section-icon-white">
         <i class="flaticon-diamond"></i>
      </div>
   </div>
   <!-- Paradise Slider -->
   <div id="testimonial_094" class="carousel slide testimonial_094_indicators thumb_scroll_x swipe_x ps_easeOutSine" data-ride="carousel" data-pause="hover" data-interval="3000" data-duration="1000">
      <!-- Indicators -->
      <ol class="carousel-indicators">
         <li data-target="#testimonial_094" data-slide-to="0" class="active">
            <img src="{{url('/frontend/images')}}/testemonial1.jpg" alt="testimonial_094_01"> <!-- 1st Image -->
         </li>
         <li data-target="#testimonial_094" data-slide-to="1">
            <img src="{{url('/frontend/images')}}/testemonial2.jpg" alt="testimonial_094_02"> <!-- 2nd Image -->
         </li>
         <li data-target="#testimonial_094" data-slide-to="2">
            <img src="{{url('/frontend/images')}}/testemonial3.jpg" alt="testimonial_094_03"> <!-- 3rd Image -->
         </li>
         <li data-target="#testimonial_094" data-slide-to="3">
            <img src="{{url('/frontend/images')}}/testemonial4.jpg" alt="testimonial_094_04"> <!-- 4th Image -->
         </li>
         <li data-target="#testimonial_094" data-slide-to="4">
            <img src="{{url('/frontend/images')}}/testemonial5.jpg" alt="testimonial_094_05"> <!-- 5th Image -->
         </li>
      </ol>
      <!-- Wrapper For Slides -->
      <div class="carousel-inner" role="listbox">
         <!-- First Slide -->
         <div class="carousel-item active">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit am nibh unc varius facilisis eros ed erat in in velit quis arcu ornare laoreet urabitur adipiscing luctus massa nteger ut purus ac augue commodo commodo unc nec mi eu justo tempor consectetuer tiam.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
               </div>
               <h5><a href="#">Susan Doe, Houston</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of First Slide -->
         <!-- Second Slide -->
         <div class="carousel-item">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit am nibh unc varius facilisis eros ed erat in in velit quis arcu ornare laoreet urabitur adipiscing luctus massa nteger ut purus ac augue commodo commodo unc nec mi eu justo tempor consectetuer tiam.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
               </div>
               <h5><a href="#">Susan Doe, Houston</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of Second Slide -->
         <!-- Third Slide -->
         <div class="carousel-item">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit am nibh unc varius facilisis eros ed erat in in velit quis arcu ornare laoreet urabitur adipiscing luctus massa nteger ut purus ac augue commodo commodo unc nec mi eu justo tempor consectetuer tiam.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
               </div>
               <h5><a href="#">Susan Doe, Houston</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of Third Slide -->
         <!-- Fourth Slide -->
         <div class="carousel-item">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit am nibh unc varius facilisis eros ed erat in in velit quis arcu ornare laoreet urabitur adipiscing luctus massa nteger ut purus ac augue commodo commodo unc nec mi eu justo tempor consectetuer tiam.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
               </div>
               <h5><a href="#">Susan Doe, Houston</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of Fourth Slide -->
         <!-- Fifth Slide -->
         <div class="carousel-item">
            <!-- Text Layer -->
            <div class="testimonial_094_slide">
               <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit am nibh unc varius facilisis eros ed erat in in velit quis arcu ornare laoreet urabitur adipiscing luctus massa nteger ut purus ac augue commodo commodo unc nec mi eu justo tempor consectetuer tiam.</p>
               <div class="deal-rating">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
               </div>
               <h5><a href="#">Susan Doe, Houston</a></h5>
            </div>
            <!-- /Text Layer -->
         </div>
         <!-- /item -->
         <!-- End of Fifth Slide -->
      </div>
      <!-- End of Wrapper For Slides -->
   </div>
   <!-- End Paradise Slider -->
</section>
<!-- Testimonials -->
<!-- Countdown -->
<section class="countdown-section">
   <div class="container">
      <div class="countdown-title">
         <h2>Special Tour in May, Discover <span>Thailand</span> for 50 Customers with <span>Discount 30%</span></h2>
         <p>It’s limited seating! Hurry up</p>
      </div>
      <div class="countdown countdown-container">
         <p id="demo"></p>
      </div>
      <!-- /.countdown-wrapper -->
   </div>
   <div class="testimonial-overlay"></div>
</section>
<!-- Countdown Ends -->
<!-- Trusted Partners -->
<section class="trusted-partners">
   <div class="container">
      <div class="row">
         <div class="col-md-3 col-sm-4">
            <div class="partners-title">
               <h3>Our <span>Affiliates</span></h3>
            </div>
         </div>
         <div class="col-md-9 col-sm-8">
            <ul class="partners-logo partners-slider">
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner1.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner2.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner3.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner4.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner5.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner6.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner1.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner2.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner3.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner4.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner5.png" alt="Image"></a></li>
               <li><a href="#"><img src="{{url('/frontend/images')}}/partner6.png" alt="Image"></a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- Trusted Partners Ends -->
@endsection