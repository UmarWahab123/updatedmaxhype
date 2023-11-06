<section class="swiper-banner">
   <div class="slider">
      <div class="swiper-container">
         <div class="swiper-wrapper">
            @foreach($data['slider'] as $key=>$value)
            <div class="swiper-slide"
               style="background-image:url('{{$value->file}}')">
               <div class="swiper-content" data-animation="animated fadeInDown">
                  <h2>{{$value->sub_heading}}</h2>
                  <h1>{{$value->heading}}</h1>
                  <a href="{{url('/businesses/'.$value->type)}}" class="btn-blue btn-red">{{$value->button_text}}</a>
               </div>
            </div>
          @endforeach
         </div>
      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="overlay"></div>
   </div>
</section>