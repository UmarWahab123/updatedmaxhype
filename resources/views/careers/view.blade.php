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
               <a class="btn btn-primary" href="{{url('admin/careers')}}">Add Career</a>
            </div>
            <div class="card-datatable p-2">
               <table class="table dynamic_table font-weight-bold">
                  <thead>
                     <tr role="row">
                        <th>Sr No</th>
                        <th>Job Title</th>
                        <th>Position Name</th>
                        <th>Number of Positions</th>
                        <th>Last Date</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($data['results'] as $key=>$value)
                     <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{isset($value->position->position_name) ? $value->position->position_name : ''}}</td>
                        <td>{{$value->total_position}}</td>
                        <td>{{$value->date}}</td>
                        <td></td>
                        <td>
                        <div class="dropdown">
                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item careerss" data-id="{{$value->id}}">
                        <i data-feather="file-text" class="mr-50"></i>
                        <span>Detail</span>
                        </a>
                        <a class="dropdown-item" href="{{url('admin/careers/'.$value->id )}}">
                        <i data-feather="edit-2" class="mr-50"></i>
                        <span>Edit</span>
                        </a>
                        <a data-href="{{url('admin/deletecareers/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
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

 <div class="modal-size-lg d-inline-block">
     <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel17">Job Details</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                   <div class="modaldiv"></div>
                 </div>
   
             </div>
         </div>
     </div>
 </div>

@include('includes.delete')
@endsection
@section('js')
<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}">

<script type="text/javascript">
   $('.careers').addClass('sidebar-group-active');
   $('.all-job').addClass('active');
   $('.dynamic_table').DataTable();

  $(".careerss").click(function(){
   var id = $(this).attr('data-id'); 
        $.ajax({
                    type:"get",
                    url: "{{url('admin/careermodal')}}/"+id,
                    dataType: "json",
                    success:function(data)
                    { 
                        $('.modaldiv').html(data.response);                
                        // $('.btnmodal').click()
                        $('#large').modal('show');
                    }
                });
           });

</script>

@endsection