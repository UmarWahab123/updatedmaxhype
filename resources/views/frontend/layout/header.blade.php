<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<link rel="icon" href="{{asset('/')}}/images/admin_dpj.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maxhypechannel</title>
    @include('frontend.layout.css')
      @yield('css')
    <!-- Favicon -->
</head>
<body>
    <!-- Preloader -->
   <!--  <div id="preloader">
        <div id="status"></div>
    </div> -->
    <!-- Preloader Ends -->
    <!-- Header -->
    <header>
        <div class="upper-head clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <input type="text" name="search" id="search-input" class="search-input" placeholder="search">
                        <div class="search-results"></div>
                    </div>
                    <div class="col-md-6">
                         <div class="login-btn pull-right mt-2">
                    @if(Auth::check())
                    @if(Auth::user()->role->role_title=="Business")
                    <a href="{{url('/dashboard')}}/{{Auth::user()->id}}" class="btn-yellow reserve text-white">Business Dashboard</a>
                    @elseif(Auth::user()->role->role_title=="Affiliate")
                    <a href="{{url('/dashboards1')}}/{{Auth::user()->id}}/Affiliates" class="btn-yellow mr-3 reserve text-white">Affiliate Dashboard</a>
                    @elseif(Auth::user()->role->role_title=="Customer")
                    <a href="{{url('/dashboards')}}/{{Auth::user()->id}}" class="btn-yellow mr-3 reserve text-white">Customer Dashboard</a>
                    @else
                    <a href="{{url('admin/home')}}" class="btn-yellow mr-3 reserve text-white">Admin Dashboard</a>                    
                    @endif
                 <a href="{{url('/logout')}}"><i class="fa fa-unlock-alt"></i>Logout</a>
                    @else
                 <a href="{{url('/auth')}}"><i class="fa fa-unlock-alt"></i> Login</a>
                    @endif
                </div>
                    </div>
                </div>
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
<script type="text/javascript">
 $( document ).ready(function() {
 $(".search-input").keyup(function(e){ 
    e.preventDefault();
    var token = $('input[name=_token]').val();
    var value = $(this).val();
    // alert(value);
    var formdata={"search":value}
    $.ajax({
            url:"{{url('/search')}}",
            type:"GET",
            headers: {'X-CSRF-TOKEN': token},
            data:formdata,
            dataType:"json",
            success:function(data)
            { 
         $('.search-results').html(data.response);
         }
     });
    });
 // Bind keyup event on the input
$('#search-input').keyup(function() {
  // If value is not empty
  if ($(this).val().length == 0) {
    // Hide the element
    $('.search-results').hide();
  } else {
    // Otherwise show it
    $('.search-results').show();
  }
}).keyup(); // Trigger the keyup event, thus running the handler on page load
});
// $(document).on('change','input[name=search]',function(){
//    if(!this.value){
//     $('.search-results').hide();
//     }else{
//     $('.search-results').show();
//  }
// });
</script>