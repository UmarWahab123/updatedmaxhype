<div class="navigation">
   <div class="container">
      <div class="navigation-content">
         <div class="header_menu">
            <!-- start Navbar (Header) -->
            <nav class="navbar navbar-default navbar-sticky-function navbar-arrow">
               <div class="logo pull-left">
                  <a href="{{url('/')}}"><img class="latest-logo" alt="Image" width="120" height="58" src="{{asset(get_settings('logo'))}}"></a>
               </div>
               <div id="navbar" class="navbar-nav-wrapper">
                  <ul class="nav navbar-nav" id="responsive-menu">
                     <li class="active">
                        <a href="{{url('/')}}">Home</a>                             
                     </li>
                     <li>
                        <a href="#">Browse Businesess<i class="fa fa-angle-down"></i></a>
                        <ul>
                           <li><a href="{{url('/businesses')}}/Bar & Stores">Bar & Stores</a></li>
                           <li><a href="{{url('/businesses')}}/Restaurants">Restaurants</a></li>
                           <li><a href="{{url('/businesses')}}/vehicles-ATV-bikes-boats-jetSkis">Vehicles-ATV-Bikes-Boats-JetSkis</a></li>
                           <li><a href="{{url('/businesses')}}/Adult Entertainment">Adult Entertainment</a></li>
                           <li><a href="{{url('/businesses')}}/Medical Marijuana & CBD">Medical Marijuana & CBD</a></li>
                           <li><a href="{{url('/businesses')}}/Adventure">Adventures</a></li>
                           <li><a href="{{url('/businesses')}}/Afrobeats">Afrobeats</a></li>
                           <li><a href="{{url('/businesses')}}/Sky Diving">Sky Diving</a></li>
                           <li><a href="{{url('/businesses')}}/Movie Theaters & Hotels">Movie Theaters & Hotels</a></li>
                           <li><a href="{{url('/businesses')}}/Clubs">Clubs</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="{{url('/memberships')}}">Add A Business</a>
                     </li>
                     <li>
                        <a href="{{url('/about')}}">About Us</a>
                     </li>
                      <li>
                         <a href="{{url('/contacts')}}">Contact</a>
                     </li>              
                 </ul>
               </div>
               <!--/.nav-collapse -->
               <div id="slicknav-mobile"></div>
            </nav>
         </div>
      </div>
   </div>
</div>