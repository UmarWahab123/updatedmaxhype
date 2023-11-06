@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

@endsection

@section('breadcrumb')

   <h2 class="content-header-title float-left mb-0">User Management</h2>

   <div class="breadcrumb-wrapper">

      <ol class="breadcrumb">

         <li class="breadcrumb-item"><a href="{{url('admin/Home')}}">Users</a>

         </li>

         <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>

         </li>

      </ol>

   </div>

   @endsection

   @section('content')

   <div class="row mb-2">

      <div class="col-md-8">

         <ul class="nav nav-pills mt-2 mb-xl-n50" role="tablist">

            <li class="nav-item">

               <a class="nav-link show active" id="account-pill-general" data-toggle="pill" href="#home" aria-expanded="true">

               <span class="font-weight-bold">General Info</span>

               </a>

            </li>

            <li class="nav-item">

               <a class="nav-link" id="account-pill-general" data-toggle="pill" href="#social" aria-expanded="true">

               <span class="font-weight-bold">Social Links</span>

               </a>

            </li>

         </ul>

      </div>

   </div>

   <div class="content-body">

      <section id="basic-input">
         
      <form action="{{ url('admin/saveuser') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">

       {{ csrf_field() }}
      <div class="col-md-12 text-right mb-2">

         @if($data['page_title']=="Update User")

       <!--   <a href="{{url('admin/userprofile/'.$data['results']->id)}}" class="btn btn-primary ">User Details</a>
 -->
         <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

         <a href="{{url('admin/users')}}" class="btn btn-outline-secondary">Back</a>

         @else

         <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

         <a href="{{url('admin/users')}}" class="btn btn-outline-secondary">Back</a>

         @endif     

      </div>


         <div class="card">

            <div class="card-body">

               <div class="col-md-12">

                  <div class="tab-content">

                     <div id="home" class="tab-pane fade active in show">

                        <div class="row">

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Role</label>

                                 <select name="role_id" class="form-control" data-option-id="{{(isset($data['results']->role_id) ? $data['results']->role_id : '')}}" required>

                                    <option value="">Select</option>

                                    @foreach($data['roles'] as $key=>$value)

                                    <option value="{{$value->id}}">{{$value->role_title}}</option>

                                    @endforeach

                                 </select>

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>First Name</label>

                                 <input type="text" name="first_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->first_name) ? $data['results']->first_name : '')}}" required>

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Last Name</label>

                                 <input type="text" name="last_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->id) ? $data['results']->last_name : '')}}" required>

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Email</label>

                                 <input type="text" name="email" class="form-control m-input m-input--square" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}" required>

                              </div>

                           </div>

                        </div>

                        <div class="row">

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Contact No</label>

                                 <input type="text" name="phone" class="form-control m-input m-input--square" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}" required>

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Address</label>

                                 <input type="text" name="address" class="form-control m-input m-input--square" value="{{(isset($data['results']->address) ? $data['results']->address : '')}}">

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Postal Code</label>

                                 <input type="text" name="postal_code" class="form-control m-input m-input--square" value="{{(isset($data['results']->postal_code) ? $data['results']->postal_code : '')}}">

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Status</label>

                                 <select name="status" class="form-control" data-option-id="{{(isset($data['results']->status) ? $data['results']->status : '')}}" required>

                                    <option value="">Select</option>

                                    <option>Accepted</option>

                                    <option>Rejected</option>

                                    <option>Pending</option>

                                 </select>

                              </div>

                           </div>

                        </div>

                        <div class="row">

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Password</label>

                                 <input type="password" placeholder="{{(isset($data['results']->id) ? 'Type in to update password' : '')}}" name="password" class="form-control password m-input m-input--square" value="">

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Confirm Password</label>

                                 <input type="password" name="cpassword" class="form-control cpassword password m-input m-input--square" value="">

                              </div>

                           </div>
                            <div class="col-md-3 refralcode d-none">
                           <div class="form-group m-form__group">
                              <label>Affiliate</label>
                              <select name="affiliate_id" class="form-control" data-option-id="{{(isset($data['results']->affiliate_id) ? $data['results']->affiliate_id : '')}}">
                                 <option value="">Select</option>
                                 @foreach($data['affiliate'] as $key=>$value)
                                 <option class="test" value="{{$value->id}}">{{$value->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>

                        </div>

                        <div class="row">

                           <div class="col-md-4">

                              <div class="form-group" >

                                 <label>

                                 Upload Picture

                                 </label>

                                 <div  action="{{url('admin/upload_file?url=-public-uploads-users-dp') }}" class="dropzone" id="dropzoneupload">

                                    <div class="dz-message">Drop files here or click to upload.</div>

                                 </div>

                              </div>

                           </div>

                           <div class="col-md-4">

                              <img class="img-fluid mt-3" src="{{isset($data['results']->dp)?url('/').''.$data['results']->dp:'' }}">  

                           </div>

                           <input class="form-control" name="dp" type="hidden" value="{{(isset($data['results']->dp) ? $data['results']->dp : '')}}">

                           <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

                        </div>

                     </div>

                     <div id="social" class="tab-pane fade">

                        <div class="row">

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Facebook</label>

                                 <input type="text" name="facebook" class="form-control m-input m-input--square" value="{{(isset($data['results']->facebook) ? $data['results']->facebook : '')}}">

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Twitter</label>

                                 <input type="text" name="twitter" class="form-control m-input m-input--square" value="{{(isset($data['results']->twitter) ? $data['results']->twitter : '')}}">

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>Instagram</label>

                                 <input type="text" name="instagram" class="form-control m-input m-input--square" value="{{(isset($data['results']->instagram) ? $data['results']->instagram : '')}}">

                              </div>

                           </div>

                           <div class="col-md-3">

                              <div class="form-group m-form__group">

                                 <label>LinkedIn</label>

                                 <input type="text" name="linkedin" class="form-control m-input m-input--square" value="{{(isset($data['results']->instagram) ? $data['results']->   linkedin : '')}}">

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

                  </input>

                  </input>

             </form>

         </div>

    </div>

</div>

</section>

</div>

@endsection

@section('js')

<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

<script type="text/javascript">

   $('.usermgt').addClass('sidebar-group-active');

   $('.users').addClass('active');

   $('#form_submit').validate({

       rules: {

           'role_id': {

               required: true

           },

           'first_name': {

               required: true

           },

           'last_name': {

               required: true

           },

           'email': {

               required: true,

               email: true

           },

   

           'cpassword': {

               equalTo: '.password'

           },

           'status': {

               required: true

           },

       }

   });

 DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpge',1,'dp');

 $(document).on('change','select[name=role_id]',function(){
  var value=$(this).val();
  if(value==3){
     $('.refralcode').removeClass('d-none');
  }else{
    $('.refralcode').addClass('d-none');
   }
});

</script>

@endsection