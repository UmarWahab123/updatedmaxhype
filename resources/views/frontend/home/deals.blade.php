<section class="deals">
   <div class="container">
      <div class="section-title section-title-white text-center">
         <h2>Top Products</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
         <p>Checkout for our day to day top Products.</p>
      </div>
      <div class="deals-outer">
         <div class="row deals-slider2 slider-button">
          
         </div>
      </div>
   </div>
   <div class="section-overlay"></div>
</section>
<div class="modal" tabindex="-1" role="dialog" id="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login/Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       @if(Auth::check() && Auth::user()->role_id != 5)
      <div>
        <p class="war-message">Please Register as a Customer to Buy</p>
        <a href="{{url('/logout')}}" class="btn-blue btn-red">Register</a>
     </div>
     @else
      <div>
        <p class="war-message">Please Login to Buy</p>
        <a href="{{url('/auth')}}" class="btn-blue btn-red">Login</a>
     </div><br>
     @endif
      </div>
    </div>
  </div>
</div>

