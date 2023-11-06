@extends('frontend.layout.header') 
@section('css')
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
@endsection
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
<div class="container">
    <div class="breadcrumb-content">
        <h2>Login/Register</h2>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Login/Register</li>
            </ul>
        </nav>
    </div>
</div>
<div class="section-overlay"></div>
</section>
<!-- BreadCrumb Ends -->
<section class="login">
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="login-form">
                  @if(Session::has('login_msg'))
                       <div class="alert alert-danger p-2" >
                            {{ Session::get('login_msg') }}
                            @php
                                Session::forget('login_msg');
                            @endphp
                        </div>
                     @endif
                <form action="{{url('/userlog')}}" id="form_submit" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-title">
                                <h2>Login</h2>
                                <p>Register if you don't have an account.</p>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" id="Name1" placeholder="Enter username or email id" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" id="email1" placeholder="Enter correct password" required>
                        </div>
                        <div class="col-lg-12">
                            <div class="comment-btn">
                                <button type="submit" class="btn-blue btn-red">Login</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="login-accounts">
                                <a href="{{url('/forget_password')}}" class="forgotpw">Forgot Password ?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="login-form">
                <form id="form_register" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-title">
                                <h2>Register</h2>
                                <p>Enter your details to be a member.</p>
                            </div>
                        </div>
                        <input class="form-control" name="id" type="hidden">
                        <!-- <input class="form-control" name="status" type="hidden" value="Pending"> -->
                        <div class="form-group col-lg-12">
                            <label>First Name:</label>
                            <input type="text" id="user_name" class="form-control" name="first_name" placeholder="Enter first name" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Last Name:</label>
                            <input type="text" id="user_name" class="form-control" name="last_name" placeholder="Enter last name">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Register As</label>
                            <select name="role_id" class="form-control myselect" data-option-id="{{(isset($data['results']->role_id) ? $data['results']->role_id : '')}}" required>
                            <option value="">Select</option>
                            @foreach($data['roles'] as $key=>$value)
                            @if($value->role_title == 'Admin')
                             <?php 
                             continue; 
                             ?>
                            @endif
                            <option value="{{$value->id}}">{{$value->role_title}}</option>
                            @endforeach
                             </select>
                        </div>
                          <div class="form-group col-lg-12 d-none refralcode">
                            <label>Referral Code</label>
                            <input type="text" class="form-control" name="referral_code" id="referral_code" value="" placeholder="Enter the affiliate referral code">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="abc@xyz.com" required>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Password :</label>
                            <input type="password" name="password" class="form-control" id="date" placeholder="Enter Password" required>
                        </div>
                        <div class="col-lg-12">
                            <div class="comment-btn">
                                <button type="submit" class="btn-blue btn-red btn-register">Register Now</button>
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
    $('#form_register').submit(function(e){
       e.preventDefault();
        var token = $('input[name=_token]').val();
        var formdata=$('#form_register').serialize();
       $.ajax(
                {
                    type:"post",
                    headers:{'X-CSRF-TOKEN': token},
                    url: "{{url('/businesregsave') }}",
                    dataType:"json",
                    data:formdata,
                    success:function(data)
                    {
                    if(data.response == 1){
                    Swal.fire('You Have Successufully Registerd !')
                    $('#form_register')[0].reset();
                    }
                    else if(data.response == 2){
                     Swal.fire('Invalid Referal Code')
                    }
                    else{
                     Swal.fire('Email is already exist ! Try a valid email')
                    }

                    }

                });
           });
    });
//to click the option of the select tag and take the value of that option
$(document).on('change','select[name=role_id]',function(){
  var value=$(this).val();
  if(value==3){
     $('.refralcode').removeClass('d-none');
  }else{
    $('.refralcode').addClass('d-none');
   }
});

</script>

@endsection