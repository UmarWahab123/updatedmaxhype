@extends('frontend.layout.header') 
@section('css')
@endsection
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Bookings</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Memberships</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Booking</li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="section-overlay"></div>
</section>
<!-- BreadCrumb Ends -->
<section class="booking">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="booking-form booking-outer">
                    <div class="payment-info detail">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{asset('images/download.jpg')}}" alt="Image">
                            </div>
                            <div class="col-md-7">
                                <h3>{{$data['details']->title}}</h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="title">Price</td>
                                            <td class="b-id">{{$data['details']->price}}</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Location</td>
                                            <td>{{$data['details']->location}}</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Commision/Sale</td>
                                            <td>{{$data['details']->commision_per_sale}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h3 class="">Enter Your Personal Information To Own The Chosen Business</h3></br>
                    <form class="booking-form">
                         {{ csrf_field() }}
                     <input class="form-control" name="business[role_id]" type="hidden" value="3">
                     <input class="form-control" type="hidden" name="booking[membership_id]" value="{{$data['details']->id}}">
                     <input class="form-control" type="hidden" name="booking[total_price]" value="{{$data['details']->price}}">
                        <div class="row">
                        	<h4>&nbsp Enter Your Business Details</h4>
                            <div class="form-group col-md-6">
                                <label>Chosen Package</label>
                                <input type="text" name="chosen_package" value="{{$data['details']->title}}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Business Name</label>
                                <input type="text" name="business[name]" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Business Website</label>
                                <input type="text" class="form-control" name="business[site_link]">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Business Type</label>
                             <select name="business[type]" class="form-control">
                              <option value="">Select</option>
                              <option>Restaurants</option>
                              <option>Bar & Stores</option>
                              <option>Vehicles-ATV-Bikes-Boats-JetSkis</option>
                              <option>Adult Entertainment</option>
                              <option>Medical Marijuana & CBD</option>
                              <option>Adventure</option>
                              <option>Afrobeats</option>
                              <option>Sky Diving</option>
                              <option>Movie Theaters & Hotels</option>
                              <option>Clubs</option>
                           </select>
                           </div>                    
                          </div>
                            <div class="row">
                            <div class="form-group col-md-6">
                              <label>Choose Country</label>
                              <select name="business[country]" class="form-control country">
                              <option value="">Select</option>
                              @foreach($data['country'] as $key=>$value)
                              <option value="{{$value->id}}">{{$value->location_country_name}}</option>
                              @endforeach
                           </select>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group m-form__group">
                                   <label>Business City</label>
                                   <select name="business[city]" class="form-control city" data-option-id="{{(isset($data['results']->city) ? $data['results']->city : '')}}">
                                      <option value="">Select</option>
                                   </select>
                                </div>
                             </div>
                         </div>
                         <div class="row">
                            <div class="form-group col-md-4">
                                <label>Zip Code</label>
                                <input type="text" class="form-control zipcode" name="business[postal_code]">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Business Phone</label>
                                <input type="text" class="form-control" name="business[phone]">
                            </div> 
                              <div class="form-group col-md-4">
                                <label>Business Email</label>
                                <input type="email" name="business[email]" class="form-control" placeholder="abc@xyz.com">
                            </div>                   
                          </div>
                           <div class="row">
                            <div class="form-group col-md-12">
                                 <label>Few Lines About Your Business</label>
                                <textarea type="text" name="business[details]" rows="5" class="form-control m-input m-input--square"></textarea>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                        <h4>Enter Your Personal Details</h4>
                             <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input type="text" name="business[first_name]" class="form-control">
                            </div>
                             <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="business[last_name]" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                           <label>Personal Email Address</label>
                                <input type="email" name="business[personal_email]" class="form-control" placeholder="abc@xyz.com"> 
                          </div>
                           <div class="form-group col-md-6">
                                <label>Country (Where You Are Living)?</label>
                                <input type="text" name="business[living_country]" class="form-control">
                           </div>
                        </div>
                         <div class="row">
                           <div class="form-group col-md-6">
                           <label>City (Where You Are Living)?</label>
                                <input type="name" name="business[living_city]" class="form-control"> 
                          </div>
                           <div class="form-group col-md-6">
                              <label>How long your business has been in existence?</label>
                                <input type="text" name="business[existence_duration]" class="form-control">
                           </div>
                         </div>
                          <div class="row">
                           <div class="form-group col-md-6">
                           <label>Cell Phone Number?</label>
                                <input type="text" name="business[cell_phone]" class="form-control"> 
                          </div>
                           <div class="form-group col-md-6">
                              <label>Home Phone?</label>
                                <input type="text" name="business[home_phone]" class="form-control">
                           </div>
                         </div>
                         <div class="row">
                           <div class="form-group col-md-6">
                           <label>Office Number</label>
                                <input type="text" name="business[office_number]" class="form-control"> 
                          </div>
                         </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="checkbox-outer">
                                   I agree to the<a href="#">&nbspterms and conditions.</a>
                                  <!--  <input type="checkbox" tabindex="3" /> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="comment-btn">
                                    <button type="submit" class="btn-blue btn-red btn-booking">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="sidebar-sticky" class="col-md-4">
                <aside class="detail-sidebar sidebar-wrapper">
                    <div class="sidebar-item">
                        <div class="detail-title">
                            <h3>Related Businesses</h3>
                        </div>
                        <div class="sidebar-content sidebar-slider">
                        @foreach($data['businesses'] as $value) 
                            <div class="sidebar-package">
                                <div class="sidebar-package-image">
                                    <img src="{{url(isset($value->dp) ? $value->dp:'')}}" alt="Image" width="432" height="224">
                                </div>
                                <div class="destination-content sidebar-package-content">
                                    <h4><a href="#">{{$value->name}}</a></h4>
                                    <p><i class="#"></i>Discount : <span class="bold">{{$value->discount}}</span> </p>
                                    <a href="#" class="btn-blue btn-red">View More</a>
                                </div>
                            </div>
                         @endforeach
                        </div>
                    </div>
                    <div class="sidebar-item sidebar-helpline">
                        <div class="sidebar-helpline-content">
                            <h3>Any Questions?</h3>
                            <p>If you have any quaries then email or contact us</p>
                            <p><i class="flaticon-phone-call"></i> (012)-345-6789</p>
                            <p><i class="flaticon-mail"></i>info@themaxhype.com</p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
     $(".country").change(function(){
     var id = $(this).val();
     $.ajax({
              type:"get",
              url: "{{url('/getcity')}}/"+id,
              dataType: "json",
              success:function(data)
              { 
                $('.city').html(data.response); //to write the respone in the city drop  
                 
              }
          });
    });
     //to triggerd the zip code from the selected city and then write on the zipcode input
   $(".city").change(function(){
      var zip = $(this).find('option:selected').attr('data-zipcode');
      $('.zipcode').val(zip);
      
      });
   //Ajax Call To save Booking form
   $(document).ready(function() {
    $(document).on('click','.btn-booking',function(e){
      e.preventDefault();
        var token = $('input[name=_token]').val();
        var formdata=$('.booking-form').serialize();
       $.ajax(
                {
                    type:"post",
                    headers:{'X-CSRF-TOKEN': token},
                    url: "{{url('/savebookings') }}",
                    dataType:"json",
                    data:formdata,
                    success:function(data)
                    {
                    Swal.fire('Your Booking Info has been Successufully Submited !')
                    $('.booking-form')[0].reset();  
                    }

                });
           });
    
    });

 });
</script>
@endsection