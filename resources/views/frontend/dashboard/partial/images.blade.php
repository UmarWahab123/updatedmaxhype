<div id="imagestab" class="tab-pane fade">
   <div class="dashboard-list-box">
      <h4 class="gray">Business Images</h4>
     @if(Auth::user()->id==$data['results']->id)
      @if($data['type'] =='business')
      <h3 class="text-center mt-4 mb-1">Upload Business Logo</h3>
      <form  id="form_submit1" enctype="multipart/form-data">
         <input class="form-control" name="id" type="hidden" value="{{$data['results']->id}}">
         <div action="<?=url('/').'/uploadfile?url=-public-uploads-business'?>" class="dropzone" id="imagesupload1">
            <div class="fallback">
            </div>
         </div>
         <input type="hidden" name="dp" id="business-logo" required>
      </form>
      <div class="row set-style">
         <div class="col-md-12">
            <button class="btn-blue btn-red reserve text-white mr-1 upload-logo">Save Logo</button><br><br>
            <h3 class="text-center ml-4">Upload Business Images</h3>
         </div>
      </div>
      <form  id="business-img" enctype="multipart/form-data" type="post">
         <input class="form-control" name="id" type="hidden" value="{{$data['results']->id}}">
         <div action="<?=url('/').'/uploadfile?url=-public-uploads-business'?>" class="dropzone" id="imagesupload">
            <div class="fallback">
            </div>
         </div>
         <input type="hidden" name="images" id="business-images">
         <input class="form-control" name="old_images" type="hidden" value="{{(isset($data['results']->images) ? $data['results']->images : '')}}">
      </form>
      <button type="submit" class="btn-blue btn-red reserve text-white mr-1 upload-images">Save Images</button><br>
      @endif
      @endif
      <br>
      <div class="imagesdata">
         @include('frontend.dashboard.all_images')
      </div>
   </div>
</div>
