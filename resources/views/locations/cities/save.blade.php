@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

@endsection

  @section('breadcrumb')

   <h2 class="content-header-title float-left mb-0">Add Locations</h2>

   <div class="breadcrumb-wrapper">

      <ol class="breadcrumb">

         <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Locations</a>

         </li>

         <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>

         </li>

      </ol>

   </div>

   @endsection

   @section('content')

   <div class="content-body">

   <section id="basic-input">

   <form action="{{ url('admin/saveloction') }}" class="" id="form_submit" method="post" enctype="multipart/form-data"> 

   {{ csrf_field() }}

   <div class="col-md-12 text-right mb-2">    

   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

   <a href="{{url('admin/loction')}}" class="btn btn-outline-secondary">Back</a>

   </div>

    <div class="card">

      <div class="card-body">

           <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

               <div class="col-md-12">

                        <div class="row">                      

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>Choose Country</label>

                                 <select name="location_country_id" class="form-control" data-option-id="{{(isset($data['results']->location_country_id ) ? $data['results']->location_country_id  : '')}}" required>

                                    <option value="">Select</option>

                                    @foreach($data['country'] as $value)

                                    <option value="{{$value->id}}">{{$value->location_country_name}}</option>

                                    @endforeach

                                 </select>

                              </div>

                           </div>

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>City Name</label>

                                 <input type="text" name="location_city_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->location_city_name) ? $data['results']->location_city_name : '')}}" required>

                              </div>

                           </div>

                           </div>

                           <div class="row">

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>City Zipcode</label>

                                 <input type="text" name="location_city_zipcode" class="form-control m-input m-input--square" value="{{(isset($data['results']->location_city_zipcode) ? $data['results']->location_city_zipcode : '')}}">

                              </div>

                           </div>

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>Maps Coordinate</label>

                                 <input type="text" name="map" class="form-control m-input m-input--square" value="{{(isset($data['results']->map) ? $data['results']->map : '')}}">

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

   $('.locations').addClass('sidebar-group-active');

   $('.add-location').addClass('active');

</script>

@endsection