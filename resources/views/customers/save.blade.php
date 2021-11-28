@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
@endsection
@section('breadcrumb')
   <h2 class="content-header-title float-left mb-0">Customers</h2>
   <div class="breadcrumb-wrapper">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Customer</a>
         </li>
         <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
         </li>
      </ol>
   </div>
   @endsection
   @section('content')
   <div class="content-body">
   <section id="basic-input">
   <form action="{{ url('admin/savecustomer') }}" class="" id="form_submit" method="post" enctype="multipart/form-data"> 
    {{ csrf_field() }}
    <div class="col-md-12 text-right mb-2">    
       <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
        <a href="{{url('admin/customer')}}" class="btn btn-outline-secondary">Back</a>
      </div>
    <div class="card">
      <div class="card-body">
         <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
             <input class="form-control" name="role_id" type="hidden" value="5">
               <div class="col-md-12">
                        <div class="row">                      
                           <div class="col-md-6">
                              <div class="form-group m-form__group">
                                 <label>Full Name</label>
                                 <input type="text" name="name" class="form-control m-input m-input--square" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group m-form__group">
                                 <label>Email</label>
                                 <input type="email" name="email" class="form-control m-input m-input--square" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}">
                              </div>
                           </div>
                           </div>
                           <div class="row">
                           <div class="col-md-6">
                              <div class="form-group m-form__group">
                                 <label>Phone Number</label>
                                 <input type="text" name="phone" class="form-control m-input m-input--square" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group m-form__group">
                                 <label>Status</label>
                                  <select name="status" class="form-control" data-option-id="{{(isset($data['results']->status) ? $data['results']->status : '')}}">
                                    <option value="">Select</option>
                                    <option>Accepted</option>
                                    <option>Rejected</option>
                                    <option>Pending</option>
                                 </select>
                              </div>
                           </div>
                     </div>
                   </div>
               </div>
              </div>
          </form>
      </section>   
 </div>          
@endsection
@section('js')
<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script type="text/javascript">
   $('.customers').addClass('sidebar-group-active');
   $('.add-customer').addClass('active');
</script>
@endsection