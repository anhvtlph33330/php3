@extends('client.layouts.master')
@section('title')
    Trang chủ
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
@endsection
<style>
    .product-img img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .cat-img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }
</style>
@section('content')
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('client/assets/img/carousel-1.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('client/assets/img/carousel-2.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Danh mục</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-12">
                <div class="category-slider">
                    @foreach ($categories as $category)
                        <div class="cat-item d-flex flex-column border ml-2" style="padding: 30px;">
                            <p class="text-right">{{ $category->total_product }} Products</p>
                            <a href="{{ route('shop', ['category_id' => $category->id]) }}"
                                class="cat-img position-relative overflow-hidden mb-3">
                                @php
                                    $url = $category->image;
                                    if (!\Str::contains($url, 'http')) {
                                        $url = Storage::url($url);
                                    }
                                @endphp
                                <img class="img-fluid" src="{{ $url }}" alt="">
                            </a>
                            <h5 class="font-weight-semi-bold m-0">{{ $category->name }}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products outstanding Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm nổi bật</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($product_is_show_home as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @php
                                $url = $product->image_thumbnail;
                                if (!\Str::contains($url, 'http')) {
                                    $url = Storage::url($url);
                                }
                            @endphp
                            <img class="img-fluid w-100" src="{{ $url }}" alt="">
                            <span class="badge badge-danger position-absolute" style="top: 5px; right: 10px;">Sale</span>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                @if ($product->price_sale)
                                    <h6>${{ $product->price_sale }}</h6>
                                    <h6 class="text-muted ml-2"><del>${{ $product->price_regular }}</del></h6>
                                @else
                                    <h6>${{ $product->price_regular }}</h6>
                                @endif

                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('detail', $product->id) }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0 addToCart" data-id="{{ $product->id }}">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>AddTo Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->

    <!-- Products sale Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm giảm giá</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($product_is_sale as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @php
                                $url = $product->image_thumbnail;
                                if (!\Str::contains($url, 'http')) {
                                    $url = Storage::url($url);
                                }
                            @endphp
                            <img class="img-fluid w-100" src="{{ $url }}" alt="">
                            <span class="badge badge-danger position-absolute" style="top: 5px; right: 10px;">Sale</span>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                @if ($product->price_sale)
                                    <h6>${{ $product->price_sale }}</h6>
                                    <h6 class="text-muted ml-2"><del>${{ $product->price_regular }}</del></h6>
                                @else
                                    <h6>${{ $product->price_regular }}</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('detail', $product->id) }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0 addToCart"data-id="{{ $product->id }}"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add
                                To Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->

    <!-- Products New Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($product_is_new as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @php
                                $url = $product->image_thumbnail;
                                if (!\Str::contains($url, 'http')) {
                                    $url = Storage::url($url);
                                }
                            @endphp
                            <img class="img-fluid w-100" src="{{ $url }}" alt="">
                            <span class="badge badge-danger position-absolute" style="top: 5px; right: 10px;">new</span>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                @if ($product->price_sale)
                                    <h6>${{ $product->price_sale }}</h6>
                                    <h6 class="text-muted ml-2"><del>${{ $product->price_regular }}</del></h6>
                                @else
                                    <h6>${{ $product->price_regular }}</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('detail', $product->id) }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1 addToCart"
                                    data-id="{{ $product->id }}"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->

    <!-- Products Trending Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm hot</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($product_is_trending as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @php
                                $url = $product->image_thumbnail;
                                if (!\Str::contains($url, 'http')) {
                                    $url = Storage::url($url);
                                }
                            @endphp
                            <img class="img-fluid w-100" src="{{ $url }}" alt="">
                            <span class="badge badge-danger position-absolute" style="top: 5px; right: 10px;">hot</span>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                @if ($product->price_sale)
                                    <h6>${{ $product->price_sale }}</h6>
                                    <h6 class="text-muted ml-2"><del>${{ $product->price_regular }}</del></h6>
                                @else
                                    <h6>{{ $product->price_regular }}</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('detail', $product->id) }}" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0 addToCart"
                                data-id="{{ $product->id }}"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add
                                To Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
@endsection
