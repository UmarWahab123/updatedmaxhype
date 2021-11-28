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
               <table class="table dynamic_table font-weight-bold">
                  <thead>
                     <tr role="row">
                        <th>Sr No</th>
                        <th>Business Name</th>
                        <th>Membership Title</th>
                        <th>Total Price</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($data['results'] as $key=>$value)
                     <tr>
                        <td>{{$key+1}}</td>
                        <td><a href="{{url('admin/business_details/'.$value->business_user->id )}}">{{isset($value->business_user->name) ? $value->business_user->name : ''}}</a></td>
                        <td>{{isset($value->package_title->title) ? $value->package_title->title : ''}}</td>
                        <td>{{$value->total_price}}</td>
                        <td>
                        <div class="dropdown">
                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('admin/bookingsdetails/'.$value->id )}}">
                        <i data-feather="file-text" class="mr-50"></i>
                        <span>Details</span>
                        </a>
                        </div>
                        </div>
                        </td>
                     </tr>
                  @endforeach
                  </tbody>
               </table>
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
   $('.bookings').addClass('sidebar-group-active');
   $('.all-bookings').addClass('active');
   $('.dynamic_table').DataTable();
</script>

@endsection