@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

@endsection

  @section('breadcrumb')

   <h2 class="content-header-title float-left mb-0">Affiliates</h2>

   <div class="breadcrumb-wrapper">

      <ol class="breadcrumb">

         <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Affiliate</a>

         </li>

         <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>

         </li>

      </ol>

   </div>

   @endsection

   @section('content')

   <div class="content-body">

   <section id="basic-input">

   <form action="{{ url('admin/saveAffiliate') }}" class="" id="form_submit" method="post" enctype="multipart/form-data"> 

   {{ csrf_field() }}

   <div class="col-md-12 text-right mb-2">    

   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

   <a href="{{url('admin/package')}}" class="btn btn-outline-secondary">Back</a>

   </div>

    <div class="card">

      <div class="card-body">

  <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

  <input class="form-control" name="role_id" type="hidden" value="4">

      <div class="col-md-12">

               <div class="row">                      

                  <div class="col-md-3">

                     <div class="form-group m-form__group">

                        <label>First Name</label>

                        <input type="text" name="first_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->first_name) ? $data['results']->first_name : '')}}" required>

                     </div>

                  </div>

                   <div class="col-md-3">

                      <div class="form-group m-form__group">

                        <label>Last Name</label>

                        <input type="text" name="last_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->last_name) ? $data['results']->last_name : '')}}" required>

                     </div>

                  </div>

                   <div class="col-md-3">

                     <div class="form-group m-form__group">

                        <label>Email</label>

                        <input type="text" name="email" class="form-control m-input m-input--square" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}" required>

                     </div>

                  </div>

                  <div class="col-md-3">

                     <div class="form-group m-form__group">

                        <label>Phone No</label>

                        <input type="text" name="phone" class="form-control m-input m-input--square" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}" required>

                     </div>

                  </div>                          

                  </div> 

                   <div class="row">

                     <div class="col-lg-12">

                        <div class="form-group" >

                           <label>

                           Upload Display Picture

                           </label>

                           <div  action="{{url('admin/upload_file?url=-public-uploads-affiliate') }}" class="dropzone" id="dropzoneupload">

                              <div class="dz-message">Drop files here or click to upload.</div>

                           </div>

                        </div>

                     </div>

                     <input type="hidden" name="dp" class="form-control m-input m-input--square" value="{{(isset($data['results']->dp) ? $data['results']->dp : '')}}">

                  </div>

                  <img src="{{isset($data['results']->dp) ?url('/').''. $data['results']->dp:''}}" width="90" height="80">                  

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

   $('.affiliates').addClass('sidebar-group-active');

   $('.add-affiliate').addClass('active');

   DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1.,'dp');

   

</script>

@endsection