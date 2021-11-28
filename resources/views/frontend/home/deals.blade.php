<section class="deals">
   <div class="container">
      <div class="section-title section-title-white text-center">
         <h2>Top Packages</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
         <p>Checkout for our day to day top packages.</p>
      </div>
      <div class="deals-outer">
         <div class="row deals-slider slider-button">
           @foreach($data['packages'] as $key=>$value)
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{asset('/frontend/images')}}/deal1.jpg" alt="Image">
                        <span class="deal-price">{{$value->price}}</span>
                     </div>
                     <div class="deal-content">
                        <h3>{{$value->name}}</h3>
                        <p>{{$value->details}}</p>
                        <a href="tour-detail.html" class="btn-blue btn-red">More Details</a>
                     </div>
                  </div>
               </div>
            </div>
           @endforeach 
         </div>
      </div>
   </div>
   <div class="section-overlay"></div>
</section>