@extends('frontend.layout.header') 
@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-outer text-center">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Memberships</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Membership</li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="section-overlay"></div>
</section>
<!-- BreadCrumb Ends -->

<!-- price -->
<section class="price-list">
    <div class="container">
    <div class="row">
        @foreach($data['packages'] as $value)
        @if($value->title == 'Silver Package')
            <div class="col-lg-4">
                <div class="price-item">
                    <div class="price-table-head">
                        <i class="fa fa-superpowers" aria-hidden="true"></i>
                        <h3>{{$value->title}}</h3>
                    </div>
                    <div class="price-table-price">
                        <span>$ {{$value->price}}</span>
                    </div>
                    <div class="price-table-content">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Location : {{$value->location}}</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Commission (Per Sale) : {{$value->commision_per_sale}}</li>
                        </ul>
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
                        <span>$ {{$value->price}}</span>
                    </div>
                    <div class="price-table-content">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Location : {{$value->location}}</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Commission (Per Sale) : {{$value->commision_per_sale}}</li>
                        </ul>
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
                        <span>$ {{$value->price}}</span>
                    </div>
                    <div class="price-table-content">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Location : {{$value->location}}</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Commission (Per Sale) : {{$value->commision_per_sale}}</li>
                        </ul>
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
<!-- price Ends -->

@endsection
