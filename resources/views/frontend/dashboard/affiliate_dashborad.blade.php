@extends('frontend.layout.header') 
@section('css')
<link href="{{asset('/frontend/css/dashboard.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/frontend/css/dropzone.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/frontend/css/icons.css')}}" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

@endsection
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
   <div class="container">
      <div class="breadcrumb-content">
         <h2>Affiliate Dashboard</h2>
         <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Affiliate Dashboard</li>
            </ul>
         </nav>
      </div>
   </div>
   <div class="section-overlay"></div>
</section>
<section class="dashboard">
<div class="container">
<div class="card"><br><br>
    @if($data['type']=='Affiliates')
      <a class="pencell-icon"><i class="sl sl-icon-pencil"></i></a>
      @endif
    <div class="user-list-item ml-4 mb-5">
        <div class="user-list-image">
            <img class="display-pic" src="{{isset($data['results']->dp) ?url('/').''.$data['results']->dp:''}}" alt="">
        </div>
         <h2 class="profile-style">{{$data['results']->name}}</h2>
         <p class="business-email">{{$data['results']->email}}</p>
    </div>
    @if($data['type']=='Affiliates')
     <div class="ml-2 mt-3">    
      <button class="btn-blue btn-red text-white mr-5 update-profile same-class save-dp d-none">Click To Update</button>
      <a class="btn btn-secondary text-white back-rev same-class d-none">Back</a>
    </div>
       <form  id="form_submit2" class="ml-2 mr-2 mt-2 same-class d-none" enctype="multipart/form-data">
         <input class="form-control" name="id" type="hidden" value="{{$data['results']->id}}">
         <div action="<?=url('/').'/uploadfile?url=-public-uploads-affiliate'?>" class="dropzone" id="imagesupload2">
            <div class="fallback">
            </div>
         </div>
         <input type="hidden" name="dp" id="business-logo">
      </form>
      @endif
  <hr/>
   <div class="row ml-md-5">
   <div class="col-md-12">
      <ul class="nav nav-tabs">
         <li class="active"><a data-toggle="tab" href="#home">Basic Info</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li><a data-toggle="tab" href="#menu2">Businesses</a></li>
      </ul>
     <div class="tab-content">
         <div id="home" class="tab-pane active">
            @if($data['type'] =='Affiliates')
            <button class="btn-blue btn-red reserve text-white mr-4 edit-info">Edit Info</button><br>
            @endif
            <br>
            <div class="row">
               <div class="col-lg-12 col-md-12 col-xs-12 traffic">
                  <div class="dashboard-list-box">
                     <!-- Edit form-->
                     <form class="info-edit d-none form-info" enctype="multipart/form-data">
                         {{ csrf_field() }}
                          <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                         <input class="form-control" name="role_id" type="hidden" value="4">
                         <div class="mb-3">    
                            <button type="submit" class="btn-blue btn-red mb-1 mb-sm-0 mr-0 mr-sm-1 update-info">Save Changes</button>
                            <a class="btn btn-secondary text-white back-rev">Back</a>
                         </div>
                         <div class="card mr-5">
                            <div class="card-body">
                               <div class="col-md-12">
                                  <div class="row">
                                     <div class="col-md-4">
                                        <div class="form-group m-form__group">
                                           <label>Name</label>
                                           <input type="text" name="name" class="form-control" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="form-group m-form__group">
                                           <label>Email</label>
                                           <input type="email" name="email" class="form-control" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}">
                                        </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="form-group m-form__group">
                                           <label>Phone Number</label>
                                           <input type="text" name="phone" class="form-control" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}">
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
                     <div class="table-box affilate-info">
                @include('frontend.dashboard.affiliate-info')
                       
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
                     <h4 class="gray mb-2">All Related Businesses</h4>
                     <div class="table-box">
                        <table class="basic-table table-hover table-responsive">
                           <thead>
                              <tr role="row">
                                 <th>Sr No</th>
                                 <th>Owner Name</th>
                                 <th>Business Name</th>
                                 <th>Business Website Link</th>
                                 <th>Business Type</th>
                                 <th>Business Email</th>
                                 <th>Business Phone</th>
                                 <th>Business Country</th>
                                 <th>Business City</th>
                                 <th>Available ZipCode</th>
                                 <th>Discount</th>
                                 <th>Discount Code</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($data['businesses'] as $key=>$value)
                              <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$value->owner_name}}</td>
                                 <td>{{$value->name}}</td>
                                 <td>{{$value->site_link}}</span></td>
                                 <td>{{$value->type}}</td>
                                 <td>{{$value->email}}</td>
                                 <td>{{$value->phone}}</td>
                                 <td>{{$value->country}}</td>
                                 <td>{{$value->city}}</td>
                                 <td>{{$value->postal_code}}</td>
                                 <td>{{$value->discount}}</td>
                                 <td>{{$value->discount_code}}</td>
                                 <td>{{$value->status}}</td>
                                 <td>
                                  <div class="user-btns">
                                    <a href="{{url('dashboard/'.$value->id.'/affiliate')}}" class="button view-button">View {{$value->feature}}</a>
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
         </div>
      </div>
   </div>
   </div>
</section>
<div class="container">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <!-- <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div> -->
        
        <!-- Modal body -->
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="modal-div">


         </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="{{asset('/frontend/js/dashboard-custom.js')}}"></script>
<script src="{{asset('/frontend/js/dropzone.js')}}"></script>
<script src="{{asset('/frontend/js/dropzonescript.js')}}"></script>

<script type="text/javascript">
  //to add and remove d-none class
    $(".pencell-icon").click(function(){
         $('.same-class').removeClass("d-none");
    });
     $(".update-profile").click(function(){
         $('.same-class').addClass("d-none");
    });
     $(".back-rev").click(function(){
         $('.same-class').addClass("d-none");
    });
 $(document).ready(function() {
 $(document).on('click','.save-dp',function(){
        var token = $('input[name=_token]').val();
        var formdata=$('#form_submit2').serialize();
       $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('/saveprofile') }}",
                    dataType:"json",
                    data:formdata,
                    success:function(data)
                    {
                     $(".display-pic").attr("src",data.response);
                    Swal.fire('Your Profile Picture has been Updated Successufully !')
                    }

                });
           });
  $('.view-button').click(function(){
   var id = $(this).attr('id');
   var type = $(this).attr('type');
    $.ajax({
              type:"get",
              url: "{{url('/reservationmodal')}}/"+id+'/'+type,
              dataType: "json",
              success:function(data)
              { 
               $('.modal-div').html(data.response);
               // $("#myModal .close").click();

               // // $('.btnmodal').click()
               // $('#info').modal('show');
             }
          }); 
     });
  //Ajax Call for Edit the Affiliate info
   $(document).on('click','.update-info',function(e){
      e.preventDefault();
        var token = $('input[name=_token]').val();
        var formdata=$('.form-info').serialize();
       $.ajax(
                {
                    type:"post",
                    headers:{'X-CSRF-TOKEN': token},
                    url: "{{url('/saveinfo') }}",
                    dataType:"json",
                    data:formdata,
                    success:function(data)
                    {
                   $('.affilate-info').html(data.response);
                    Swal.fire('Your Basic Info has been Successufully Updated !')
                    }

                });
           });
    
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
      $(".update-info").click(function(){
         $('.info-edit').addClass("d-none");
         $('.info-table').removeClass("d-none");
    });
   });
</script>
@endsection
