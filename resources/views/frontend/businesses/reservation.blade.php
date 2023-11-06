@extends('frontend.layout.header') 

@section('css')

<link href="{{asset('/frontend/css/stripe.css')}}" rel="stylesheet" type="text/css">

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
 <link href="{{asset('/frontend/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css">


@endsection

@section('content')

<!-- Breadcrumb -->

<section class="breadcrumb-outer text-center">

    <div class="container">

        <div class="breadcrumb-content">

            <h2>{{$data['type']}}</h2>

            <nav aria-label="breadcrumb">

                <ul class="breadcrumb reservation-crumb">

                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

                <li class="breadcrumb-item"><a href="{{url('/businesses/'.$data['details']->businesses->type)}}">{{$data['details']->businesses->type}}</a></li>

                <li class="breadcrumb-item"><a href="{{url('/business_details/'.$data['details']->businesses->id)}}">{{$data['details']->businesses->name}} Details</a></li>

                <li class="breadcrumb-item active" aria-current="page">{{$data['type']}}</li>

                </ul>

            </nav>

        </div>

    </div>

    <div class="section-overlay"></div>

</section>

<!-- BreadCrumb Ends -->

<section class="booking">

    <div class="container justify-content-center align-items-center">

        <div class="row">

            <div class="col-md-12">

                <div class="booking-form booking-outer">

                    <h3 class="">Enter The Following Information For {{$data['type']}}.</h3>
                    @if($data['details']->refundable=="Yes")
                    <h4 class="text-info">Note : Purchase will be refundable.</h4>
                    @else
                    <h4 class="text-info">Note : Purchase will not be refundable.</h4>
                    @endif
                    @if($data['type']=="Purchase")
                      <input type="hidden" name="availeble_tickets" value="{{get_availability_tickets($data['total_tickets'],$data['id'])}}" class="test-availeble-tickets">
                      @else
                         <input type="hidden" name="availeble_tickets" value="{{get_availability($data['total_tickets'],$data['id'])}}" class="test-availeble-tickets">
                    @endif
                
                 
                    <form class="formdata" id="reserve-form" method="post">
                        
                        {{ csrf_field() }}

                        <input type="hidden" name="business_id" value="{{$data['details']->businesses->id}}" class="form-control">
                        @if($data['type']=='Purchase')
                         <input class="form-control" name="status" type="hidden" value="Pending">
                         @endif
                        <input type="hidden" name="customer_id" value="{{Auth::user()->id}}" class="form-control">

                         <input type="hidden" name="product_id" value="{{$data['id']}}" class="form-control">

                        <input type="hidden" name="type" value="{{$data['type']}}" class="form-control">

                        <div class="row">



                            <div class="form-group col-md-6">

                                <br>

                                <label>First Name</label>

                                <input type="text" name="first_name" class="form-control" value="{{Auth::user()->first_name}}" required readonly>

                            </div>

                             <div class="form-group col-md-6">

                                <br>

                                <label>Last Name</label>

                                <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}" required readonly>

                            </div>

                          </div>
                        @if($data['type']=='Reservation')
                             
                             <div class="row">

                               <div class="col-md-6">

                                <div class="table_item">

                                    <div class="form-group">

                                       <label>Check In</label>

                                        <div class="input-group date" id="datetimepicker1">

                                            <input type="text" name="date" class="form-control" value="dd-mm-yyyy" id="departure-date" required>

                                            <i class="flaticon-calendar"></i>

                                            <span class="input-group-addon">

                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                          <div class="form-group col-md-6">

                            <label>Time</label>

                            <input type="text" id="timepicker" name="time" class="form-control" required>

                        </div>

                        </div>
                        @if($data['business_type']=='Vehicles-ATV-Bikes-Boats-JetSkis')
                        <div class="row">

                               <div class="col-md-6">

                                <div class="table_item">

                                    <div class="form-group">

                                       <label>Check Out</label>

                                        <div class="input-group date" id="datetimepicker1">

                                            <input type="text" name="return_date" class="form-control" value="dd-mm-yyyy" id="return-date" required>

                                            <i class="flaticon-calendar"></i>

                                            <span class="input-group-addon">

                                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                          <div class="form-group col-md-6">

                            <label>Return Time</label>

                            <input type="text" id="timepicker1" name="return_time" class="form-control" required>

                        </div>
                        </div>
                        @endif
                        @endif
                        <div class="row">

                         <div class="form-group col-md-6">

                            <label>Special Notes</label>

                            <input type="text" placeholder="Add your notes" name="remarks" class="form-control" required>

                        </div>

                        @if($data['type']=='Reservation')

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>Number Of People</label>

                                 <select name="people" id="select-people" class="form-control" required>

                                    <option value="">Select</option>

                                    <option>1</option>

                                    <option>2</option>

                                    <option>3</option>

                                    <option>4</option>

                                    <option>5</option>

                                    <option>6</option>

                                    <option>7</option>

                                    <option>8</option>

                                    <option>9</option>

                                    <option>10</option>

                                 </select>

                              </div>

                           </div>

                        @endif

                        @if($data['type']=='Purchase')

                           <div class="col-md-6">

                              <div class="form-group m-form__group">

                                 <label>Total Tickets</label>

                                 <select name="total_tickets" id="select-tickets" class="form-control" required>

                                    <option value="">Select</option>

                                    <option>1</option>

                                    <option>2</option>

                                    <option>3</option>

                                    <option>4</option>

                                    <option>5</option>

                                    <option>6</option>

                                    <option>7</option>

                                    <option>8</option>

                                    <option>9</option>

                                    <option>10</option>

                                 </select>

                              </div>

                           </div>

                        </div>

                         <div class="row">

                             <div class="form-group col-md-4">

                                <label>Price</label>

                                <input type="text" class="form-control" name="price" value="{{$data['price']}}" required readonly>

                            </div> 

                             <div class="form-group col-md-4">

                                <label>Fee</label>

                         <input type="text" class="form-control" id="fee" value="{{$data['fee']}}" name="fee" readonly>

                            </div> 

                             <div class="form-group col-md-4">

                                <label>Total Price</label>

                                <input type="text" placeholder="Total Price" class="form-control" name="total_price" id="total_price" required readonly>

                            </div> 

                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">

                              <label for="card-element">

                               Credit Card

                               </label>

                               <div id="card-element" class="form-control" style="height: 40px; line-height: 40px; font-weight: bold; font-size: 16px;">

                              <!-- A Stripe Element will be inserted here. -->

                                </div>

                           <!-- Used to display form errors. -->

                              <div id="card-errors" role="alert" class="red-color" style="margin-top: 5px;"></div>

                            </div>              

                        </div>

                        @endif

                        <div class="row">

                         <div class="col-xs-12">

                            <div class="comment-btn">

                                @if($data['type']=='Purchase')

                                <a href="#" class="btn-blue btn-red save-payintent1 save-payintent reverse btn-purchase">Submit</a>
                                
                                <button id="btn-reserve" data-paypal="1" class="btn-blue" type="submit">Submit & Pay with Paypal</button>

                                @else

                                <button id="btn-reserve" class="btn-blue btn-red" type="submit">Submit</button>

                                @endif

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

<script src="https://js.stripe.com/v3/"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="{{asset('/frontend/js/bootstrap-timepicker.js')}}"></script>

<script type="text/javascript">

$(document).ready(function() {

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

 

    var form = document.getElementById('reserve-form');

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



$(document).on('click','.save-payintent',function(e){

    e.preventDefault();

    var token = $('input[name=_token]').val();

    var tickets = $('select[name=total_tickets]').val();

    if(tickets==''){

        alert('Please select the total tickets.');

        return false;

    }

    $(".save-payintent").attr("disabled", true).html('Processing...');
   
    var formdata=$('.formdata').serialize();

     $.ajax(

              {

                type:"post",

                headers: {'X-CSRF-TOKEN': token},

                url: "{{url('/paymentintent')}}",

                data:formdata,

                success:function(data)

                {

                 handlepayment(data);

                }



            });

       });

 function handlepayment(clientSecret){

      console.log(clientSecret);

      var customer=$('input[name=first_name]').val();

      stripe.confirmCardPayment(clientSecret, {

      payment_method: {

      card: card,

      billing_details: {

        name: customer

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

      var token = $('input[name=_token]').val();

      var formdata=$('#reserve-form').serialize();

       $.ajax(

              {

                type:"post",

                headers: {'X-CSRF-TOKEN': token},

                url: "{{url('/save_reservation')}}",

                dataType:"json",

                data:formdata,

                success:function(data)

                {

                 Swal.fire('Great ! You have successfully Purchased.Please check your email for the details.')
                 $(".save-payintent").attr("disabled", false).html('Submit');
                
                 $('.reserve-form')[0].reset(); 


                }



            });

      }

    }

  });

}

});
$(document).ready(function() {
$(document).on('click','#btn-reserve',function(e){
    var tickets = $('select[name=total_tickets]').val();

     if(tickets==''){

        alert('Please select the total tickets.');

        return false;

    }

    var paypal = $(this).attr('data-paypal');
    e.preventDefault();
    save_reservation(paypal);
});
function save_reservation(paypal){

    var token = $('input[name=_token]').val();

    var date = $('input[name=date]').val();

    var time = $('input[name=time]').val();

     var return_date = $('input[name=return_date]').val();

    var return_time = $('input[name=return_time]').val();

    var people = $('select[name=people]').val();

    if(date==''){

        alert('Please select the current date.');

        return false;

    }else if(return_date==''){

        alert('Please select the current date.');

        return false;

    }
    else if(time==''){

        alert('Please select the current time.');

        return false;

    }else if(return_time==''){

        alert('Please select the return time.');

        return false;

    }
    else if(people==''){

        alert('Please select the number of people.');

        return false;

    }
   $("#btn-reserve").attr("disabled", true).html('Processing...');

    var formdata=$('#reserve-form').serialize();

       $.ajax(

              {

                type:"post",

                headers: {'X-CSRF-TOKEN': token},

                url: "{{url('/save_reservation')}}",

                dataType:"json",

                data:formdata,

                success:function(data)

                {
                 Swal.fire('Great ! You have successfully Reserved.Please check your email for the details.')
                 $('#reserve-form')[0].reset(); 

                 $("#btn-reserve").attr("disabled", false).html('Submit');
                 if(paypal==1){
                    Swal.fire('Great ! You have successfully save.Please pay to Purchase then check your email for the details.')
                 window.location = data.redirect_url;
                   }
                 // window.location = data.cancle_url;
              
                }
            });
}

$('#timepicker').timepicker({

        showPeriod: true,

        onHourShow: OnHourShowCallback,

        onMinuteShow: OnMinuteShowCallback

    });
$('#timepicker1').timepicker({

        showPeriod: true,

        onHourShow: OnHourShowCallback,

        onMinuteShow: OnMinuteShowCallback

    });

function OnHourShowCallback(hour) {

    if ((hour > 20) || (hour < 6)) {

        return false; // not valid

    }

    return true; // valid

}

function OnMinuteShowCallback(hour, minute) {

    if ((hour == 20) && (minute >= 30)) { return false; } // not valid

    if ((hour == 6) && (minute < 30)) { return false; }   // not valid

    return true;  // valid

}

$(document).on('change','select[name=people]',function(){
  var people=$(this).val();
  var available_tickets = parseFloat($('input[name=availeble_tickets]').val());
  if(people > available_tickets){
  $("#select-people")[0].selectedIndex = 0; 
  alert('Availeble tickets is less than the selected people, Please ! select a valid number of people');
  }
 });

$(document).on('change','select[name=total_tickets]',function(){

  var total_tickets=$(this).find(":selected").text();
  var unit_price=$('input[name=price]').val();
  var fee =$('#fee').val();
  var total_price=(total_tickets * unit_price ) + (+fee);
  $("input[name=total_price]").val(total_price);
  var available_tickets = parseFloat($('input[name=availeble_tickets]').val());
  if(total_tickets > available_tickets){
    $("#select-tickets")[0].selectedIndex = 0; 
    alert('Availeble tickets is less than the selected total tickets, Please ! select a valid number of total tickets');
    $("#total_price").val('');
  }
 });

//to set datepicker default current date

$('#departure-date').datepicker({

                    format:'dd/mm/yyyy',

                }).datepicker("setDate",'now');
$('#return-date').datepicker({

                    format:'dd/mm/yyyy',

                }).datepicker("setDate",'now');

 });



</script>

@endsection