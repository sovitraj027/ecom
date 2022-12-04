@extends('frontend.layouts.app')
@section('content')

    
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End --> 
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">
                Products</span></h2>
       
        <div class="row px-xl-5">
            @if(isset($products)!=null)
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="/storage/product-image/{{ $product->image }}" alt="">
                        
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            @foreach ($product->sets as $set)
                                <h5>{{$set->price}}</h5>
                            @endforeach
                            
                            <h6 class="text-muted ml-2"> <a href="{{route('veiw.detail',$product->id)}}"><span>View Detail</span> </a></h6>
                        </div>
                        
                    </div>
                </div>
            </div>
           @endforeach
           @endif
        </div>
    </div>
    <!-- Products End -->
    
    
    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-5.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-7.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('frontend/img/vendor-8.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection