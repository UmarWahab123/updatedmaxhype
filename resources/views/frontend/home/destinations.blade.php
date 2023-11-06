<section class="top-destinations">
   <div class="container">
      <div class="section-title text-center">
         <h2>Top Countries</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
         <p>Discover the best Restaurants, Clubs, lounges, Bars, Events, Shows, Movie Theaters,
          Luxury Vehicles, Atv Rentals, Supermarkets, Stores, Sightseeing, Spa's, Medical Marijuanna &amp; CBD, Jet Skis, Boat/Yatch. FUN Thingstodo &amp; more.</p>
      </div>
      <div class="row">
        @foreach($data['countries'] as $value)
          <div class="col-lg-3 popular-packages">
            <a href="{{url('business_listing/'.$value->id)}}">
              <div class="package-item">
                <div class="package-content text-center">
                  <h5>{{$value->location_country_name}}</h5>
                  <h5><a href="{{url('business_city/'.$value->id)}}">Cities of {{$value->location_country_name}}</a></h5>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
      <div class="section-title text-center">
         <h2>Top Businesess</h2>
         <div class="section-icon">
            <i class="flaticon-diamond"></i>
         </div>
      </div>
      <div class="row">
        @foreach($data['business'] as $key=>$value)
        <div class="col-lg-4 col-md-4">
          <div class="top-destination-item">
            <a href="{{url('business_details/'.$value->id)}}">
              <img class="img-responsive" src="{{url(isset($value->dp) ? $value->dp:'')}}" width="432" height="224">
              <div class="overlay">
                <h2>{{$value->name}}</h2>
                <p>{{$value->country}}</p>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>