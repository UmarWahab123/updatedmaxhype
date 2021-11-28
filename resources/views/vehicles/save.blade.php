@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
@endsection
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">Vehicles</h2>
<div class="breadcrumb-wrapper">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Vehicle</a>
      </li>
      <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
      </li>
   </ol>
</div>
@endsection
@section('content')
<div class="content-body">
   <section id="basic-input">
      <form action="{{ url('admin/savevehicles') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="col-md-12 col-12 text-right mb-2">
            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 savepage">Save Changes</button>
            <a href="{{url('admin/vehicle')}}" class="btn btn-outline-secondary">Back</a>
         </div>
         <div class="card">
            <div class="card-body">
                  <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
               <div class="row">
                  <div class="col-md-4 col-12">
                     <div class="form-group">
                        <label>Vehicle Category Name</label>
                        <input class="form-control" name="name" type="text" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-12">
                     <div class="form-group" id="full-container">
                        <label for="exampleFormControlTextarea1">Vehicle Category Details</label>
                        <div id="full-container">
                           <div class="editor">
                           <?=(isset($data['results']->details) ? $data['results']->details : '')?>
                           </div>
                       </div>
                  <textarea class="form-control d-none" name="details">{{(isset($data['results']->details) ? $data['results']->details : '')}}</textarea>
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

<script src="../../../app-assets/vendors/js/editors/quill/quill.min.js"></script>
<script src="../../../app-assets/js/scripts/forms/form-quill-editor.js"></script>
<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script type="text/javascript">

$( document ).ready(function() {
// $('textarea[name=details]').val($('.ql-editor').html());
$(document).on('click','.savepage',function(e) {
            e.preventDefault();
            $('textarea[name=details]').val($('.ql-editor').html());
            $('#form_submit').submit();
        });
});
   $('.vehicles').addClass('sidebar-group-active');
   $('.add-vehicles').addClass('active');
</script>
@endsection