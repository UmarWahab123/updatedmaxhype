<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Maxhypechannel</title>
    @include('frontend.layout.css')
      @yield('css')
    <!-- Favicon -->
</head>
<body>

    <!-- Preloader -->
  <!--   <div id="preloader">
        <div id="status"></div>
    </div> -->
    <!-- Preloader Ends -->

    <!-- Header -->
    <header>
        <div class="upper-head clearfix">
            <div class="container">
                <div class="contact-info">
                    <p><i class="flaticon-phone-call"></i> Phone: (012)-345-6789</p>
                    <p><i class="flaticon-mail"></i> Mail: info@themaxhype.com</p>
                </div>
                <div class="login-btn pull-right">
                    @if(Auth::check())
                    <a href="{{url('/logout')}}"><i class="fa fa-unlock-alt"></i>Logout</a>
                    @else
                    <a href="{{url('/businesreg')}}"><i class="fa fa-unlock-alt"></i>Business Login</a>
                    <a href="{{url('/businesreg')}}"><i class="fa fa-unlock-alt"></i>Customer Login</a>
                    @endif
                </div>
                  <a href="{{url('/dashboard/51')}}" class="btn-yellow reserve text-white">Business Dashboard</a>
                  <a href="{{url('/dashboards/75')}}" class="btn-yellow mr-3 reserve text-white">Customer Dashboard</a>
                  <a href="{{url('/dashboards1/31/'.'Affiliates')}}" class="btn-yellow mr-3 reserve text-white">Affiliate Dashboard</a>
            </div>
        </div>
    </header>
    <!-- Header Ends -->

    <!-- Navigation Bar -->
    @include('frontend.layout.main_navigation')
    <!-- Navigation Bar Ends -->
 @yield('content')


    <!-- Footer -->
  @include('frontend.layout.footer')
    <!-- Footer Ends --> 

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- *Scripts* -->
@include('frontend.layout.js')
 @yield('js')
</body>
</html>