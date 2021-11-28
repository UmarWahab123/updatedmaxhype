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
                       <td>Membership Title</td>
                       <td>
                       {{isset($data['results']->package_title->title) ? $data['results']->package_title->title : ''}}</td>
                     </tr>
                     <tr>
                       <td>Business Name</td>
                       <td>
                       {{isset($data['results']->business_user->name) ? $data['results']->business_user->name : ''}}</td>
                     </tr>
                     <tr>
                       <td>Business Website Link</td>
                       <td>{{isset($data['results']->business_user->site_link) ? $data['results']->business_user->site_link : ''}}</td>
                     </tr>
                      <tr>
                       <td>Business Type</td>
                       <td>{{isset($data['results']->business_user->type) ? $data['results']->business_user->type : ''}}</td>
                     </tr>
                      <tr>
                       <td>Business Email</td>
                       <td>{{isset($data['results']->business_user->email) ? $data['results']->business_user->email : ''}}</td>
                     </tr>
                     <tr>
                       <td>Business Phone</td>
                       <td>{{isset($data['results']->business_user->phone) ? $data['results']->business_user->phone : ''}}</td>
                     </tr>
                     <tr>
                       <td>Business Country</td>
                       <td>{{isset($data['results']->business_user->country) ? $data['results']->business_user->country : ''}}</td>
                     </tr>
                      <tr>
                       <td>First Name</td>
                       <td>{{isset($data['results']->business_user->first_name) ? $data['results']->business_user->first_name : ''}}</td>
                     </tr>
                       <tr>
                       <td>Last Name</td>
                       <td>{{isset($data['results']->business_user->last_name) ? $data['results']->business_user->last_name : ''}}</td>
                     </tr>
                     </tr>
                      <tr>
                       <td>Personal Email Address</td>
                       <td>{{isset($data['results']->business_user->personal_email) ? $data['results']->business_user->personal_email : ''}}</td>
                     </tr>
                       <tr>
                       <td>Living Country</td>
                       <td>{{isset($data['results']->business_user->living_country) ? $data['results']->business_user->living_country : ''}}</td>
                     </tr>
                     <tr>
                       <td>Living City</td>
                       <td>{{isset($data['results']->business_user->living_city) ? $data['results']->business_user->living_city : ''}}</td>
                     </tr>
                       <tr>
                       <td>Business Existence Durations</td>
                       <td>{{isset($data['results']->business_user->existence_duration ) ? $data['results']->business_user->existence_duration : ''}}</td>
                     </tr>
                     <tr>
                       <td>Cell Phone Number</td>
                       <td>{{isset($data['results']->business_user->cell_phone) ? $data['results']->business_user->cell_phone : ''}}</td>
                     </tr>
                       <tr>
                       <td>Home Phone Number</td>
                       <td>{{isset($data['results']->business_user->home_phone ) ? $data['results']->business_user->home_phone : ''}}</td>
                     </tr>
                       <tr>
                       <td>Office Number</td>
                       <td>{{isset($data['results']->business_user->office_number ) ? $data['results']->business_user->office_number : ''}}</td>
                     </tr>
                  </tbody>
               </table><br>
               <h4><u>Business More Description</u></h4><br>
               <p>{{Str::words(strip_tags(isset($data['results']->business_user-> details ) ? $data['results']->business_user->details : ''), 200) }}</p>
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