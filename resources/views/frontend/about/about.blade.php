@extends('frontend.layout.header') 
@section('content')
 <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>About Us</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->
     <!-- About Us -->
    <section class="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Maxhypechannel Company Profile</h2>
                        <div class="section-icon section-icon-white">
                            <i class="flaticon-diamond"></i>
                        </div> 
                        <p><a href="{{url('/')}}">Themaxhype.com</a> is a referral company registered in 2017. <a href="{{url('/')}}">Themaxhype.com</a> was formed out of necessity to meet the needs of teeming tourists and residents of the city. Everyone faces the dilemma of where to eat, where to grab drink or where to simply have some fun when they are in a new city or when they just want to unwind after a hard day’s work. So, it doesn’t matter if you are a tourist or a resident, we are set up just to meet your needs.

If you are in search of specific restaurants, clubs or bars that suit your unique tastes, we have got you covered as our guide contains all the exotic and unique spots that resonates with the kind of ambience you desire to enjoy. Our list contains the best restaurants, bars, lounges, clubs.movie theaters,yatch/boats,stores,spas, luxury car locations, atv rental locations s to meet your every need.</p>      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>What We Do</h2>
                        <div class="section-icon section-icon-white">
                            <i class="flaticon-diamond"></i>
                        </div> 
                        <p>We offer premium referral services to the best and most exotic restaurants, the best restaurants, bars, lounges, clubs.movie theaters, luxury car locations, atv rental locations, movie theaters,Jetski/boats/yatch,Events locations and more. Our services are provided though our website which provides access to view and make reservations to the best restaurants, bars, lounges, clubs.movie theaters, luxury car locations, adventures, atv rental locations and pubs of your choice. Once a registration is made, customers receive email notifications and the discount codes to be redeemed when a customer gets to the venue. With the e-tickets or Discount code, customers can redeem the discount that the location is offering.

The primary purpose of <a href="{{url('/')}}">Themaxhype.com</a> is to link people with needed services by identifying their needs, Finding the most appropriate services to meet their needs, and linking them to the most appropriate service providers.#thingstodo in every city.</p>      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Ends -->

    <!-- About Us -->
    <section class="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Why Choose Us?</h2>
                        <div class="section-icon section-icon-white">
                            <i class="flaticon-diamond"></i>
                        </div>       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="about-item">
                        <div class="about-icon">
                            <i class="fa fa-superpowers" aria-hidden="true"></i>
                        </div>
                        <div class="about-content">
                            <h3>Our Goals</h3>
                            <p>To provide people with the best experience ever when it comes to finding the best restaurants, bars, lounges, clubs.movie theaters, luxury car locations, atv rental locations,boats/yatch,spas,stores that suits their needs whenever they are looking for things to do.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-item">
                        <div class="about-icon">
                            <i class="fa fa-paw" aria-hidden="true"></i>
                        </div>
                        <div class="about-content">
                            <h3>Our Mission</h3>
                            <p>To effectively communicate with people, accurately identify their needs, locate needed services and resources, and help them make good choices when accessing our services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-item">
                        <div class="about-icon">
                            <i class="fa fa-fire" aria-hidden="true"></i>
                        </div>
                        <div class="about-content">
                            <h3>Our Ethics</h3>
                            <p>Professional ethics are designed to protect the dignity and rights of people who are being served. At <a href="{{url('/')}}">Themaxhype.com</a> we ensure that the confidentiality of people we serve is preserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Ends -->

    <!-- Our Team -->
    <section class="our-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Our Membership Packages</h2>
                        <div class="section-icon section-icon-white">
                            <i class="flaticon-diamond"></i>
                        </div>       
                    </div>
                </div>
            </div>
            <div class="row">
        @foreach($data['packages'] as $value)
        @if($value->title == 'Silver')
            <div class="col-lg-4">
                <div class="price-item">
                    <div class="price-table-head">
                        <i class="fa fa-superpowers" aria-hidden="true"></i>
                        <h3>{{$value->title}}</h3>
                    </div>
                    <div class="price-table-price">
                        <span>{{$value->price}}</span>
                    </div>
                    <div class="price-table-content">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Location : {{$value->location}}</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Commission (Per Sale) : {{$value->commision_per_sale}}</li>
                     </div>
                    <div class="price-btn">
                        <a href="{{url('/bookings/'.$value->id)}}" class="btn-blue btn-red">See More</a>
                    </div>
                </div>
            </div>
        @elseif($value->title == 'Standard Package')
        <div class="col-lg-4">
                <div class="price-item price-item-blue">
                    <div class="price-table-head">
                        <i class="fa fa-paw" aria-hidden="true"></i>
                        <h3>{{$value->title}}</h3>
                    </div>
                    <div class="price-table-price">
                        <span>{{$value->price}}</span>
                    </div>
                    <div class="price-table-content">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Location : {{$value->location}}</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Commission (Per Sale) : {{$value->commision_per_sale}}</li>
                     </div>
                    <div class="price-btn">
                        <a href="{{url('/bookings/'.$value->id)}}" class="btn-blue btn-red">See More</a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-4">
                <div class="price-item">
                    <div class="price-table-head">
                        <i class="fa fa-fire" aria-hidden="true"></i>
                        <h3>{{$value->title}}</h3>
                    </div>
                    <div class="price-table-price">
                        <span>{{$value->price}}</span>
                    </div>
                    <div class="price-table-content">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Location : {{$value->location}}</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Commission (Per Sale) : {{$value->commision_per_sale}}</li>
                     </div>
                    <div class="price-btn">
                        <a href="{{url('/bookings/'.$value->id)}}" class="btn-blue btn-red">See More</a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        </div>
        </div>
    </section>
    <!-- Our Team Ends -->

@endsection