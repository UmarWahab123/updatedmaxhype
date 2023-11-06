 @foreach($data['product'] as $key=>$value)
            <div class="col-md-3">
               <div class="deals-item">
                  <div class="deals-item-outer">
                     <div class="deals-image">
                        <img src="{{asset($value->product_dp) ?url('/').''.$value->product_dp:''}}" alt="Image" style="height: 220px !important;">
                        <span class="deal-price">{{$value->price}}</span>
                     </div>
                     <div class="deal-content">
                        <h4>{{$value->title}}</h4>
                        <p><span style="color: orange;"><b class="font-weight-bold">Total</b></span> : {{$value->total_tickets}}</p>
                        <p>
                        @if(get_availability($value->total_tickets,$value->id) >= 1)
                         <span style="color:orange;"><b class="font-weight-bold">Available</b></span> : {{get_availability($value->total_tickets,$value->id)}}
                         @else
                         <span style="color:orange;"><b class="font-weight-bold">Available</b></span> : 0
                         @endif
                        </p>
                         @if(Auth::check())
                         @if(Auth::user()->role_id != 5)
                         <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn-blue products_detail change-background">View detail</a>
                        @if(get_availability($value->total_tickets,$value->id) >= 1)
                        <a href="javascript::void(0)" data-toggle="modal" data-target="#loginModal" class="btn-blue btn-red">{{$value->businesses->feature}}</a>
                         @else
                           <a type="button" class="btn-blue btn-red fully-booked">Fully Booked</a>
                          @endif
                       
                         @elseif(Auth::user()->role_id == 5 )
                         <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn-blue products_detail change-background">View detail</a>
                        @if(get_availability($value->total_tickets,$value->id) >= 1)
                        <a href="{{url('/reservation/'.$value->id.'/'.$value->businesses->feature.'/'.$value->businesses->type)}}" class="btn-blue btn-red">{{$value->businesses->feature}}</a>
                       @else
                        <a type="button" class="btn-blue btn-red fully-booked">Fully Booked</a>
                       @endif
                        
                        @endif
                        @else
                     <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn-blue products_detail change-background">View detail</a>
                      @if(get_availability($value->total_tickets,$value->id) >= 1)
                       <a href="javascript::void(0)" data-toggle="modal" data-target="#loginModal" class="btn-blue btn-red">{{$value->businesses->feature}}</a>
                        @else
                           <a type="button" class="btn-blue btn-red fully-booked">Fully Booked</a>
                        @endif
                       
                       @endif
                     </div>
                  </div>
               </div>
            </div>
           @endforeach