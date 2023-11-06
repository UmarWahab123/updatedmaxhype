@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">Careers Management</h2>
<div class="breadcrumb-wrapper">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('admin/career')}}">Careers</a>
      </li>
      <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
      </li>
   </ol>
</div>
@endsection
@section('content')
<div class="row mb-2">
   <div class="col-md-8">
      <ul class="nav nav-pills mt-2 mb-xl-n50" role="tablist">
         <li class="nav-item">
            <a class="nav-link show active" id="account-pill-general" data-toggle="pill" href="#home" aria-expanded="true">
            <span class="font-weight-bold">Career Info</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="account-pill-general" data-toggle="pill" href="#home2" aria-expanded="true">
            <span class="font-weight-bold">Applicants</span>
            </a>
         </li>
      </ul>
   </div>
</div>
<div class="content-body">
      <section id="basic-datatable">
         <div class="card">
            <div class="card-body">
               <div class="col-md-12">
                  <div class="tab-content">
                 <div id="home" class="tab-pane fade active in show">
                  <table class="table dynamic_table font-weight-bold table-bordered">
                     <tbody>
                        <tr>
                           <td>Position Name</td>
                           <td>{{isset($data['career']->position->position_name) ? $data['career']->position->position_name : ''}}</td>
                        </tr>
                        <tr>
                           <td>Job Title</td>
                           <td>{{$data['career']->title}}</td>
                        </tr>
                        <tr>
                           <td>Country</td>
                           <td>{{$data['career']->country}}</td>
                        </tr>
                        <tr>
                           <td>City</td>
                           <td>{{$data['career']->city}}</td>
                        </tr>
                        <tr>
                           <td>Education</td>
                           <td>{{$data['career']->education}}</td>
                        </tr>
                        <tr>
                           <td>Total Positions</td>
                           <td>{{$data['career']->total_position}}</td>
                        </tr>
                        <tr>
                           <td>Salary Range</td>
                           <td>{{$data['career']->salary}}</td>
                        </tr>
                        <tr>
                           <td>Apply Last Date</td>
                           <td>{{$data['career']->apply_last_date}}</td>
                        </tr>
                        <tr>
                           <td>Posted Date & Time</td>
                           <td>{{$data['career']->created_at->format('Y.m.d')}}</td>
                        </tr>
                     </tbody>
                  </table>
                  <br>
                  <h4 class="text-center"><u>Job Description</u></h4>
                  <br>
                  <p>{{Str::words(strip_tags($data['career']->description), 200) }}</p>
               </div>
               <div id="home2" class="tab-pane fade">
                  <table class="table dynamic_table font-weight-bold table-responsive">
                     <thead>
                        <tr role="row">
                           <th>Sr No</th>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>CV</th>
                           <th>Objective</th>
                           <th>Status</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($data['applicant'] as $key=>$value)
                        <tr>
                           <td>{{$key+1}}</td>
                           <td>{{$value->first_name}}</td>
                           <td>{{$value->last_name}}</td>
                           <td>{{$value->email}}</td>
                           <td>{{$value->phone}}</td>
                           <td><img src="{{url('/')}}/{{$value->cv_file}}" width="60" height="60"></td>
                           <td>{{Str::words(strip_tags($value->objective), 15) }}</td>
                           <td><span class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span></td>
                           <td>
                        <div class="dropdown">

                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                         <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </button>

                        <div class="dropdown-menu">
                        <a data-id="{{$value->id}}" data-toggle="modal" data-target="#confirm-delete" class="dropdown-item confirm-select">

                        <i data-feather="file-text" class="mr-50"></i>

                        <span>Select</span>

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
   </div>
</section>
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
           
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Confirm Selection</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>

            <div class="modal-body">
            <form action="{{url('admin/select_aplicant')}}" method="post">
               {{ csrf_field() }}
                <input class="form-control" name="id" type="hidden" value="">
                   <div class="row">
                     <div class="col-md-12">

                        <div class="form-group m-form__group">

                           <label>Status</label>

                           <select name="status" class="form-control" required>

                              <option value="">Select</option>

                              <option>Accepted</option>

                              <option>Rejected</option>

                           </select>

                        </div>

                     </div>
                  </div>
                   <div class="row">
                        <div class="col-md-12">

                         <div class="form-group m-form__group">

                          <label>Add Email Details</label>

                            <textarea type="text" name="details" rows="5" class="form-control m-input m-input--square"></textarea>

                          </div>

                      </div>
                </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="Submit" class="btn btn-primary">Submit</button>

            </div>
            </form>
            </div>


        </div>

    </div>

</div>
@include('includes.delete')
@endsection
@section('js')
<script src="{{asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>

<script type="text/javascript">
   $('.careers').addClass('sidebar-group-active');
   $('.all-job').addClass('active');

$(document).on("click",".confirm-select",function(){
    var id = $(this).attr('data-id');
    $("input[name=id]").val(id);
});
</script>
@endsection