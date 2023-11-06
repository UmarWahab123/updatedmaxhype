@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">

  @endsection

  @section('breadcrumb')

    <h2 class="content-header-title float-left mb-0">Positons</h2>

    <div class="breadcrumb-wrapper">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{url('admin/Home')}}">Position</a>

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

               <form action="{{ url('admin/saveposition') }}" class="" id="form_submit" method="post">

                    {{ csrf_field() }}

                    <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">

                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>

                                        Career Position

                                    </label>

                                   <input  class="form-control" name="position_name" type="text" value="{{(isset($data['results']->position_name) ? $data['results']->position_name : '')}}" required>

                                  </input>

                                </div>

                            </div>

                          </div>

                            <div class="mt-2">    

                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

                         <a href="{{url('admin/position')}}" class="btn btn-outline-secondary">Back</a>

                      </div>  

                </form>

            </div>

        </div>

 </section>  

 </div>          

@endsection

@section('js')

<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

<script type="text/javascript">

   $('.careers').addClass('sidebar-group-active');

   $('.add-position').addClass('active');

   $('#form_submit').validate({

            rules: {

                'position_name': {

                    required: true

                },

            }

        });

</script>

@endsection