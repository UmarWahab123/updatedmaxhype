<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
<form id="form_product" class="add-form">
   {{ csrf_field() }}
   <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
   <input class="form-control" name="business_id" type="hidden" value="{{$data['users_id']}}">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group m-form__group">
            <label>Title</label>
            <input type="text" name="title" class="form-control m-input m-input--square" value="{{(isset($data['results']->title) ? $data['results']->title : '')}}" required>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-12">
         <div class="form-group" id="full-container">
            <label for="description">Description & Location</label>
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
   <div class="row">
      <div class="col-md-3">
         <div class="form-group m-form__group">
            <label>Price</label>
            <input type="text" name="price" class="form-control m-input m-input--square" value="{{(isset($data['results']->price) ? $data['results']->price : '')}}" required>
         </div>
      </div>
        <div class="col-md-3">
         <div class="form-group m-form__group">
            <label>Refundable </label>
            <select name="refundable" class="form-control" data-option-id="{{(isset($data['results']->refundable) ? $data['results']->refundable : '')}}">
               <option value="">Select</option>
               <option>Yes</option>
               <option>No</option>
            </select>
         </div>
      </div>
      <div class="col-md-3">
         <div class="form-group m-form__group ml-2"><br><br>
            <input {{(isset($data['results']->id) ? $data['results']->tickets_available==1 ? 'checked' : '' : '')}} type="checkbox" id="check-tickets" name="tickets_available" value="1">
            <label for="vehicle1">Available Tickets</label><br>
         </div>
      </div>
      <div class="col-md-3 {{(isset($data['results']->id) ? $data['results']->tickets_available==1 ? '' : 'd-none' : 'd-none')}}  total-tickets">
         <div class="form-group m-form__group">
            <label>Total Tickets</label>
            <input type="text" id="total_tickets" name="total_tickets" class="form-control m-input m-input--square" value="{{(isset($data['results']->total_tickets) ? $data['results']->total_tickets : '')}}">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4 {{(isset($data['results']->id) ? $data['results']->tickets_available==1 ? '' : 'd-none' : 'd-none')}} fee">
         <div class="form-group m-form__group">
            <label>Fee</label>
            <input type="text" id="fee" name="fee" class="form-control m-input m-input--square" value="{{(isset($data['results']->fee) ? $data['results']->fee : '')}}" required>
         </div>
      </div>
   </div>
   <div class="row">
   <div class="col-lg-12">
      <div class="form-group" >
         <label>
         Upload Product Display Picture
         </label>
         <div  action="{{url('admin/upload_file?url=-public-uploads-businessproduct') }}" class="dropzone" id="dropzoneproductupload">
            <div class="dz-message">Drop files here or click to upload.</div>
         </div>
      </div>
   </div>
   <input type="hidden" name="product_dp" class="form-control m-input m-input--square" value="{{(isset($data['results']->product_dp) ? $data['results']->product_dp : '')}}">
</div>
<img src="{{isset($data['results']->product_dp) ?url('/').''. $data['results']->product_dp:''}}" width="90" height="80">
   <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary saveproduct">Save</button>
   </div>
</form>
<script src="{{asset('/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/forms/form-quill-editor.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script>
   DropzoneSinglefunc('dropzoneproductupload','.png,.jpg,.jpeg',1.,'product_dp');

   $( document ).ready(function() {
     $('#check-tickets').change(function(){
       if($(this).is(":checked")) {
           $('.total-tickets').removeClass("d-none");
           $('.fee').removeClass("d-none");
   
       }
       else{
           $('.total-tickets').addClass("d-none");
           $('.fee').addClass("d-none");
           $('#total_tickets').val('');
       }
   });
   });
   
$('select[data-option-id]').each(function() {
        $(this).val($(this).data('option-id'));
    });

</script>