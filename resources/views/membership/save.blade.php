@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
@endsection
  @section('breadcrumb')
   <h2 class="content-header-title float-left mb-0">Home Slider</h2>
   <div class="breadcrumb-wrapper">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{url('admin/membership')}}">Sliders</a>
         </li>
         <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
         </li>
      </ol>
   </div>
   @endsection
   @section('content')
   <div class="content-body">
   <section id="basic-input">
   <form action="{{ url('admin/savemembership') }}" class="" id="form_submit" method="post" enctype="multipart/form-data"> 
   {{ csrf_field() }}
   <div class="col-md-12 text-right mb-2">    
   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
   <a href="{{url('admin/membership')}}" class="btn btn-outline-secondary">Back</a>
   </div>
    <div class="card">
      <div class="card-body">
      <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
          <div class="col-md-12">
               <div class="row">                      
                  <div class="col-md-6">
                     <div class="form-group m-form__group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control m-input m-input--square" value="{{(isset($data['results']->title) ? $data['results']->title : '')}}" required>
                     </div>
                  </div>
                    <div class="col-md-6">
                      <div class="form-group m-form__group">
                        <label>Locations</label>
                        <input type="text" name="location" class="form-control m-input m-input--square" value="{{(isset($data['results']->location) ? $data['results']->location : '')}}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                      <div class="form-group m-form__group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control m-input m-input--square" value="{{(isset($data['results']->price) ? $data['results']->price : '')}}">
                     </div>
                  </div> 
                   <div class="col-md-4">
                      <div class="form-group m-form__group">
                        <label>Commision/Sale</label>
                        <input type="text" name="commision_per_sale" class="form-control m-input m-input--square" value="{{(isset($data['results']->commision_per_sale) ? $data['results']->commision_per_sale : '')}}">
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
<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script type="text/javascript">
      $('.all-memberships').addClass('active');
</script>
@endsection