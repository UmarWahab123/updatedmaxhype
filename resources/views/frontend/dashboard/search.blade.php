  <div class="row">
      <div class="col-md-12">
        <div class="busines-name text-center ml-4"> 
          <div class="row mt-2">
              <div class="col-md-4 text-center">
               <h4 class="all-businesses-head mb-2">BUSINESS NAME</h4>
               <ul>
                @foreach($data['business'] as $key=>$value)
                <a href="{{url('business_details/'.$value->id)}}"><li class="all-businesses-name">{{$value->first_name}}</li></a>
                @endforeach
               </ul>
              </div>
              <div class="col-md-4 text-center">
               <h4 class="all-country-head mb-2">COUNTRIES</h4>
               <ul>
                @foreach($data['location'] as $key=>$value)
                  <a href="{{url('business_listing/'.$value->id)}}"><li class="all-country-name">{{$value->location_country_name}}</li></a>
                @endforeach
               </ul>
              </div>
              <div class="col-md-4 text-center">
              <h4 class="all-tickets-head mb-2">TICKETS NUMBER</h4>
                <ul>
                  @foreach($data['tickets'] as $key=>$value)
                  <a href="{{url('business_details/'.$value->business_id)}}"><li class="all-tickets-name">{{$value->reservation_number}}</li></a>
                  @endforeach
               </ul>
              </div>
          </div>
          </div>
      </div>
  </div>



