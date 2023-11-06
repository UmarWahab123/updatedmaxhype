@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

@endsection

  @section('breadcrumb')

   <h2 class="content-header-title float-left mb-0">Home Slider</h2>

   <div class="breadcrumb-wrapper">

      <ol class="breadcrumb">

         <li class="breadcrumb-item"><a href="{{url('admin/slider')}}">Sliders</a>

         </li>

         <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>

         </li>

      </ol>

   </div>

   @endsection

   @section('content')

   <div class="content-body">

   <section id="basic-input">

   <form action="{{ url('admin/saveslider') }}" class="" id="form_submit" method="post" enctype="multipart/form-data"> 

   {{ csrf_field() }}

   <div class="col-md-12 text-right mb-2">    

   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

   <a href="{{url('admin/slider')}}" class="btn btn-outline-secondary">Back</a>

   </div>

    <div class="card">

      <div class="card-body">

  <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

      <div class="col-md-12">
               <div class="row">                      
                  <div class="col-md-6">
                     <div class="form-group m-form__group">
                        <label>Heading</label>
                        <input type="text" name="heading" class="form-control m-input m-input--square" value="{{(isset($data['results']->heading) ? $data['results']->heading : '')}}" required>
                     </div>
                  </div>
                   <div class="col-md-6">
                      <div class="form-group m-form__group">
                        <label>Sub Heading</label>
                        <input type="text" name="sub_heading" class="form-control m-input m-input--square" value="{{(isset($data['results']->sub_heading) ? $data['results']->sub_heading : '')}}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                  <div class="form-group m-form__group">
                     <label>Business Type</label>
                     <select name="type" class="form-control" data-option-id="{{(isset($data['results']->type) ? $data['results']->type : '')}}" required>
                        <option value="">Select</option>
                        <option>Restaurants</option>
                        <option>Bar & Stores</option>
                        <option>Vehicles-ATV-Bikes-Boats-JetSkis</option>
                        <option>Adult Entertainment</option>
                        <option>Medical Marijuana & CBD</option>
                        <option>Adventure</option>
                        <option>Afrobeats</option>
                        <option>Sky Diving</option>
                        <option>Movie Theaters & Hotels</option>
                        <option>Clubs</option>
                     </select>
                  </div>
               </div>
                   <div class="col-md-6">
                     <div class="form-group m-form__group">
                        <label>Button Text</label>
                        <input type="text" name="button_text" class="form-control m-input m-input--square" value="{{(isset($data['results']->button_text) ? $data['results']->button_text : '')}}" required>
                     </div>
                  </div>
                  </div> 
                   <div class="row">

                     <div class="col-lg-12">

                        <div class="form-group" >

                           <label>

                           Upload Slider Picture

                           </label>

                           <div  action="{{url('admin/upload_file?url=-public-uploads-slider') }}" class="dropzone" id="dropzonesliderupload">

                              <div class="dz-message">Drop files here or click to upload.</div>

                           </div>

                        </div>

                     </div>

                     <input type="hidden" name="file" class="form-control m-input m-input--square" value="{{(isset($data['results']->file) ? $data['results']->file : '')}}">

                  </div>

                  <img src="{{isset($data['results']->file) ?url('/').''. $data['results']->file:''}}" width="90" height="80">                  

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

      $('.slider').addClass('active');



   DropzoneSinglefunc('dropzonesliderupload','.png,.jpg,.jpeg',1.,'file');

   

</script>

@endsection