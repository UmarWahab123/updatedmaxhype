@extends('frontend.layout.header') 

@section('css')

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

 <link href="{{asset('/frontend/css/dropzone.css')}}" rel="stylesheet" type="text/css">
 <style>input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
}

input[type=number] {
  -moz-appearance: textfield;
}</style>

@endsection

@section('content')

<section class="breadcrumb-outer text-center">

   <div class="container">

      <div class="breadcrumb-content">

         <h2>Join Us</h2>

         <nav aria-label="breadcrumb">

            <ul class="breadcrumb">

               <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

               <li class="breadcrumb-item"><a href="{{url('/careers')}}">Careers</a></li>

               <li class="breadcrumb-item active" aria-current="page">Join Us</li>

            </ul>

         </nav>

      </div>

   </div>

   <div class="section-overlay"></div>

</section>

<section class="booking">

    <div class="container justify-content-center align-items-center">

        <div class="row">

            <div class="col-md-12">

                <div class="booking-form booking-outer">

                    <h3 class="">Enter The Following Information To Apply For The Job .</h3>

                    <form class="formdata" id="apply-form" method="post">

                        {{ csrf_field() }}

                      <input type="hidden" name="status" value="Pending" class="form-control">

                      <input type="hidden" name="careers_id" value="{{$data['id']}}" class="form-control">

                        <div class="row">

                            <div class="form-group col-md-6">

                                <label>First Name</label>

                                <input type="text" id="user_name" name="first_name" class="form-control"  placeholder="Enter first name" required>

                            </div>

                             <div class="form-group col-md-6">

                                <label>Last Name</label>

                                <input type="text" id="user_name" name="last_name" class="form-control" placeholder="Enter last name" required>

                            </div>

                          </div>

                           <div class="row">

                            <div class="form-group col-md-6">

                                <label>Email</label>

                                <input type="email" name="email" class="form-control" placeholder="abc@xyz.com" required>

                            </div>

                             <div class="form-group col-md-6">

                                <label>Phone</label>

                                <input type="number" name="phone" class="form-control"  placeholder="XXXX-XXXXXX" required>

                            </div>

                            </div>

                            <div class="row">

                            <label class="cv-lable-style">Upload your CV</label>

                            <div class="col-md-12">

                             <div action="<?=url('/').'/uploadfile?url=-public-uploads-resume'?>" class="dropzone" id="imagesupload3">

                              <div class="fallback">

                              </div>

                           </div>

                           <input type="hidden" name="cv_file" required>

                        </div>

                        </div>

                        <div class="row">

                           <div class="col-md-12">

                            <div class="form-group m-form__group">

                             <label>Your Objective</label>

                               <textarea type="text" name="objective" rows="5" class="form-control m-input m-input--square"></textarea>

                             </div>

                         </div>

                      </div>

                      <div class="row">

                         <div class="col-xs-12">

                             <div class="text-right">

                                 <button type="submit" class="btn-blue btn-red btn-booking">Submit</button>

                             </div>

                         </div>

                     </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script src="{{asset('/frontend/js/dropzone.js')}}"></script>

<script src="{{asset('/frontend/js/dropzonescript.js')}}"></script>

<script type="text/javascript">
$(document).on('keypress', '#user_name', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
 $(document).ready(function() {

    $('.formdata').submit(function(e){

      e.preventDefault();

        var token = $('input[name=_token]').val();
        var cv_file = $('input[name=cv_file]').val();

        if(cv_file==''){

            alert('Please upload CV file');

            return false;

        }
        $(".btn-booking").attr("disabled", true).html('Processing...');

        var formdata=$('.formdata').serialize();

       $.ajax(

                {

                    type:"post",

                    headers:{'X-CSRF-TOKEN': token},

                    url: "{{url('/save_applicant') }}",

                    dataType:"json",

                    data:formdata,

                    success:function(data)

                    {

                    Swal.fire('Your Application has been Successufully Submited !')

                    $('.formdata')[0].reset();  
                     $(".btn-booking").attr("disabled", false).html('Submit');
                    
                    }



                });

           });

    

    });



</script>

@endsection