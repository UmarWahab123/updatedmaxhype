@extends('frontend.layout.header')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<style>input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}
input[type=number] {
  -moz-appearance: textfield;
}</style>

@endsection

@section('content')

<!-- Breadcrumb -->

<div class="container">

    <section class="breadcrumb-outer text-center">

        <div class="container">

            <div class="breadcrumb-content">

                <h2>Contact Us Page</h2>

                <nav aria-label="breadcrumb">

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>

                    </ul>

                </nav>

            </div>

        </div>

        <div class="section-overlay"></div>

    </section>

    <!-- BreadCrumb Ends -->


    <section class="contact">

        <div class="container">

            <div class="row">

                <div class="col-lg-8">

                    <div id="contact-form" class="contact-form">



                        <div id="contactform-error-msg"></div>



                        <form name="contactform" class="contact-us">

                         {{ csrf_field() }}

                        <input class="form-control" name="id" type="hidden">

                            <div class="row">

                                <div class="form-group col-lg-4">

                                    <label>Name:</label>

                                    <input type="text" name="name" class="form-control" id="user_name" placeholder="Enter full name" required>

                                </div>
                                {{-- @php $business = getFormdata($formdata) @endphp --}}

                                <div class="form-group col-lg-4">

                                    <label>Email:</label>

                                    <input type="email" name="email" class="form-control" id="email" placeholder="abc@xyz.com" required>

                                </div>

                                <div class="form-group col-lg-4 col-left-padding">

                                    <label>Phone Number:</label>

                                    <input type="number" name="phone" class="form-control" id="phnumber" placeholder="XXXX-XXXXXX" required   onkeypress="return isNumberKey(event)">

                                </div>

                                <div class="textarea col-lg-12">

                                    <label>Message:</label>

                                    <textarea name="message" placeholder="Enter a message" required></textarea>

                                </div>

                                <div class="col-lg-4">

                                    <div class="">

                                         <button type="submit" class="btn-blue btn-red btn-contact dssdsdfs">Submit</button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="contact-about footer-margin">

                        <h4>Get In Touch</h4>

                        <div class="contact-location">

                            <ul>

                               <!--  <li><i class="flaticon-maps-and-flags" aria-hidden="true"></i> Location</li>

                                <li><i class="flaticon-phone-call"></i> (012)-345-6789</li>

                                <li><i class="flaticon-mail"></i>info@themaxhype.com</li> -->

                            </ul>

                        </div>

                        <div class="footer-social-links">

                            <ul>

                                <li class="social-icon"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                                <li class="social-icon"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

                                <li class="social-icon"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

                                <li class="social-icon"><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>

                                <li class="social-icon"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    </div>

@endsection

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

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

    $('.contact-us').submit(function(e){

      e.preventDefault();

        var token = $('input[name=_token]').val();

        $(".dssdsdfs").attr("disabled", true).html('Processing...');

        var formdata=$('.contact-us').serialize();
       $.ajax(

                {

                    type:"post",

                    headers:{'X-CSRF-TOKEN': token},

                    url: "{{url('/savecontact') }}",

                    dataType:"json",

                    data:formdata,

                    success:function(data)

                    {

                    Swal.fire('Your Contact Info has been Successufully Submited !')
                    $('.contact-us')[0].reset();
                    $(".dssdsdfs").attr("disabled", false).html('Submit');


                    }



                });

           });



    });



</script>

@endsection

