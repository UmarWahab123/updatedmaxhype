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
                        <td>Owner First Name</td>
                        <td>{{$data['results']->first_name}}</td>
                     </tr>
                     <tr>
                        <td>Owner Last Name</td>
                        <td>{{$data['results']->last_name}}</td>
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
                        <td>{{isset($data['results']->countries) ? $data['results']->countries->location_country_name :''}}</td>
                     </tr>
                     <tr>
                        <td>Business City</td>
                        <td>{{isset($data['results']->cities) ? $data['results']->cities->location_city_name :''}}</td>
                     </tr>
                     <tr>
                        <td>Business Address</td>
                        <td>{{$data['results']->address}}</td>
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
               </table>
               <br>
               <h4 class="text-center"><u>Business More Description</u></h4>
               <br>
               <p>{{Str::words(strip_tags($data['results']->details), 200) }}</p>
               <h4 class="text-center"><u>Business Images</u></h4>
               <br>
               @if(isset($data['results']->images)&& !empty($data['results']->images))
               <div class="row">
                  @foreach(json_decode($data['results']->images) as $row)
                  <div class="col-md-2 mt-2">
                     <img src="{{url('/')}}/{{$row}}" alt="" class="pimg" width="180px" height="150px">
                  </div>
                  @endforeach
               </div>
               @else
               <h5 class="text-center">No Images</h5>
               @endif<br><br>
               <h4 class="text-center"><u>Business Videos</u></h4>
               <br>
               @if(count($data['videos'])>0)
               <div class="row">
                  @foreach($data['videos'] as $key=>$value)
                  <div class="col-md-3">
                     <iframe width="270" height="250"
                        src="{{$value->video_url}}">
                     </iframe>
                  </div>
                  @endforeach
               </div>
               <br><br>
               @else
               <h5 class="text-center">No Videos</h5>
               @endif
               <br>
               <h4 class="text-center"><u>Business Products</u></h4>
               <br>
               @if(count($data['products'])>0)
               <div class="card-datatable p-2">
                  <table class="table dynamic_table font-weight-bold table-bordered">
                     <thead>
                        <tr role="row">
                           <th>Sr No</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Price</th>
                           <th>Total Tickets</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($data['products'] as $key=>$value)
                        <tr>
                           <td>{{$key+1}}</td>
                           <td>{{$value->title}}</td>
                           <td>{{Str::words(strip_tags($value->description), 15) }}</td>
                           <td>{{$value->price}}</td>
                           <td>{{$value->total_tickets}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <br><br>
               @else
               <h5 class="text-center">No Products</h5>
               @endif
               <br>
               @if($data['results']->feature=='Reservation')
               <h4 class="text-center"><u>Business Reservation</u></h4>
               @if(count($data['reservation'])>0)
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
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($data['reservation'] as $key=>$value)
                        <tr>
                           <td>{{$key+1}}</td>
                           <td>{{isset($value->business_name->name) ? $value->business_name->name : ''}}</td>
                           <td>{{ date('d-m-Y', strtotime($value->date));}}</td>
                           <td>{{$value->time}}</span></td>
                           <td>{{$value->remarks}}</td>
                           <td>{{$value->people}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               @else
               <h5 class="text-center">No Reservation</h5>
               @endif
               @else
               <h4 class="text-center"><u>Business Purchase</u></h4>
               @if(count($data['purchase'])>0)
               <div class="card-datatable p-2">
                  <table class="table dynamic_table font-weight-bold table-bordered">
                     <thead>
                        <tr role="row">
                           <th>Sr No</th>
                           <th>Business Name</th>
                           <th>Date</th>
                           <th>Time</th>
                           <th>Remarks</th>
                           <th>Total Tickets</th>
                           <th>Price</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($data['purchase'] as $key=>$value)
                        <tr>
                           <td>{{$key+1}}</td>
                           <td>{{isset($value->business_name->name) ? $value->business_name->name : ''}}</td>
                           <td>{{ date('d-m-Y', strtotime($value->date));}}</td>
                           <td>{{$value->time}}</span></td>
                           <td>{{$value->remarks}}</td>
                           <td>{{$value->total_tickets}}</td>
                           <td>{{$value->price}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               @else
               <h5 class="text-center">No Purchase</h5>
               @endif
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