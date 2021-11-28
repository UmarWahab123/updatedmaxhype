@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
<section id="basic-datatable">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header border-bottom">
               <h4 class="card-title">{{$data['page_title']}}</h4>
            </div>
            <div class="card-datatable p-2">
               <table class="table dynamic_table font-weight-bold table-bordered">
                  <tbody>
                     <tr>
                       <td>Owner Name</td>
                       <td>{{$data['results']->owner_name}}</td>
                     </tr>
                     <tr>
                       <td>Business Name</td>
                       <td>{{$data['results']->name}}</td>
                     </tr>
                     <tr>
                       <td>Business Website Link</td>
                       <td>{{$data['results']->site_link}}</td>
                     </tr>
                      <tr>
                       <td>Business Type</td>
                       <td>{{$data['results']->type}}</td>
                     </tr>
                      <tr>
                       <td>Business Email</td>
                       <td>{{$data['results']->email}}</td>
                     </tr>
                     <tr>
                       <td>Business Phone</td>
                       <td>{{$data['results']->phone}}</td>
                     </tr>
                     <tr>
                       <td>Business Country</td>
                       <td>{{$data['results']->country}}</td>
                     </tr>
                      <tr>
                       <td>Business City</td>
                       <td>{{$data['results']->city}}</td>
                     </tr>
                       <tr>
                       <td>Available ZipCode</td>
                       <td>{{$data['results']->postal_code}}</td>
                     </tr>
                     </tr>
                      <tr>
                       <td>Discount</td>
                       <td>{{$data['results']->discount}}</td>
                     </tr>
                       <tr>
                       <td>Discount Code</td>
                       <td>{{$data['results']->discount_code}}</td>
                     </tr>
                       <tr>
                       <td>Status</td>
                       <td>{{$data['results']->status}}</td>
                     </tr>
                  </tbody>
               </table><br>
               <h4 class="text-center"><u>Business More Description</u></h4><br>
               <p>{{Str::words(strip_tags($data['results']->details), 200) }}</p>

               <h4 class="text-center"><u>Business Images</u></h4><br>
                  <div class="row">
               @if(isset($data['results']->images)?$data['results']->images:'')
                 @foreach(json_decode($data['results']->images) as $row)
                 <div class="col-md-4">
                     <img src="{{isset($row)?$row:''}}" alt="" class="pimg" width="200px" height="200px">
                     <div class="text-center"> <a data-path="{{$row}}" class="removeimg" style="width: 200px;">Delete</a></div>
                 </div>
                 @endforeach
                 @endif
            </div><br>
            <h4 class="text-center"><u>Business Videos</u></h4><br>
            @foreach($data['videos'] as $key=>$value)
           <iframe width="300" height="300"
            src="{{$value->video_url}}">
            </iframe>
            @endforeach
            <br><br>
            @if($data['results']->feature=='Reservation')
            <h4 class="text-center"><u>Business Reservation</u></h4>
               <div class="card-datatable p-2">
               <table class="table dynamic_table font-weight-bold table-bordered">
                  <thead>
                     <tr role="row">
                        <th>Sr No</th>
                        <th>Business Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Remarks</th>
                        <th>Number Of People</th>
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
            </div>
            @else
              <h4 class="text-center"><u>Business Purchase</u></h4>
               <div class="card-datatable p-2">
               <table class="table dynamic_table font-weight-bold table-bordered">
                  <thead>
                     <tr role="row">
                        <th>Sr No</th>
                        <th>Business Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Remarks</th>
                        <th>Number Of People</th>
                        <th>Total Tickets</th>
                        <th>Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($data['purchase'] as $key=>$value)
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
            </div>
            @endif
         </div>
         </div>
      </div>
   </div>
</section>
@include('includes.delete')
@endsection
@section('js')
<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}">

<script type="text/javascript">
   $('.business-mgt').addClass('sidebar-group-active');
   $('.view-business').addClass('active');
   $('.dynamic_table').DataTable();
</script>

@endsection