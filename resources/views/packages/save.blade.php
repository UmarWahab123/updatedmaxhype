@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

@endsection

  @section('breadcrumb')

   <h2 class="content-header-title float-left mb-0">Packages</h2>

   <div class="breadcrumb-wrapper">

      <ol class="breadcrumb">

         <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Package</a>

         </li>

         <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>

         </li>

      </ol>

   </div>

   @endsection

   @section('content')

   <div class="content-body">

   <section id="basic-input">

   <form action="{{ url('admin/savepackage') }}" class="" id="form_submit" method="post" enctype="multipart/form-data"> 

   {{ csrf_field() }}

   <div class="col-md-12 text-right mb-2">    

   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

   <a href="{{url('admin/package')}}" class="btn btn-outline-secondary">Back</a>

   </div>

    <div class="card">

      <div class="card-body">

           <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

               <div class="col-md-12">

                        <div class="row">                      

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>Package Name</label>

                                 <input type="text" name="name" class="form-control m-input m-input--square" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}" required>

                              </div>

                           </div>

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>Package Price (Per Month In USD)</label>

                                 <input type="text" name="price" class="form-control m-input m-input--square" value="{{(isset($data['results']->price) ? $data['results']->price : '')}}" required>

                              </div>

                           </div>

                           </div>

                           <div class="row">

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>Commision (Per Custom In USD)</label>

                                 <input type="text" name="commision" class="form-control m-input m-input--square" value="{{(isset($data['results']->commision) ? $data['results']->commision : '')}}">

                              </div>

                           </div>

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>Location</label>

                                 <input type="text" name="location" class="form-control m-input m-input--square" value="{{(isset($data['results']->location) ? $data['results']->location : '')}}">

                              </div>

                           </div>

                        </div>

                         <div class="row">

                           <div class="col-md-12">

                            <div class="form-group m-form__group">

                             <label>Add Package Details</label>

                               <textarea type="text" name="details" rows="10" class="form-control m-input m-input--square">{{(isset($data['results']->details) ? $data['results']->details : '')}}</textarea>

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

   $('.packages').addClass('sidebar-group-active');

   $('.add-package').addClass('active');

</script>

@endsection