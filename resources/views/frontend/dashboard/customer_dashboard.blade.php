@extends('frontend.layout.header') 
@section('css')
<link href="{{asset('/frontend/css/dashboard.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
   <div class="container">
      <div class="breadcrumb-content">
         <h2>Customer Dashboard</h2>
         <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Customer Dashboard</li>
            </ul>
         </nav>
      </div>
   </div>
   <div class="section-overlay"></div>
</section>
<section class="dashboard">
<div class="container">
<div class="card"><br><br>
    <div class="user-list-item ml-4">
        <div class="user-list-image">
            <img src="{{$data['results']->dp}}" alt="">
        </div>
            <h2 class="profile-style">{{$data['results']->name}}</h2>
            <p class="business-email">{{$data['results']->email}}</p>
    </div>
  <hr/>
   <div class="row ml-md-5">
   <div class="col-md-12">
      <ul class="nav nav-tabs">
         <li class="active"><a data-toggle="tab" href="#home">Basic Info</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li><a data-toggle="tab" href="#menu2">Purchases</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li><a data-toggle="tab" href="#menu3">Reservations</a></li>
         &nbsp&nbsp&nbsp&nbsp
      </ul>
     <div class="tab-content">
         <div id="home" class="tab-pane active">
          <button class="btn-blue btn-red reserve text-white mr-4 edit-info">Edit Info</button><br><br>
            <div class="row">
               <div class="col-lg-12 col-md-12 col-xs-12 traffic">
                  <div class="dashboard-list-box">
                     <!-- Edit form-->
                     <form class="info-edit d-none" enctype="multipart/form-data">
                         {{ csrf_field() }}
                          <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                         <input class="form-control" name="role_id" type="hidden" value="5">
                         <div class="mb-3">    
                            <button type="submit" class="btn-blue btn-red mb-1 mb-sm-0 mr-0 mr-sm-1 save-info">Save Changes</button>
                            <a class="btn btn-secondary text-white back-rev">Back</a>
                         </div>
                         <div class="card mr-5">
                            <div class="card-body">
                               <div class="col-md-12">
                                  <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                           <label>First Name</label>
                                           <input type="text" name="first_name" class="form-control" value="{{(isset($data['results']->first_name) ? $data['results']->first_name : '')}}">
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                           <label>Last Name</label>
                                           <input type="text" name="last_name" class="form-control" value="{{(isset($data['results']->last_name) ? $data['results']->last_name : '')}}">
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                           <label>Email</label>
                                           <input type="email" name="email" class="form-control" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}">
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                           <label>Contact Number</label>
                                           <input type="text" name="phone" class="form-control" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}">
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group m-form__group">
                                           <label>Address</label>
                                           <input type="text" name="address" class="form-control" value="{{(isset($data['results']->address) ? $data['results']->address : '')}}">
                                        </div>
                                     </div>
                                      <div class="col-md-3">
                                        <div class="form-group m-form__group">
                                           <label>Postal Code</label>
                                           <input type="text" name="postal_code" class="form-control" value="{{(isset($data['results']->postal_code) ? $data['results']->postal_code : '')}}">
                                        </div>
                                     </div>
                                     <div class="col-md-3">
                                        <div class="form-group m-form__group">
                                           <label>Status</label>
                                           <input type="text" name="status" class="form-control" value="{{(isset($data['results']->status) ? $data['results']->status : '')}}">
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </form>
                <!-- End form -->
                  <div class="info-table">
                     <h4 class="gray">{{$data['results']->name}} Information</h4>
                     <div class="table-box customer-info">
                    @include('frontend.dashboard.customer-info')
                      
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="menu2" class="tab-pane fade">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-xs-12 traffic">
                  <div class="dashboard-list-box">
                     <h4 class="gray mb-2">All Purchases</h4>
                     <div class="table-box">
                        <table class="basic-table table-hover">
                           <thead>
                              <tr role="row">
                                 <th>Sr No</th>
                                 <th>Business Name</th>
                                 <th>Date</th>
                                 <th>Time</th>
                                 <th>Remarks</th>
                                 <th>Number Of People</th>
                                 <th>Total Tickets</th>
                                 <th>Price</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($data['purchase'] as $key=>$value)
                              <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{isset($value->business_name->name) ? $value->business_name->name : ''}}</td>
                                 <td>{{$value->date}}</td>
                                 <td>{{$value->time}}</span></td>
                                 <td>{{$value->remarks}}</td>
                                 <td>{{$value->people}}</td>
                                 <td>{{$value->total_tickets}}</td>
                                 <td>{{$value->price}}</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="menu3" class="tab-pane fade">
             <div class="row">
               <div class="col-lg-12 col-md-12 col-xs-12 traffic">
                  <div class="dashboard-list-box">
                     <h4 class="gray mb-2">All Reservations</h4>
                     <div class="table-box">
                        <table class="basic-table">
                           <thead>
                              <tr role="row">
                                 <th>Sr No</th>
                                 <th>Business Name</th>
                                 <th>Date</th>
                                 <th>Time</th>
                                 <th>Remarks</th>
                                 <th>Number Of People</th>
                                 <th>Total Tickets</th>
                                 <th>Price</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($data['reservation'] as $key=>$value)
                              <tr>
                                 <td>{{$key+1}}q</td>
                                 <td>{{isset($value->business_name->name) ? $value->business_name->name : ''}}</td>
                                 <td>{{$value->date}}</td>
                                 <td>{{$value->time}}</span></td>
                                 <td>{{$value->remarks}}</td>
                                 <td>{{$value->people}}</td>
                                 <td>{{$value->total_tickets}}</td>
                                 <td>{{$value->price}}</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </div>
   </div>
   </div>
</section>

@endsection
@section('js')
<script src="{{asset('/frontend/js/dashboard-custom.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
 //to triger the dropdown selected option
    $('select[data-option-id]').each(function (){
        $(this).val($(this).data('option-id'));
      });
    //to add and remove d-none class
    $(".edit-info").click(function(){
         $('.info-edit').removeClass("d-none");
         $('.info-table').addClass("d-none");
    });
     $(".back-rev").click(function(){
         $('.info-edit').addClass("d-none");
         $('.info-table').removeClass("d-none");
    });
    $(".save-info").click(function(){
      $('.info-edit').addClass("d-none");
      $('.info-table').removeClass("d-none");
    });
   //Ajax Call for edit the Customer info
    $(document).on('click','.save-info',function(e){
      e.preventDefault();
        var token = $('input[name=_token]').val();
        var formdata=$('.info-edit').serialize();
       $.ajax(
                {
                    type:"post",
                    headers:{'X-CSRF-TOKEN': token},
                    url: "{{url('/saveinfo1') }}",
                    dataType:"json",
                    data:formdata,
                    success:function(data)
                    {
                    $('.customer-info').html(data.response);
                    Swal.fire('Your Basic Info has been Successufully Updated !')
                    }

                });
           });
   });
</script>
@endsection
