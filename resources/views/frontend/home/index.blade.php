@extends('frontend.layout.header') 

@section('content')

<!-- Banner start -->

@include('frontend.home.banners')

<!-- Banner Ends -->

<!-- Deals -->

@include('frontend.home.deals')



<!-- Deals Ends -->

<!-- Top Destinations -->

<div class="get_section">
  
</div>


<!-- Top Destination Ends -->

<!-- Trip Ad -->

@include('frontend.home.tripsAds')



<!-- Trip Ad Ends -->



<!-- Testimonials -->

@include('frontend.home.testimonials')



<!-- Testimonials Ends -->



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
        Loadings...


        </div>

        </div>

      </div>

    </div>

  </div>

</div>

@endsection

@section('js')

<script type="text/javascript">
//Ajax call to get business and country on page load  
  
$(document).ready(function(){
     $.ajax({
            type:"get",
            url: "{{url('/gethome')}}",
            context: document.body,
            dataType: "json",
            success:function(data)
            {
              // console.log(data);
                $('.get_section').html(data.response);
                // $('#productModal').modal('show');
            }
         });
      $.ajax({
            type:"get",
            url: "{{url('/getproduct')}}",
            context: document.body,
            dataType: "json",
            success:function(data)
            {
                $('.deals-slider2').html(data.response);
                $('.deals-slider2').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  autoplay: true,
  dots: false,
  responsive: [
  {
    breakpoint: 1000,
    settings: {
      slidesToShow: 2    
    }
  },
  {
    breakpoint: 500,
    settings: {
      slidesToShow: 1
    }
  }
  ]
});
                // $('#productModal').modal('show');
            }
         });
     });
   $( document ).ready(function() {
      $(".slick-next").click(function(){
    alert("clicked.");
  });

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


//slider js 

});



</script>

@endsection