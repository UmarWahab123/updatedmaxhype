@extends('frontend.layout.header')

@section('css')
<link href="{{asset('/frontend/css/hotel.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<!-- Breadcrumb -->

<section class="breadcrumb-outer text-center">

   <div class="container">

      <div class="breadcrumb-content">

         <h2>{{$data['details']->name}}</h2>

         <nav aria-label="breadcrumb">

            <ul class="breadcrumb">

             <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

             <li class="breadcrumb-item"><a href="{{url('/businesses/'.$data['details']->type)}}">{{$data['details']->type}}</a></li>

             <li class="breadcrumb-item active" aria-current="page">{{$data['details']->name}} Details</li>

            </ul>

         </nav>

      </div>

   </div>

   <div class="section-overlay"></div>

</section>

<!-- BreadCrumb Ends -->

<!-- hotel detail -->

<section class="main-content detail pad-bottom-80">

   <div class="container">

      <div class="row">

         <div id="content" class="col-lg-8">

            <div class="detail-content content-wrapper">

               <div class="detail-info">

                  <div class="detail-info-content clearfix">

                     <h2>{{$data['details']->name}}</h2>

                  </div>

               </div>

               <div class="gallery detail-box">

                  <!-- Paradise Slider -->

                  <div id="in_th_030" class="carousel slide in_th_brdr_img_030 thumb_scroll_x swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="4000" data-duration="2000">

                     <!-- Indicators -->

                     <ol class="carousel-indicators">

                        <!-- 1st Indicator -->

                   @if(isset($data['details']->images)?$data['details']->images:'')

                   @foreach(json_decode($data['details']->images) as $key=>$row)

                        <li data-target="#in_th_030" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}}">

                           <!-- 1st Indicator Image -->

                           <img src="{{url('/')}}{{isset($row)?$row:''}}" alt="in_th_030_01_sm" />

                        </li>

                   @endforeach

                   @endif

                     </ol>

                     <!-- /Indicators -->





                     <!-- Wrapper For Slides -->

                     <div class="carousel-inner" role="listbox">

                        <!-- First Slide -->

                   @if(isset($data['details']->images)?$data['details']->images:'')

                   @foreach(json_decode($data['details']->images) as $key=>$row)

                        <div class="carousel-item {{$key==0 ? 'active' : ''}}">

                           <!-- Slide Background -->

                           <img src="{{url('/')}}{{isset($row)?$row:''}}" alt="in_th_030_01" />

                        </div>

                   @endforeach

                   @endif

                     </div>

                     <!-- End of Wrapper For Slides -->

                  </div>

                  <!-- End Paradise Slider -->

               </div>



               <div class="description detail-box">

                  <div class="detail-title">

                     <h3>Description</h3>

                  </div>

                  <div class="description-content">

                     <p>{{$data['details']->details}}</p>

                  </div>

               </div>

                  <div class="detail-title">

                     <h3>Products</h3>

                  </div>

                  <div class="description-content">

                   @if(count($data['products'])>0)
                   @if($data['type']=='Reservation')
                     <table class="table dynamic_table table-bordered table-responsive product-show">

                           <thead class="bg-white">

                              <tr role="row" class="text-center">

                                 <th>Title</th>

                                 <th>Price</th>

                                 <th>Total</th>

                                 <th>Available</th>

                                 <th>Actions</th>

                              </tr>

                           </thead>

                           <tbody class="text-center">

                              @foreach($data['products'] as $key=>$value)

                              <tr>

                                 <td class="font-weight-bold text-danger">{{$value->title}}</td>

                                 <td>{{$value->price}}</td>


                                 <td>{{$value->total_tickets}}</td>

                                 <td>

                           @if(get_availability($value->total_tickets,$value->id) >= 1)

                               {{get_availability($value->total_tickets,$value->id)}}

                                 @else

                                   0

                                 @endif

                                 </td>

                                 <td>

                                 @if(Auth::check())

                                  @if(Auth::user()->role_id != 5 )

                                  <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn btn-info button view-button text-white products_detail change-background">View detail</a>

                                  @if(get_availability($value->total_tickets,$value->id) >= 1)

                                   <a href="javascript::void(0)" data-toggle="modal" data-target="#loginModal" class="btn-blue btn-red">{{$data['details']->feature}}</a>

                                  @else

                                  <a type="button" class="btn-blue btn-red fully-booked">Fully Booked</a>

                                  @endif

                                  @elseif(Auth::user()->role_id == 5 )

                                  <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn btn-info button view-button text-white products_detail change-background">View detail</a>

                                 @if(get_availability($value->total_tickets,$value->id) >= 1)

                                 <a href="{{url('/reservation/'.$value->id.'/'.$value->businesses->feature.'/'.$value->businesses->type)}}" class="btn-blue btn-red">{{$data['details']->feature}}</a>

                                 @else

                                <a type="button" class="btn-blue btn-red  fully-booked">Fully Booked</a>

                                 @endif

                                 @endif

                                  @else

                                  <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn btn-info button view-button text-white products_detail change-background">View detail</a>

                                  @if(get_availability($value->total_tickets,$value->id) >= 1)

                                   <a href="javascript::void(0)" data-toggle="modal" data-target="#loginModal" class="btn-blue btn-red">{{$data['details']->feature}}</a>

                                   @else

                                 <a type="button" class="btn-blue btn-red  fully-booked">Fully Booked</a>

                                   @endif

                                   @endif

                                 </td>

                              </tr>

                              @endforeach

                           </tbody>

                        </table>
                       @elseif($data['type']=='Purchase')
                       <table class="table dynamic_table table-bordered table-responsive product-show">

                           <thead class="bg-white">

                              <tr role="row" class="text-center">

                                 <th>Title</th>

                                 <th>Price</th>

                                 <th>Fee</th>

                                 <th>Total</th>

                                 <th>Available</th>

                                 <th>Actions</th>

                              </tr>

                           </thead>

                           <tbody class="text-center">

                              @foreach($data['products'] as $key=>$value)

                              <tr>

                                 <td class="font-weight-bold text-danger">{{$value->title}}</td>

                                 <td>{{$value->price}}</td>
                                 <td>{{$value->fee}}</td>

                                 <td>{{$value->total_tickets}}</td>

                                 <td>

                               @if(get_availability_tickets($value->total_tickets,$value->id) >= 1)

                               {{get_availability_tickets($value->total_tickets,$value->id)}}

                                 @else

                                   0

                                 @endif

                                 </td>

                                 <td>

                                 @if(Auth::check())

                                  @if(Auth::user()->role_id != 5 )

                                  <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn btn-info button view-button text-white products_detail">View detail</a>

                                  @if(get_availability_tickets($value->total_tickets,$value->id) >= 1)

                                   <a href="javascript::void(0)" data-toggle="modal" data-target="#loginModal" class="btn-blue btn-red">{{$data['details']->feature}}</a>

                                  @else

                                  <a type="button" class="btn-blue btn-red fully-booked">Fully Booked</a>

                                  @endif

                                  @elseif(Auth::user()->role_id == 5 )

                                  <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn btn-info button view-button text-white products_detail">View detail</a>

                                 @if(get_availability_tickets($value->total_tickets,$value->id) >= 1)

                                 <a href="{{url('/reservation/'.$value->id.'/'.$value->businesses->feature.'/'.$value->businesses->type)}}" class="btn-blue btn-red">{{$data['details']->feature}}</a>

                                 @else

                                <a type="button" class="btn-blue btn-red  fully-booked">Fully Booked</a>

                                 @endif

                                 @endif

                                  @else

                                  <a type="button" data-toggle="modal" data-target="#productModal" data-id="{{$value->id}}" class="btn btn-info button view-button text-white products_detail">View detail</a>

                                  @if(get_availability_tickets($value->total_tickets,$value->id) >= 1)

                                   <a href="javascript::void(0)" data-toggle="modal" data-target="#loginModal" class="btn-blue btn-red">{{$data['details']->feature}}</a>

                                   @else

                                 <a type="button" class="btn-blue btn-red  fully-booked">Fully Booked</a>

                                   @endif

                                   @endif

                                 </td>

                              </tr>

                              @endforeach

                           </tbody>

                        </table>
                        @endif
                     @else

                  <h5 class="text-center">No Products Data Available</h5>

                  @endif

               </div>

               <div class="location-map detail-box">

                  <div class="detail-title">

                     <h3>Location Map</h3>

                  </div>
                 <!--  <div class="map-frame">

                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28185.510535377554!2d86.90746548742861!3d27.98811904127681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e854a215bd9ebd%3A0x576dcf806abbab2!2z4KS44KSX4KSw4KSu4KS-4KSl4KS-!5e0!3m2!1sne!2snp!4v1544516755007" style="border:0" allowfullscreen></iframe>

                  </div> -->
                    <div class="map-frame">
                      <?php echo  $data['details']->map ?>

                   </div>

               </div>

            </div>

         </div>

         <div id="sidebar-sticky" class="col-lg-4">

            <aside class="detail-sidebar sidebar-wrapper">

               <div class="sidebar-item">

                  <div class="detail-title">

                     <h3>Related Businesses</h3>

                  </div>

                  <div class="sidebar-content sidebar-slider">

                     @foreach($data['businesses'] as $value)

                     <div class="sidebar-package">

                        <div class="sidebar-package-image">

                           <img src="{{url(isset($value->dp) ? $value->dp:'')}}" alt="Images" width="432" height="224">

                        </div>

                        <div class="destination-content sidebar-package-content">

                           <h4><a href="hotel-detail.html">{{$value->name}}</a></h4>
                            @if(!empty($value->discount))
                           <p><i></i>Discount : <span class="bold">{{$value->discount}}</span> </p>
                           @else
                           <p><i></i>Discount : <span class="bold">0%</span> </p>
                           @endif

                           <a href="{{url('business_details/'.$value->id)}}" class="btn-red">View Details</a>

                        </div>

                     </div>

                     @endforeach

                  </div>

               </div>

               <div class="sidebar-item sidebar-helpline">

                  <div class="sidebar-helpline-content">

                     <h3>Any Questions?</h3>

                     <p>If you have any queries then email us</p>

                     <p><i class="flaticon-mail"></i>info@themaxhype.com</p>
                     <p>We only respond to questions Concerning Memberships. . Please contact the Business Owners directly for any Inquiries or Questions about their Products and Services.</p>

                  </div>

               </div>

            </aside>

         </div>

      </div>

   </div>

</section>

<div class="modal" tabindex="-1" role="dialog" id="loginModal">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">Login/Register</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

       @if(Auth::check() && Auth::user()->role_id != 5)

      <div>

        <p class="war-message">Please Register as a Customer to make {{$data['details']->feature}}</p>

        <a href="{{url('/logout')}}" class="btn-blue btn-red">Register</a>

     </div>

     @else

      <div>

        <p class="war-message">Please Login to make {{$data['details']->feature}}</p>

        <a href="{{url('/auth')}}" class="btn-blue btn-red">Login</a>

     </div><br>

     @endif

      </div>

    </div>

  </div>

</div>

<div class="container">

  <!-- The Modal -->

  <div class="modal fade" id="productModal">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">



        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title text-dark">Product Details</h4>

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

<!-- Hotel Detail Ends -->

@endsection

@section('js')

<script src="{{asset('/frontend/js/rangeslider.js')}}"></script>

<script type="text/javascript">

   $( document ).ready(function() {

      $(document).on('click','.products_detail',function(){

        var token = $('input[name=_token]').val();

        var id = $(this).attr('data-id');

        $.ajax(

                {

                    type:"get",

                    headers: {'X-CSRF-TOKEN': token},

                    url: "{{url('/products_details')}}/"+id,

                    dataType: "json",

                    success:function(data)

                    {
                        $('.modal-div').html('Loading...');
                        $('.modal-div').html(data.response);



                        // $('#productModal').modal('show');



                    }



             });

           });



   });

</script>

@endsection
