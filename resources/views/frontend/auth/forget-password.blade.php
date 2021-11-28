@extends('frontend.layout.header') 
@section('content')
    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Forgot Password</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- Forgot Password -->
    <div class="forgot-password">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="fp-content">
                        <p>Please provide your email address. Click in the provided link to retrieve you account.</p>
                        <form>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Enter Email Address</label>
                                    <input type="email" class="form-control" id="Name" placeholder="Enter username or email id">
                                </div>
                                <div class="col-lg-12">
                                    <div class="comment-btn">
                                        <a href="#" class="btn-blue btn-red">Login</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Password Ends -->
@endsection