@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
@endsection
@section('breadcrumb')
   <h2 class="content-header-title float-left mb-0">Businesses</h2>
   <div class="breadcrumb-wrapper">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Business</a>
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
            @if($data['page_title']=="Update Business Details")
            <li class="nav-item">
               <a class="nav-link show active" id="account-pill-general" data-toggle="pill" href="#home" aria-expanded="true">
               <span class="font-weight-bold">Basic Info</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="account-pill-general" data-toggle="pill" href="#product" aria-expanded="true">
               <span class="font-weight-bold">Product</span>
               </a>
            </li>
            @endif
         </ul>
      </div>
   </div>
   <div class="content-body">
      <section id="basic-input">
         <div class="card">
            <div class="card-body">
               <div class="col-md-12">
                  <div class="tab-content">
                  <div id="home" class="tab-pane fade active in show">
                       <form action="{{ url('admin/savebusiness') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                         <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                              <!-- the bellow hidden id is product table -->
                             <input class="form-control" name="role_id" type="hidden" value="3">
                            <div class="col-md-12 text-right mb-2"> 
                           <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                           <a href="{{url('admin/business')}}" class="btn btn-outline-secondary">Back</a>
                        </div>
                     @include('business.partials.basic_info')  
                   </form>
                 </div>
               <div id="product" class="tab-pane fade">
                <a href="#" data-id="-1" data-user="{{isset($data['results']->id) ? $data['results']->id :''}}" class="btn btn-primary add-product mb-1" style="float: right;">Add Product</a>
                <div class="product-div">
                    @php echo isset($data['products']) ? $data['products'] : ''; @endphp
                </div>
               </div>
               </div>
               </input>
            </input>
         </div>
    </div>
</div>
</section>
</div>
<div class="modal-size-lg d-inline-block">
     <div class="modal fade text-left" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel17">Add Product</h4>
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

@endsection
@section('js')
<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script type="text/javascript">
   $('.business-mgt').addClass('sidebar-group-active');
   $('.add-Business').addClass('active');
   DropzoneSinglefunc('dropzoneupload','.png,.jpg,.jpeg',1.,'dp');
   DropzoneMultiplefunc('dpzremovethumb','.png,.jpg,.jpge',4.,'images');
   
   $(document).ready(function(){
     $(".country").change(function(){
     var id = $(this).val();
     // alert(id);
     $.ajax({
              type:"get",
              url: "{{url('admin/getcities')}}/"+id,
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

    $(document).on('click','.add-product',function(){
        var token = $('input[name=_token]').val();
        var users_id = $(this).attr('data-user');
        // alert(users_id);
        var id = $(this).attr('data-id');
        $('#myModal').find('.modaldiv').html('<p>Loading...</p>');
            $('#myModal').modal('show');
        $.ajax(
                {
                 type:"post",
                 headers: {'X-CSRF-TOKEN': token},
                 url: "{{url('admin/productmodal') }}",
                 dataType: "json",
                 data:{'id':id,'users_id':users_id},
                 success:function(data)
                 {
                     $('.modaldiv').html(data.response);
                     // $('#myModal').find('.modaldiv').html(data.response);
                      $('#large').modal('show');

                     // $('#savemodal').modal('show');

                 }

             });
           });

      $(document).on('click','.saveproduct',function(e){
        // $(document).off('click','.savevideo');
        e.preventDefault();
        var token = $('input[name=_token]').val();
        $('textarea[name=description]').val($('.ql-editor').html());
        var formdata=$('#form_product').serialize();
        $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('admin/saveproduct') }}",
                    dataType: "json",
                    data:formdata,
                    success:function(data)
                    {
                        $('.product-div').html(data.response);
                        $("#myModal .close").click();
                        // Swal.fire('Your Business Video has been Successufully Added !')
                    }

                });
           });

      $(document).on('click','.del-product',function(e){
        e.preventDefault();
        var token = $('input[name=_token]').val();
        var id = $(this).attr('data-id');
        var user_id = $(this).attr('data-user');
        $.ajax(
                {
                    type:"get",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('admin/deleteproduct') }}/"+id+'/'+user_id,
                    dataType: "json",
                    success:function(data)
                    {   
                    $('.product-div').html(data.response);

                    }

             });
           });


   });
</script>
@endsection