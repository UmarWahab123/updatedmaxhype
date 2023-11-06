@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
@endsection
@section('breadcrumb')
   <h2 class="content-header-title float-left mb-0">Careers</h2>
   <div class="breadcrumb-wrapper">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Career</a>
         </li>
         <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
         </li>
      </ol>
   </div>
   @endsection
   @section('content')
 <div class="content-body">
  <section id="basic-input">
   <form action="{{ url('admin/savecareer') }}" class="" id="form_submit" method="post" enctype="multipart/form-data"> 
    {{ csrf_field() }}
   <div class="col-md-12 text-right mb-2">    
   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 savepage">Save Changes</button>
   <a href="{{url('admin/career')}}" class="btn btn-outline-secondary">Back</a>
   </div>
    <div class="card">
      <div class="card-body">
          <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
               <div class="col-md-12">
                        <div class="row">       
                           <div class="col-md-4">
                             <div class="form-group m-form__group">
                                 <label>Job Title</label>
                                 <input type="text" name="title" class="form-control m-input m-input--square" value="{{(isset($data['results']->title) ? $data['results']->title : '')}}" required>
                              </div>
                            </div>
                             <div class="col-md-4">
                              <div class="form-group m-form__group">
                                 <label>Choose Position</label>
                                 <select class="form-control" name="career_position_id" value="{{isset($data['position']->career_position_id) ? $data['position']->career_position_id : ''}}" required>
                                  @foreach($data['position'] as $key=>$value)
                                 <option value="{{$value->id}}">{{$value->position_name}}</option>
                                 @endforeach
                               </select>                               
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group m-form__group">
                                 <label for="pd-format">Last Date to Apply</label>
                                    <input type="text" name="apply_last_date" id="pd-format" class="form-control format-picker" value="{{(isset($data['results']->apply_last_date) ? format_date($data['results']->apply_last_date) : '')}}" class="form-control m-input m_datepicker" required/>
                               </div>
                            </div>
                         </div>
                         <div class="row"> 
                         <div class="col-md-4">                            
                              <div class="form-group m-form__group">
                                <label>Enter Salary Range</label>
                                  <input type="salary" name="salary" class="form-control m-input m-input--square" value="{{(isset($data['results']->salary) ? $data['results']->salary : '')}}">                             
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group m-form__group">
                                 <label>Enter Country</label>
                                 <input type="text" name="country" class="form-control m-input m-input--square" value="{{(isset($data['results']->country) ? $data['results']->country : '')}}" required>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group m-form__group">
                                 <label>Enter City</label>
                                 <input type="text" name="city" class="form-control m-input m-input--square" value="{{(isset($data['results']->city) ? $data['results']->city : '')}}" required>                        
                              </div>
                           </div>
                          </div>
                          <div class="row">
                           <div class="col-md-8">
                              <div class="form-group m-form__group">
                                 <label>Enter Education</label>
                                 <input type="text" name="education" class="form-control m-input m-input--square" value="{{(isset($data['results']->education) ? $data['results']->education : '')}}" required>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group m-form__group">
                                 <label>Number Of Positions</label>
                                 <input type="text" name="total_position" class="form-control m-input m-input--square" value="{{(isset($data['results']->total_position) ? $data['results']->total_position : '')}}" required>                         
                              </div>
                             </div>
                           </div>
                        <div class="row">
                           <div class="col-md-12 col-12">
                           <div class="form-group" id="full-container">
                           <label for="description">Job Details</label>
                            <div id="full-container">
                           <div class="editor">
                            <?=(isset($data['results']->description) ? $data['results']->description : '')?>
                           </div>
                       </div>
                       <textarea class="form-control d-none" name="description" rows="50" cols="100">{{(isset($data['results']->description) ? $data['results']->description : '')}}</textarea>
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
<script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
 <script src="{{asset('/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
 <script src="{{asset('/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/forms/form-quill-editor.js')}}"></script>

<script type="text/javascript">
// $('textarea[name=details]').val($('.ql-editor').html());
$( document ).ready(function() {
   $(document).on('click','.savepage',function(e) {
            e.preventDefault();
            $('textarea[name=description]').val($('.ql-editor').html());
            $('#form_submit').submit();
        });
    });
   $('.careers').addClass('sidebar-group-active');
   $('.post-job').addClass('active');
</script>
@endsection