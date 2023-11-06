@extends('frontend.layout.header') 
@section('css')
 <link href="{{asset('/frontend/css/dashboard.css')}}" rel="stylesheet" type="text/css">
 <link href="{{asset('/frontend/css/dropzone.css')}}" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
  <div class="row mb-3 mr-5 ml-5">
    <div class="col-md-3">
        <div class="card count-card">
          <h4 class="mt-2 ml-2 count-item">Total Images</h4> 
          <i class="far fa-images images-icon"></i>
          @if(!empty($data['results']->images)) 
          <h2 class="ml-3 count-num">{{count(json_decode($data['results']->images))}}</h2>
          @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="card count-card">
          <h4 class="mt-2 ml-2 count-item">Total Videos</h4> 
          <i class="fas fa-video videos-icon"></i> 
          <h2 class="ml-3 count-num">{{count($data['videos'])}}</h2>

        </div>
    </div>
   @if($data['results']->feature=='Reservation')
    <div class="col-md-3">
        <div class="card count-card">
          <h4 class="mt-2 ml-2 count-item">Total Reservations</h4>  
          <i class="far fa-list-alt reserve-icon"></i>
          <h2 class="ml-3 count-num">{{count($data['reservation'])}}</h2>
        </div>
    </div>
    @else
     <div class="col-md-3">
        <div class="card count-card">
          <h4 class="mt-2 ml-2 count-item">Total Purchase</h4>  
          <i class="far fa-list-alt reserve-icon"></i>
          <h2 class="ml-3 count-num">{{count($data['purchase'])}}</h2>
        </div>
    </div>
    @endif
    <div class="col-md-3">
        <div class="card count-card">
         <h4 class="mt-2 ml-2 count-item">Total Products</h4>  
          <i class="fas fa-list product-icons"></i>
          <h2 class="ml-3 count-num">{{count($data['products'])}}</h2>
        </div>
    </div>
  </div>
   <div class="row ml-md-5">
   <div class="col-md-12">
      <ul class="nav nav-tabs">
         <li class="tab active"><a data-toggle="tab" href="#home">Basic Info</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li class="tab"><a data-toggle="tab" href="#imagestab">Images</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li class="tab"><a data-toggle="tab" href="#videotab">Videos</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li class="tab"><a data-toggle="tab" href="#featuretab">{{$data['results']->feature}}</a></li>
         &nbsp&nbsp&nbsp&nbsp
         <li class="tab"><a data-toggle="tab" href="#producttab">Products</a></li>

      </ul>
     <div class="tab-content">
    
    @include('frontend.dashboard.partial.basic_info')

    @include('frontend.dashboard.partial.images')

    @include('frontend.dashboard.partial.videos')

    @include('frontend.dashboard.partial.features')

    <div id="producttab" class="tab-pane fade">
      @if(Auth::user()->id==$data['results']->id)
        @if($data['type'] =='business')    
        <button data-id="-1" data-user="{{$data['results']->id}}" class="btn-blue btn-red reserve text-white add-product">Add Products</button><br><br>
        @endif
        @endif
        <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 traffic">
        <div class="dashboard-list-box">
           <h4 class="gray mb-2">Business Products</h4>
           <div class="table-box allproducts">
            @include('frontend.dashboard.partial.products')
           </div>
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
<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Save Product</h3>
        <button type="button" class="close" id="close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="product-div">
           
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
$(".tab").click(function () {
    $(".tab").removeClass("active");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("active");   
});
    $("#close-modal").click(function(){
       $('#productModal').modal('hide');
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
    $(".save-info").click(function(){
         $('.info-edit').addClass("d-none");
         $('.info-table').removeClass("d-none");
    });
   //Ajax Call for Edit the Business info
   $(document).on('click','.save-info',function(e){
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
        var dp = $('input[name=dp]').val();
        if(dp==''){
            alert('Please select to upload business logo');
            return false;
        }
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
                    }

                });
           });
    $(document).on('click','.upload-images',function(){
        var token = $('input[name=_token]').val();
        var images = $('input[name=images]').val();
        if(images==''){
            alert('Please select to upload business images.');
            return false;
        }
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

      $(document).on('submit','#form_submit',function(e){
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
       //Ajax call for add Product
   $(document).on('click','#check-tickets',function(){
         // alert('test');
        if($(this).is(":checked")) {
        $('.total-tickets').removeClass("d-none");
       }else{
        $('.total-tickets').addClass("d-none");

       }

      });   
       $(document).on('click','.add-product',function(){
        var token = $('input[name=_token]').val();
        var users_id = $(this).attr('data-user');
        var id = $(this).attr('data-id');
        $('#productModal').find('.product-div').html('<p>Loading...</p>');
        $('#productModal').modal('show');
        $.ajax(
                {
                 type:"post",
                 headers: {'X-CSRF-TOKEN': token},
                 url: "{{url('/productmodal') }}",
                 dataType: "json",
                 data:{'id':id,'users_id':users_id},
                 success:function(data)
                 {
                     $('.product-div').html(data.response);
                     // $('#myModal').find('.modaldiv').html(data.response);
                     // $('#productModal').modal('hide');
                     $('#check-tickets').trigger('click');



                 }

             });
           });
        $(document).on('submit','#form_product',function(e){
        e.preventDefault();
        var token = $('input[name=_token]').val();
        $('textarea[name=description]').val($('.ql-editor').html());
         var formData = new FormData(this);
         // console.log('formData',formData);

        $.ajax({
                type:"post",
                headers: {'X-CSRF-TOKEN': token},
                url: "{{url('/saveproduct') }}",
                dataType: "json",
                data:formData,
                success:function(data)
                    {
                        $('.allproducts').html(data.response);
                        $('#productModal').modal("hide");
                        Swal.fire('Product has been Successufully Save !')
                        // $('#check-tickets').trigger('click');
                    },
                 cache: false,
                contentType: false,
                processData: false

                });
           });
      $(document).on('click','.savepage',function(e) {

            e.preventDefault();

            $('textarea[name=description]').val($('.ql-editor').html());

            $('#form_product').submit();

        });


     $(document).on('click','.del-product',function(e){
        e.preventDefault();
        var token = $('input[name=_token]').val();
        var id = $(this).attr('data-id');
        var user_id =$(this).attr('data-user');
        var type ='business';
        $.ajax(
                {
                    type:"get",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('/deleteproduct') }}/"+id,
                    dataType: "json",
                    success:function(data)
                    {   
                    $('.allproducts').html(data.response);
                     Swal.fire('Product has been Successufully Deleted !')
                  
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
   $(document).on('change','.city',function(e){
      var other =$(this).val();
      // alert(other);
      if(other=='Other'){
        $('.otherinput').removeClass('d-none');
      }else{
        $('.otherinput').addClass('d-none');
       }
     });  


</script>
@endsection
