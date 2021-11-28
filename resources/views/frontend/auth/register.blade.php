@extends('frontend.layout.header') 
@section('css')

@endsection
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
<div class="container">
    <div class="breadcrumb-content">
        <h2>Login/Register Page3</h2>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login/Register Page</li>
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
                            <input type="email" name="email" class="form-control" id="Name1" placeholder="Enter username or email id">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" id="email1" placeholder="Enter correct password">
                        </div>
                        <div class="col-lg-12">
                            <div class="checkbox-outer">
                                <input type="checkbox" value="Car">Remember Me?
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="comment-btn">
                                <button type="submit" class="btn-blue btn-red">Login</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="login-accounts">
                                <a href="{{url('/forget_pass')}}" class="forgotpw">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="login-form">
                <form action="{{url('/businesregsave')}}" id="form_register" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-title">
                                <h2>Register</h2>
                                <p>Enter your details to be a member.</p>
                            </div>
                        </div>
                        <input class="form-control" name="id" type="hidden">
                        <div class="form-group col-lg-12">
                            <label>First Name:</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter first name">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Last Name:</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter last name">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Register As</label>
                            <select name="role_id" class="form-control" data-option-id="{{(isset($data['results']->role_id) ? $data['results']->role_id : '')}}">
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
                        <div class="form-group col-lg-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="abc@xyz.com">
                        </div>
                        <!-- <div class="form-group col-lg-12">
                            <label>Phone Number:</label>
                            <input type="text" class="form-control" id="date1" placeholder="Select Date">
                        </div> -->
                        <div class="form-group col-xs-6">
                            <label>Password :</label>
                            <input type="password" name="password" class="form-control" id="date" placeholder="Enter Password">
                        </div>
                      <!--   <div class="form-group col-xs-6 col-left-padding">
                            <label>Confirm Password :</label>
                            <input type="password" name="password" class="form-control" id="phnumber" placeholder="Re-enter Password">
                        </div> -->
                      <!--   <div class="col-lg-12">
                            <div class="checkbox-outer">
                                <input type="checkbox" name="vehicle2" value="Car"> I agree to the <a href="#">terms and conditions.</a>
                            </div>
                        </div> -->
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
<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click','.btn-register',function(e){
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
                    else{
                     Swal.fire('Email is already exist ! Try a valid email');
                    }

                    }

                });
           });
    });

</script>

@endsection