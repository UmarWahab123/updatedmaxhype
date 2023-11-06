<form  id="form_submit" class="add-form" method="post">
   {{ csrf_field() }}
   <div class="">
      <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
        <input class="form-control" name="users_id" type="hidden" value="{{$data['users_id']}}">
      <div class="row">
         <div class="col-md-12">
            <div class="form-group">
               <label>Enter Video URL</label>
               <input  class="form-control" name="video_url" type="text" value="{{(isset($data['results']->video_url) ? $data['results']->video_url : '')}}">
               </input required>
            </div>
         </div>
      </div>
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
   </div>
</form>
<script type="text/javascript">
     $("#form_submit").validate({
             rules: {
                 video_url: {
                         required: true,
                     },
             },
             });
</script>