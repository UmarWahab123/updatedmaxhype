<div id="featuretab" class="tab-pane fade">
   @if($data['results']->feature=='Reservation')
      <div class="row">
         <div class="col-lg-12 col-md-12 col-xs-12 traffic">
            <div class="dashboard-list-box">
               <h4 class="gray mb-2">Business Reservation</h4>
               <div class="table-box">
                  <table class="basic-table table-hover">
                     <thead>
                        <tr role="row">
                           <th>Sr No</th>
                           <th>Business Name</th>
                           <th>Date</th>
                           <th>Time</th>
                           <th>Remarks</th>
                           <th>Number Of People</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($data['reservation'] as $key=>$value)
                        <tr>
                           <td>{{$key+1}}</td>
                           <td>{{isset($value->business_name->name) ? $value->business_name->name : ''}}</td>
                           <td>{{$value->date}}</td>
                           <td>{{$value->time}}</span></td>
                           <td>{{$value->remarks}}</td>
                           <td>{{$value->people}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      @else
       <div class="row">
         <div class="col-lg-12 col-md-12 col-xs-12 traffic">
            <div class="dashboard-list-box">
               <h4 class="gray mb-2">Business Purchase</h4>
               <div class="table-box">
                  <table class="basic-table">
                     <thead>
                        <tr role="row">
                           <th>Sr No</th>
                           <th>Business Name</th>
                           <th>Remarks</th>
                           <th>Total Tickets</th>
                           <th>Unit Price</th>
                           <th>Total Price</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($data['reservation'] as $key=>$value)
                        <tr>
                           <td>{{$key+1}}</td>
                           <td>{{isset($value->business_name->name) ? $value->business_name->name : ''}}</td>
                           <td>{{$value->remarks}}</td>
                           <td>{{$value->total_tickets}}</td>
                           <td>{{$value->price}}</td>
                           <td>{{$value->total_price}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
    @endif
</div>
