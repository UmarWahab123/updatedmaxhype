@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

@endsection

@section('breadcrumb')

<h2 class="content-header-title float-left mb-0">User Video</h2>

<div class="breadcrumb-wrapper">

   <ol class="breadcrumb">

      <li class="breadcrumb-item"><a href="{{url('admin/Home')}}">Videos</a>

      </li>

      <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>

      </li>

   </ol>

</div>

@endsection

@section('content')

<div class="content-body">

   <section id="basic-input">

      <div class="card">

         <div class="card-body">

            <form action="{{ url('admin/savevideo') }}" id="form_submit" method="post">

               {{ csrf_field() }}

               <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

               <div class="row">

                  <div class="col-md-6">

                     <div class="form-group m-form__group">

                        <label>Choose Business</label>

                        <select class="form-control" name="users_id" value="{{isset($data['business']->users_id) ? $data['business']->users_id : ''}}" required>

                         @foreach($data['business'] as $key=>$value)

                        <option value="{{$value->id}}">{{$value->name}}</option>

                         @endforeach

                      </select>                               

                     </div>

                  </div>

                  <div class="col-md-6">

                     <div class="form-group">

                        <label>Enter Video URL  </label>

                        <input  class="form-control" name="video_url" type="text" value="{{(isset($data['results']->video_url) ? $data['results']->video_url : '')}}" required>

                        </input>

                     </div>

                  </div>

               </div>

               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

               <a href="{{url('admin/video')}}" class="btn btn-outline-secondary">Back</a>

               </input>

               </input>

            </form>

         </div>

      </div>

   </section>

</div>

@endsection

@section('js')

<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

<script type="text/javascript">

   $('.usermgt').addClass('sidebar-group-active');

   $('.videos').addClass('active');

   $('#form_submit').validate({

       rules: {

           'video_url': {

               required: true

           },

       }

   });

</script>

@endsection