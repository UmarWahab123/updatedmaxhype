@extends('frontend.layout.header') 
@section('css')
 <link href="{{asset('/frontend/css/dashboard.css')}}" rel="stylesheet" type="text/css">
 <link href="{{asset('/frontend/css/dropzone.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
   <div class="container">
      <div class="breadcrumb-content">
         <h2>Business Dashboard</h2>
         <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Business Dashboard</li>
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
            <img class="business_image" src="{{isset($data['results']->dp) ?url('/').''.$data['results']->dp:''}}" alt="">
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
         <li><a data-toggle="tab" href="#menu1">Images</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li><a data-toggle="tab" href="#menu2">Videos</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li><a data-toggle="tab" href="#menu3">{{$data['results']->feature}}</a></li>
      </ul>
     <div class="tab-content">

    @include('frontend.dashboard.partial.basic_info')

 
    @include('frontend.dashboard.partial.images')


    @include('frontend.dashboard.partial.videos')

    @include('frontend.dashboard.partial.features')

    </div>
   </div>
 </div>
</div>
</div>
</section>
<div class="container">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Save Video</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        <div class="modal-div">

        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{asset('/frontend/js/dashboard-custom.js')}}"></script>
<script src="{{asset('/frontend/js/dropzone.js')}}"></script>
<script src="{{asset('/frontend/js/dropzonescript.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function(){
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
    $(".business-info").click(function(){
         $('.info-edit').addClass("d-none");
         $('.info-table').removeClass("d-none");
    });
   //Ajax Call for Edit the Business info
   $(document).on('click','.business-info',function(e){
      e.preventDefault();
        var token = $('input[name=_token]').val();
        var formdata=$('.info-edit').serialize();
       $.ajax(
               {
                 type:"post",
                 headers:{'X-CSRF-TOKEN': token},
                 url: "{{url('/saveinfo2') }}",
                 dataType:"json",
                 data:formdata,
                 success:function(data)
                 {
                 $('.business-info').html(data.response);
                 Swal.fire('Your Basic Business Info has been Successufully Updated !')
                  }

                });
           });
     $(document).on('click','.upload-logo',function(){
        var token = $('input[name=_token]').val();
        var formdata=$('#form_submit1').serialize();
       $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('/savelogo') }}",
                    dataType:"json",
                    data:formdata,
                    success:function(data)
                    {
                         $(".business_image").attr("src",data.response);
                         Swal.fire('Your Business Logo has been Successufully Updated !')

                        // $("#myModal .close").click();
                    }

                });
           });
    $(document).on('click','.upload-images',function(){
        var token = $('input[name=_token]').val();
        var formdata=$('#business-img').serialize();
       $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('/saveimages') }}",
                    dataType: "json",
                    data:formdata,
                    success:function(data)
                    {
                        $('.imagesdata').html(data.response);
                        Swal.fire('Your Business Images has been Successufully Added !')
                        // $("#myModal .close").click();
                    }

                });
           });
  $(document).on('click','.btn-video',function(){
        var token = $('input[name=_token]').val();
        var users_id = $(this).attr('data-user');
        var id = $(this).attr('data-id');
        $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('/videomodal') }}",
                    dataType: "json",
                    data:{'id':id,'users_id':users_id},
                    success:function(data)
                    {
                        $('.modal-div').html(data.response);

                        // $('#savemodal').modal('show');

                    }

             });
           });

      $(document).on('click','.savevideo',function(e){
        // $(document).off('click','.savevideo');
        e.preventDefault();
        var token = $('input[name=_token]').val();
        var formdata=$('#form_submit').serialize();
        $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('/savevideos') }}",
                    dataType: "json",
                    data:formdata,
                    success:function(data)
                    {
                        $('.videosdata').html(data.response);
                        $("#myModal .close").click();
                        Swal.fire('Your Business Video has been Successufully Added !')
                    }

                });
           });
       $(document).on('click','.del-video',function(){
        var token = $('input[name=_token]').val();
        var id = $(this).attr('data-id');
        var current=$(this);
        $.ajax(
                {
                    type:"get",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('/deletevideo') }}/"+id,
                    dataType: "json",
                    success:function(data)
                    {   
                    current.parent('.col-md-3').remove();
                    Swal.fire('Your Business Video has been Successufully Deleted !') 
                    // setTimeout(function () {
                    //    location.reload(true);
                    //  }, 1000);
                        // $('.modal-div').html(data.response);

                        // $('#savemodal').modal('show');

                    }

             });
           });

     $(".country").change(function(){
     var id = $(this).val();
     // alert(id);
     $.ajax({
              type:"get",
              url: "{{url('/getcities')}}/"+id,
              dataType: "json",
              success:function(data)
              { 
                 $('.city').html(data.response); //to write the respone in the city drop 
                  @if(isset($data['results']->id));  //to write the selected city name 
                  var city='{{$data['results']->city}}';//for the edit purpose
                  $('.city').val(city);
                  @endif 
              }
          });
    });
     //to triggerd the zip code from the selected city and then write on the zipcode input
   $(".city").change(function(){
      var zip = $(this).find('option:selected').attr('data-zipcode');
      $('.zipcode').val(zip);
      
      });
 //to triggerd the selected country id  
@if(isset($data['results']->id))
   setTimeout(function(){ 
      $('.country').trigger('change'); 
     }, 2000);
   @endif
 });


</script>
@endsection
