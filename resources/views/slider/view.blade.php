@extends('layout.header')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

@endsection

@section('content')

{{ csrf_field() }}

<section id="basic-datatable">

   <div class="row">

      <div class="col-12">

         <div class="card">

            <div class="card-header border-bottom">

               <h4 class="card-title">{{$data['page_title']}}</h4>

               <a class="btn btn-primary" href="{{url('admin/sliders')}}">Add Slider</a>

            </div>

            <div class="card-datatable p-2">

               <table class="table dynamic_table font-weight-bold">

                  <thead>

                     <tr role="row">

                        <th>Sr No</th>

                        <th>Heading</th>

                        <th>Sub Heading</th>

                        <th>Type</th>

                        <th>Button Text</th>

                        <th>File</th>

                        <th>Action</th>

                     </tr>

                  </thead>

                  <tbody>

                  @foreach($data['results'] as $key=>$value)

                  <tr>

                     <td>{{$key+1}}</td>

                     <td>{{$value->heading}}</td>

                     <td>{{$value->sub_heading}}</td>

                     <td>{{$value->type}}</td>

                     <td>{{$value->button_text}}</td>
                      <td><img src="{{url('/')}}/{{$value->file}}" width="60" height="60px"></td>

                     <td>
                     <div class="dropdown">
                     <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                     <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg><time></time>

                     </button>

                     <div class="dropdown-menu">

                     <a class="dropdown-item" href="{{url('admin/sliders/'.$value->id )}}">

                     <i data-feather="edit-2" class="mr-50"></i>

                     <span>Edit</span>

                     </a>

                     <a data-href="{{url('admin/deleteslide/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">

                     <i data-feather="trash" class="mr-50"></i>

                     <span>Delete</span>

                     </a>

                     </div>

                     </div>

                     </td>

                  </tr>

                  @endforeach

                  </tbody>

               </table>

            </div>

         </div>

      </div>

   </div>

</section>

@include('includes.delete')

@endsection

@section('js')

<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}">



<script type="text/javascript">

   $('.slider').addClass('active');

   $('.dynamic_table').DataTable();

</script>

@endsection