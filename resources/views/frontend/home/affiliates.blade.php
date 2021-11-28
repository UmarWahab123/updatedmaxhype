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
                @foreach($data['affiliates'] as $key=>$value)
                <li><a href="{{url('/dashboards1/'.$value->id.'/guest')}}"><img src="{{isset($value->dp) ? url('/').''.$value->dp:''}}" width="50" height="60" alt="Image"></a></li>
                 @endforeach
            </ul>
         </div>
      </div>
   </div>
</section>