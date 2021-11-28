<section class="deals-on-sale">
   <div class="container">
      <div class="section-title text-center">
         <h2>Deals On Sale</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
         <p>Checkout for new deals near you.Reservation &amp; Booking is fast, easy, and secure.</p>
      </div>
      <div class="row sale-slider slider-button">
      @foreach($data['business'] as $key=>$value)
         <div class="col-md-12">
            <div class="sale-item">
               <div class="sale-image">
                  <img src="{{url(isset($value->dp) ? $value->dp:'')}}" alt="Image" width="432" height="224">
               </div>
               <div class="sale-content">
                  <h3><a href="#">{{$value->name}}</a></h3>
                  <p><i></i>{{$value->country}}</p>
                  <a href="{{asset('business_details/'.$value->id)}}" class="btn-blue btn-red">View More</a>
               </div>
               <div class="sale-tag">
                  <span class="old-price">{{$value->discount}}</span>
               </div>
               <div class="sale-overlay"></div>
            </div>
         </div>
      @endforeach
      </div>
   </div>
</section>