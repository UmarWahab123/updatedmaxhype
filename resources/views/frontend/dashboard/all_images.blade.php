<div class="row">
 @if(isset($data['results']->images) && !empty($data['results']->images))
   @foreach(json_decode($data['results']->images) as $row)
   <div class="col-md-3  mt-2">
      <img src="{{url('/')}}{{isset($row)?$row:''}}" alt="" class="pimg" width="100px" height="150px">
   </div>
   @endforeach
  @endif
</div>

