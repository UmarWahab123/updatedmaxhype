<h3>Hi {{$data['first_name']}} {{$data['last_name']}},</h3>
<h5>We just received your {{$data['type']}} request.<br>
Thanks for your {{$data['type']}} ! You'll find a summary of your recent {{$data['type']}} bellow.</h5>
@if($data['type']=='Reservation')
<div class="row">
<span style="float: right; margin-right:60px;">{{$data['qr_code']}}</span>
</div>
<table width="60%" cellspacing="1"><tbody>
<tr><td><b>Order#</b></td><td> :{{$data['order_number']}}</td></tr>
<tr><td><b>First Name</b></td><td> :{{$data['first_name']}}</td></tr>
<tr><td><b>Last Name</b></td><td> :{{$data['last_name']}}</td></tr>
<tr><td><b>Special Notes</b></td><td> :{{$data['remarks']}}</td></tr>
<tr><td><b>Number of people</b></td><td> :{{$data['people']}}</td></tr>
<tr><td><b>Date & Time</b></td><td> :{{$data['date']}}, {{$data['time']}}</td></tr>
</tbody></table>
<h5>You made Reservation from {{$data['business']['name']}},<br> 
Located at {{$data['cities']['location_city_name']}} {{$data['country']['location_country_name']}}, <br>
Address : {{$data['business_address']}}.<br>
For more details please contact to {{$data['business']['email']}}.
</h5>
@endif
@if($data['type']=='Purchase')
<div class="row">
<span style="float: right; margin-right:60px;">{{$data['qr_code']}}</span>
</div>
<table width="60%" cellspacing="1"><tbody>
<tr><td><b>Order#</b></td><td> :{{$data['order_number']}}</td></tr>
<tr><td><b>First Name</b></td><td> :{{$data['first_name']}}</td></tr>
<tr><td><b>Last Name</b></td><td> :{{$data['last_name']}}</td></tr>
<tr><td><b>Special Notes</b></td><td> :{{$data['remarks']}}</td></tr>
<tr><td><b>Total Tickets</b></td><td> :{{$data['total_tickets']}}</td></tr>
<tr><td><b>Total Price</b></td><td> :{{$data['total_price']}}</td></tr>
</tbody></table>
<h5>You made Purchase from {{$data['business']['name']}},<br> 
Located at {{$data['cities']['location_city_name']}} {{$data['country']['location_country_name']}}, <br>
Address : {{$data['business_address']}}.<br>
For more details please contact to {{$data['business']['email']}}.
</h5>
@endif
