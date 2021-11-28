<h3><span style="color:yellowgreen;">All {{$data['type']}}</span></h3>
<table class="basic-table table-hover table-responsive">
   <thead>
      <tr role="row">
         <th>Sr No</th>
         <th>Business Name</th>
         <th>Date</th>
         <th>Time</th>
         <th>Remarks</th>
         <th>No Of People</th>
         <th>Total Tickets</th>
         <th>Price</th>
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
         <td>{{$value->total_tickets}}</td>
         <td>{{$value->price}}</td>
      </tr>
      @endforeach
   </tbody>
</table>
