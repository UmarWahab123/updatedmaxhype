 <div id="menu2" class="tab-pane fade">
      <div class="dashboard-list-box all-videos">
         <h4 class="gray">Business Videos</h4>
         @if($data['type'] =='business')
         <button data-id="-1" data-user="{{$data['results']->id}}" data-toggle="modal" data-target="#myModal" class="btn-blue btn-red reserve text-white mr-auto mt-2 btn-video">Add Video</button><br><br><br>@endif
        
         <div class="videosdata">
        @include('frontend.dashboard.all_videos')
     </div>
   </div>
</div>