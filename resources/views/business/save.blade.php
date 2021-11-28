@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
@endsection
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">Businesses</h2>
<div class="breadcrumb-wrapper">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Business</a>
      </li>
      <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
      </li>
   </ol>
</div>
@endsection
@section('content')
<div class="content-body">
   <section id="basic-input">  
      <form action="{{ url('admin/savebusiness') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
          <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
         <input class="form-control" name="role_id" type="hidden" value="3">
         <div class="col-md-12 text-right mb-2"> 
            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
            <a href="{{url('admin/business')}}" class="btn btn-outline-secondary">Back</a>
         </div>
         <div class="card">
            <div class="card-body">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Business Owner Name</label>
                           <input type="text" name="owner_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->owner_name) ? $data['results']->owner_name : '')}}">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Business Name</label>
                           <input type="text" name="name" class="form-control m-input m-input--square" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Business Website</label>
                           <input type="text" name="site_link" class="form-control m-input m-input--square" value="{{(isset($data['results']->site_link) ? $data['results']->site_link : '')}}">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Business Type</label>
                           <select name="type" class="form-control" data-option-id="{{(isset($data['results']->type) ? $data['results']->type : '')}}">
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
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Business Country</label>
                           <select name="country" class="form-control country" data-option-id="{{(isset($data['results']->country) ? $data['results']->country : '')}}">
                              <option value="">Select</option>
                              @foreach($data['country'] as $key=>$value)
                              <option class="test" value="{{$value->id}}">{{$value->location_country_name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Business Email</label>
                           <input type="email" name="email" class="form-control m-input m-input--square" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Business City</label>
                           <select name="city" class="form-control city" data-option-id="{{(isset($data['results']->city) ? $data['results']->city : '')}}">
                              <option value="">Select</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Business Phone#</label>
                           <input type="tel" name="phone" class="form-control m-input m-input--square" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Zip Code</label>
                           <input type="text" name="postal_code" class="form-control m-input m-input--square zipcode" value="{{(isset($data['results']->postal_code) ? $data['results']->postal_code : '')}}">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group m-form__group">
                           <label>Discount</label>
                           <select name="discount" class="form-control" data-option-id="{{(isset($data['results']->discount) ? $data['results']->discount : '')}}">
                              <option value="">Select</option>
                              <option>1%</option>
                              <option>2%</option>
                              <option>5%</option>
                              <option>6%</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group m-form__group">
                           <label>Discount Code</label>
                           <input type="text" name="discount_code" class="form-control m-input m-input--square" value="{{(isset($data['results']->discount_code) ? $data['results']->discount_code : '')}}">                          
                        </div>
                     </div>
                     <div class="col-md-3">
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
                      <div class="col-md-3">
                        <div class="form-group m-form__group">
                           <label>Features</label>
                           <select name="feature" class="form-control" data-option-id="{{(isset($data['results']->feature) ? $data['results']->feature : '')}}">
                              <option value="">Select</option>
                              <option>Reservation</option>
                              <option>Purchase</option>
                           </select>
                        </div>
                     </div>
                      <div class="col-md-3">
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
                     <div class="col-md-12">
                        <div class="form-group m-form__group">
                           <label>Business More Details</label>
                           <textarea type="text" name="details" rows="10" class="form-control m-input m-input--square" required>{{(isset($data['results']->details) ? $data['results']->details : '')}}</textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group" >
                           <label>
                           Upload Single File
                           </label>
                           <div  action="{{url('admin/upload_file?url=-public-uploads-business') }}" class="dropzone" id="dropzoneupload">
                              <div class="dz-message">Drop files here or click to upload.</div>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="dp" class="form-control m-input m-input--square" value="{{(isset($data['results']->dp) ? $data['results']->dp : '')}}">
                  </div>
                  <img src="{{isset($data['results']->dp) ?url('/').''. $data['results']->dp:''}}" width="90" height="80">
                    
                    <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group" >
                           <br>
                           <label>
                           Upload Multiple Files
                           </label>
                           <div action="{{url('/admin/uploadImage')}}" class="dropzone " id="dpzremovethumb">
                          <div class="dz-message">Drop files here or click to upload.</div>
                         </div>
                        </div>
                     </div>
                    <input type="hidden" name="images" class="form-control m-input m-input--square" value="">

                  <input class="form-control" name="old_images" type="hidden" value="{{(isset($data['results']->images) ? $data['results']->images : '')}}">  
                  </div>
                  <div class="row">
                   @if(isset($data['results']->images)&& !empty($data['results']->images))
                     @foreach(json_decode($data['results']->images) as $row)
                     <div class="col-md-2">
                        <img src="{{url('/')}}/{{$row}}" alt="" class="pimg" width="100px" height="150px">
                     </div>
                     @endforeach
                     </div>
                     @endif
                     </div>
                 <!--  <img src="{{url(isset($data['results']->images) ?url('/').''. $data['results']->images:'')}}" width="90" height="80"> -->
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
   $('.business-mgt').addClass('sidebar-group-active');
   $('.add-Business').addClass('active');
   DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1.,'dp');
   DropzoneMultiplefunc('dpzremovethumb','.png,.jpg,.jpge',4.,'images');

   $(document).ready(function(){
     $(".country").change(function(){
     var id = $(this).val();
     // alert(id);
     $.ajax({
              type:"get",
              url: "{{url('admin/getcities')}}/"+id,
              dataType: "json",
              success:function(data)
              { 
                 $('.city').html(data.response); //to write the respone in the city drop 
                  @if(isset($data['results']->id));  //to write the selected city name 
                  var city='{{$data['results']->city}}';//for the edit purpose
                  $('.city').val(city);
                  @endif 
              }
          });
    });
     //to triggerd the zip code from the selected city and then write on the zipcode input
   $(".city").change(function(){
      var zip = $(this).find('option:selected').attr('data-zipcode');
      $('.zipcode').val(zip);
      
      });
 //to triggerd the selected country id  
@if(isset($data['results']->id))
   setTimeout(function(){ 
      $('.country').trigger('change'); 
     }, 2000);
   @endif
 });
</script>
@endsection