@extends('frontend.layout.header') 
@section('css')
<link href="{{asset('/frontend/css/stripe.css')}}" rel="stylesheet" type="text/css">
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
<section class="breadcrumb-outer text-center">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Bookings</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/memberships')}}">Memberships</a></li>
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
                                            <td class="b-id price">$ {{$data['details']->price}}</td>
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
                    <h3 class="">Enter Your Personal Information To Own The Chosen Business</h3>
                     @if((isset(Auth::user()->role_id) ? Auth::user()->role_id : '')==4)
                     <div class="alert alert-info">
                      <strong>To Subscribe</strong> the Memberships Package you have to Register as a Business.
                    </div>
                    @elseif((isset(Auth::user()->role_id) ? Auth::user()->role_id : '')==5)
                     <div class="alert alert-info">
                      <strong>To Subscribe</strong> the Memberships Package you have to Register as a Business.
                    </div>
                    @endif
                    <form class="booking-form" id="booking-form" method="post">
                         {{ csrf_field() }}
                    <input class="form-control" name="business[id]" type="hidden" value="{{(isset(Auth::user()->id) ? Auth::user()->id : '')}}">
                     <input class="form-control" name="business[role_id]" type="hidden" value="3">
                     <input class="form-control" name="business[status]" type="hidden" value="Pending">
                     <input class="form-control" type="hidden" name="booking[membership_id]" value="{{$data['details']->id}}">
                     <input class="form-control" id="total_price" type="hidden" name="booking[total_price]" value="{{$data['details']->price}}">
                      <input class="form-control" id="status" type="hidden" name="booking[status]" value="Pending">
                    <h4>&nbsp Enter Your Business Details</h4>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Chosen Package</label>
                            <input type="text" name="chosen_package" value="{{$data['details']->title}}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Business Name</label>
                                <input type="text" name="business[name]" class="form-control" value="{{(isset(Auth::user()->name) ? Auth::user()->name : '')}}">
                                <span class="error text-danger d-none"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Business Website</label>
                                <input type="text" class="form-control" value="{{(isset(Auth::user()->site_link) ? Auth::user()->site_link : '')}}" name="business[site_link]">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Business Type</label>
                             <select name="business[type]" class="form-control" data-option-id="{{(isset(Auth::user()->type) ? Auth::user()->type : '')}}">
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
                           <span class="errortype text-danger d-none"></span>
                           </div>                    
                          </div>
                            <div class="row">
                            <div class="form-group col-md-6">
                              <label>Choose Country</label>
                              <select name="business[country]" class="form-control country" data-option-id="{{(isset(Auth::user()->country) ? Auth::user()->country : '')}}">
                              <option value="">Select</option>
                              @foreach($data['country'] as $key=>$value)
                              <option value="{{$value->id}}">{{$value->location_country_name}}</option>
                              @endforeach
                           </select>
                         <span class="errorcountry text-danger d-none"></span>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group m-form__group">
                                   <label>Business City</label>
                                   <select name="business[city]" class="form-control city" data-option-id="{{(isset(Auth::user()->city) ? Auth::user()->city : '')}}">
                                @if(!empty(Auth::user()))
                                 @foreach($data['cities'] as $key=>$value)
                                <option value="{{$value->id}}">{{$value->location_city_name}}</option>
                                 @endforeach
                                 @endif
                                 </select>
                                <span class="errorcity text-danger d-none"></span>
                                </div>
                             </div>
                            </div>
                            <div class="row">
                           <div class="col-md-6 otherinput d-none">
                            <div class="form-group m-form__group">
                                   <label>Other City</label>
                             <input type="text" name="other_city" class="form-control ">
                            </div>
                        </div>
                         </div>
                         <div class="row">
                            <div class="form-group col-md-4">
                                <label>Zip Code</label>
                                <input type="text" value="{{(isset(Auth::user()->postal_code) ? Auth::user()->postal_code : '')}}" class="form-control zipcode" name="business[postal_code]">
                                <span class="errorzip text-danger d-none"></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Business Phone</label>
                                <input type="number" value="{{(isset(Auth::user()->phone) ? Auth::user()->phone : '')}}" class="form-control" name="business[phone]">
                                <span class="errorphone text-danger d-none"></span>
                            </div> 
                              <div class="form-group col-md-4">
                                <label>Business Email</label>
                                <input type="email" name="business[email]" class="form-control" placeholder="abc@xyz.com" value="{{(isset(Auth::user()->email) ? Auth::user()->email : '')}}">
                                <span class="erroremail text-danger d-none"></span>
                            </div>                   
                          </div>
                           <div class="row">
                            <div class="form-group col-md-12">
                                 <label>Few Lines About Your Business</label>
                                <textarea type="text" name="business[details]" rows="5" class="form-control m-input m-input--square" value="{{(isset(Auth::user()->details) ? Auth::user()->details : '')}}"></textarea>
                           </div>
                        </div>
                        <br>
                        <h4>Enter Your Personal Details</h4>
                        <div class="row">
                             <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input type="text" id="user_name" value="{{(isset(Auth::user()->first_name) ? Auth::user()->first_name : '')}}" name="business[first_name]" class="form-control">
                                <span class="errorfirst text-danger d-none"></span>
                            </div>
                             <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" id="user_name" name="business[last_name]" value="{{(isset(Auth::user()->last_name) ? Auth::user()->last_name : '')}}" class="form-control">
                                <span class="errorlast text-danger d-none"></span>
                            </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                           <label>Personal Email Address</label>
                                <input type="email" value="{{(isset(Auth::user()->personal_email) ? Auth::user()->personal_email : '')}}" name="business[personal_email]" class="form-control" placeholder="abc@xyz.com"> 
                                <span class="errorpersonal text-danger d-none"></span>
                          </div>
                           <div class="form-group col-md-6">
                                <label>Country (Where You Are Living)?</label>
                                <input type="text" value="{{(isset(Auth::user()->living_country) ? Auth::user()->living_country : '')}}" name="business[living_country]" class="form-control">
                           </div>
                        </div>
                         <div class="row">
                           <div class="form-group col-md-6">
                           <label>City (Where You Are Living)?</label>
                                <input type="name" value="{{(isset(Auth::user()->living_city) ? Auth::user()->living_city : '')}}" name="business[living_city]" class="form-control"> 
                          </div>
                           <div class="form-group col-md-6">
                              <label>How long your business has been in existence?</label>
                            <input type="text" value="{{(isset(Auth::user()->existence_duration) ? Auth::user()->existence_duration : '')}}" name="business[existence_duration]" class="form-control">
                           </div>
                         </div>
                          <div class="row">
                           <div class="form-group col-md-4">
                           <label>Cell Phone Number?</label>
                        <input type="number" value="{{(isset(Auth::user()->cell_phone) ? Auth::user()->cell_phone : '')}}" name="business[cell_phone]" class="form-control"> 
                          </div>
                           <div class="form-group col-md-4">
                              <label>Home Phone?</label>
                                <input type="number" value="{{(isset(Auth::user()->home_phone) ? Auth::user()->home_phone : '')}}" name="business[home_phone]" class="form-control">
                           </div>
                           <div class="form-group col-md-4">
                           <label>Office Number</label>
                                <input type="number" value="{{(isset(Auth::user()->office_number) ? Auth::user()->office_number : '')}}"  name="business[office_number]" class="form-control"> 
                          </div>
                         </div>
                         <div class="row">
                        @if((isset(Auth::user()->role_id) ? Auth::user()->role_id : '')=='')
                             <div class="col-md-4">
                                <div class="form-group m-form__group">
                                   <label>Password</label>
                                   <input type="password" placeholder="{{(isset($data['results']->id) ? 'Type in to update password' : '')}}" name="business[password]" class="form-control password m-input m-input--square" value="">
                                </div>
                             </div>
                         @endif
                         @if($data['details']->price > 0)
                           <div class="form-group col-md-8">
                              <label for="card-element">
                               Credit Card
                               </label>
                               <div id="card-element" class="form-control" style="height: 40px; line-height: 40px; font-weight: bold; font-size: 16px;">
                              <!-- A Stripe Element will be inserted here. -->
                                </div>
                           <!-- Used to display form errors. -->
                              <div id="card-errors" role="alert" class="red-color" style="margin-top: 5px;"></div>
                            </div>
                        @endif
                         </div>
                        @if((isset(Auth::user()->role_id) ? Auth::user()->role_id : '')==3)
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
                                    @if($data['details']->price > 0)
                                    <button data-paypal="1" class="btn-blue btn-paypal" type="submit" style="padding: 11px !important;">Submit & Pay with Paypal</button>
                                   @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!Auth::check())
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
                                     @if($data['details']->price > 0)
                                    <button data-paypal="1" class="btn-blue btn-paypal" type="submit" style="padding: 11px !important;">Submit & Pay with Paypal</button>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        @endif
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
                                <div class="destination-content sidebar-package-content text-center">
                                    <h4><a href="#">{{$value->name}}</a></h4>
                                    <p><i class="#"></i>Discount : <span class="bold">{{$value->discount}}</span> </p>
                                    <a href="{{url('business_details/'.$value->id)}}" class="btn-blue btn-red">View More</a>
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
@endsection
@section('js')
<script src="https://js.stripe.com/v3/"></script>
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

$(document).ready(function(){
    @if($data['details']->price > 0)

    var stripe = Stripe('pk_live_51IYDbDHWd5OiL8gpDAfSRfMh4rGS26wwbVMIGYi6eRxcPE7QeuAimNRlV7WVfE6KQ4CBIHpnNrKvfD4P832vfMG800Rd1WaiI9');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {style: style});
    card.mount('#card-element');
    var form = document.getElementById('booking-form');
    form.addEventListener('submit', function(event) {
    event.preventDefault();
    stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      //stripeTokenHandler(result.token);
    }

  });

});
@endif

 $(document).on('click','.btn-booking',function(e){
      e.preventDefault();  
      var businessname=$('input[name="business[name]"]').val();
      var businesstype=$('select[name="business[type]"]').val();
      var businesscountry=$('select[name="business[country]"]').val();
      var businesscity=$('select[name="business[city]"]').val();
      var businesspostalcode=$('input[name="business[postal_code]"]').val();
      var businessphone=$('input[name="business[phone]"]').val();
      var businessemail=$('input[name="business[email]"]').val();
      var firstname=$('input[name="business[first_name]"]').val();
      var lastname=$('input[name="business[last_name]"]').val();
      var personalemail=$('input[name="business[personal_email]"]').val();
      if(businessname==''){
        $(".error").html("This field is required");
        $(".error").removeClass('d-none');
         return false;
      }else{
        $(".error").addClass('d-none');
      }
      if(businesstype==''){
        $(".errortype").html("This field is required");
        $(".errortype").removeClass('d-none');
         return false;
      }else{
        $(".errortype").addClass('d-none');
      }
      if(businesscountry==''){
        $(".errorcountry").html("This field is required");
        $(".errorcountry").removeClass('d-none');
         return false;
      }else{
        $(".errorcountry").addClass('d-none');
      }
      if(businesscity==''){
        $(".errorcity").html("This field is required");
        $(".errorcity").removeClass('d-none');
         return false;
      }else{
        $(".errorcity").addClass('d-none');
      }
      if(businesspostalcode==''){
        $(".errorzip").html("This field is required");
        $(".errorzip").removeClass('d-none');
         return false;
      }else{
        $(".errorzip").addClass('d-none');
      }
       if(businessphone==''){
        $(".errorphone").html("This field is required");
        $(".errorphone").removeClass('d-none');
         return false;
      }else{
        $(".errorphone").addClass('d-none');
      }
       if(businessemail==''){
        $(".erroremail").html("This field is required");
        $(".erroremail").removeClass('d-none');
         return false;
      }else{
        $(".erroremail").addClass('d-none');
      }
      if(firstname==''){
        $(".errorfirst").html("This field is required");
        $(".errorfirst").removeClass('d-none');
         return false;
      }else{
        $(".errorfirst").addClass('d-none');
      }
      if(lastname==''){
        $(".errorlast").html("This field is required");
        $(".errorlast").removeClass('d-none');
         return false;
      }else{
        $(".errorlast").addClass('d-none');
      }
       if(personalemail==''){
        $(".errorpersonal").html("This field is required");
        $(".errorpersonal").removeClass('d-none');
         return false;
      }else{
        $(".errorpersonal").addClass('d-none');
      }
      var token = $('input[name=_token]').val();
      var formdata=$('#booking-form').serialize();
      var total_price=$("#total_price").val();
      if(total_price>0){
       $(".btn-booking").attr("disabled", true).html('Processing...');
       }else{
       $(".btn-booking").attr("disabled", true).html('Processing...');
        savebookings();
       return false;
       }
       $.ajax(
                {
                    type:"post",
                    headers:{'X-CSRF-TOKEN': token},
                    url: "{{url('/bookingintent') }}",
                    //dataType:"json",
                    data:formdata,
                    success:function(data)
                    {
                     handlepayment(data);
                    }
                });
           });
function handlepayment(clientSecret){
      console.log(clientSecret);
      var business=$('input[name="business[name]"]').val();
      stripe.confirmCardPayment(clientSecret, {
      payment_method: {
      card: card,
      billing_details: {
        name: business
      }
    },
    setup_future_usage: 'off_session'
  }).then(function(result) {
    if (result.error) {
      alert('error');
      $('#card-errors').html(result.error.message);
      $('.pay').prop('disabled',false);
    } else {
      if(result.paymentIntent.status === 'succeeded') {
      // window.location.href='{{ url('/thanks') }}';
      // $('#reserve-form').submit();
       savebookings();
      }
    }
  });
}
$(document).ready(function() {
$(document).on('click','.btn-paypal',function(e){
    var paypal = $(this).attr('data-paypal');
    e.preventDefault();
    var businessname=$('input[name="business[name]"]').val();
      var businesstype=$('select[name="business[type]"]').val();
      var businesscountry=$('select[name="business[country]"]').val();
      var businesscity=$('select[name="business[city]"]').val();
      var businesspostalcode=$('input[name="business[postal_code]"]').val();
      var businessphone=$('input[name="business[phone]"]').val();
      var businessemail=$('input[name="business[email]"]').val();
      var firstname=$('input[name="business[first_name]"]').val();
      var lastname=$('input[name="business[last_name]"]').val();
      var personalemail=$('input[name="business[personal_email]"]').val();
      if(businessname==''){
        $(".error").html("This field is required");
        $(".error").removeClass('d-none');
         return false;
      }else{
        $(".error").addClass('d-none');
      }
      if(businesstype==''){
        $(".errortype").html("This field is required");
        $(".errortype").removeClass('d-none');
         return false;
      }else{
        $(".errortype").addClass('d-none');
      }
      if(businesscountry==''){
        $(".errorcountry").html("This field is required");
        $(".errorcountry").removeClass('d-none');
         return false;
      }else{
        $(".errorcountry").addClass('d-none');
      }
      if(businesscity==''){
        $(".errorcity").html("This field is required");
        $(".errorcity").removeClass('d-none');
         return false;
      }else{
        $(".errorcity").addClass('d-none');
      }
      if(businesspostalcode==''){
        $(".errorzip").html("This field is required");
        $(".errorzip").removeClass('d-none');
         return false;
      }else{
        $(".errorzip").addClass('d-none');
      }
       if(businessphone==''){
        $(".errorphone").html("This field is required");
        $(".errorphone").removeClass('d-none');
         return false;
      }else{
        $(".errorphone").addClass('d-none');
      }
       if(businessemail==''){
        $(".erroremail").html("This field is required");
        $(".erroremail").removeClass('d-none');
         return false;
      }else{
        $(".erroremail").addClass('d-none');
      }
      if(firstname==''){
        $(".errorfirst").html("This field is required");
        $(".errorfirst").removeClass('d-none');
         return false;
      }else{
        $(".errorfirst").addClass('d-none');
      }
      if(lastname==''){
        $(".errorlast").html("This field is required");
        $(".errorlast").removeClass('d-none');
         return false;
      }else{
        $(".errorlast").addClass('d-none');
      }
       if(personalemail==''){
        $(".errorpersonal").html("This field is required");
        $(".errorpersonal").removeClass('d-none');
         return false;
      }else{
        $(".errorpersonal").addClass('d-none');
      }
    savebookings(paypal);
});
});
function savebookings(paypal){
        var token = $('input[name=_token]').val();
        var formdata=$('#booking-form').serialize();
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
                // $('.booking-form')[0].reset();  
               $(".btn-booking").attr("disabled", false).html('Book Now');
               if(paypal==1){
                Swal.fire('Your Booking Info has been Successufully Submited.Please Proceed Payment with Paypal !')
                 window.location = data.redirect_url;
                   }
                $('.booking-form').trigger("reset");
              }
    });
}
});
$(document).ready(function() {
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
    $('select[data-option-id]').each(function () {
        $(this).val($(this).data('option-id'));
    });
    $(document).on('change','.city',function(e){
      var other =$(this).val();
      // alert(other);
      if(other=='Other'){
        $('.otherinput').removeClass('d-none');
      }else{
        $('.otherinput').addClass('d-none');
       }
     });   
});
</script>
@endsection