@if($data['type'] =='business')
<div class="row">
   @foreach($data['videos'] as $key=>$value)
      <div class="col-md-3">
     @if($data['type'] =='business')
      <a data-id="{{$value->id}}" data-user="{{$value->users_id}}" data-toggle="modal" data-target="#myModal" class="text-blue btn-video tem-style">Edit Video<a>
      <a data-id="{{$value->id}}" class="text-red del-video ml-3">Delete Video</a>
      @endif
      <iframe width="200" height="200"
         src="{{$value->video_url}}">
      </iframe>
      </div>
      @endforeach
</div>
@else                 <!--this if else is just to add mt-3 when type is not a business -->
<div class="row mt-3">
   @foreach($data['videos'] as $key=>$value)
      <div class="col-md-3">
     @if($data['type'] =='business')
      <a data-id="{{$value->id}}" data-user="{{$value->users_id}}" data-toggle="modal" data-target="#myModal" class="text-blue btn-video tem-style">Edit Video<a>
      <a data-id="{{$value->id}}" class="text-red del-video ml-3">Delete Video</a>
      @endif
      <iframe width="200" height="200"
         src="{{$value->video_url}}">
      </iframe>
      </div>
      @endforeach
</div>
@endif


