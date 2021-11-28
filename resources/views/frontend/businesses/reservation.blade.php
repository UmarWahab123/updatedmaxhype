@extends('frontend.layout.header') 
@section('css')
<link href="{{asset('/frontend/css/stripe.css')}}" rel="stylesheet" type="text/css">
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

@endsection
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>{{$data['type']}}</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Business</li><li class="breadcrumb-item active" aria-current="page">Business Details</li>
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
                    <h3 class="">Enter The Following Information For {{$data['type']}}</h3></br>
                    <form class="formdata" id="reserve-form">
                        {{ csrf_field() }}
                        <input type="hidden" name="business_id" value="{{$data['id']}}" class="form-control">
                        <input type="hidden" name="type" value="{{$data['type']}}" class="form-control">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"  placeholder="Enter a name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date</label>
                                 <input type="date" name="date" class="form-control datepicker" id="departure-date">
                            </div>
                        </div>
                          <div class="row">
                            <div class="form-group col-md-6">
                                <label>Time</label>
                                <input type="time" id="timepicker" name="time" class="form-control">
                            </div>
                             <div class="form-group col-md-6">
                                <label>Remarks</label>
                                <input type="text" placeholder="Add your remarks" name="remarks" class="form-control">
                            </div>
                        </div>
                         <div class="row">
                             <div class="form-group col-md-6">
                                <label>Number Of People</label>
                                <input type="text" class="form-control" name="people" placeholder="Enter a number of people">
                            </div>
                            @if($data['type']=='Purchase')
                            <div class="form-group col-md-6">
                                <label>Total Tickets</label>
                                <input type="text" class="form-control" name="total_tickets" placeholder="Enter total tickets">
                            </div> 
                        </div>
                         <div class="row">
                             <div class="form-group col-md-6">
                                <label>Price</label>
                                <input type="text" placeholder="Enter a price" class="form-control" name="price">
                            </div>   
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
                                    <a href="#" class="btn-blue btn-red save-payintent1 save-payintent reverse">Submit</a>
                                    @else
                                    <button id="btn-reserve" class="btn-blue btn-red">Submit</button>
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
<script type="text/javascript">
$(document).ready(function() {
    var stripe = Stripe('pk_test_hyYeZCA1zDYqFVuyVLOzIMpg');
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
      var customer=$('input[name=name]').val();
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
                 Swal.fire('Great ! You have Successufully Purchased.')
                 $('#reserve-form')[0].reset(); 
                }

            });
      }
    }
  });
}
});
$(document).ready(function() {
$(document).on('click','#btn-reserve',function(e){
      e.preventDefault();
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
                 Swal.fire('Great ! You have Successufully Reseved.')
                 $('#reserve-form')[0].reset(); 
                }

            });
       });
 });
</script>
@endsection