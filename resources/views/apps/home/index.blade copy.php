@extends('layouts.apps.app')
<?php $link = asset('apps/'); ?>

@section('title')
    @auth
    Beranda
    @else
    App - Pesona Plesiran Indonesia
    @endauth
@endsection

@section('content')
@include('layouts.apps.category')
<!-- Dark Mode -->
<div class="container">
    <div class="dark-mode-wrapper mt-3 bg-img p-4 p-lg-5">
        <p class="text-white">You can change your display to a dark background using a dark mode.</p>
        <div class="form-check form-switch mb-0">
            <label class="form-check-label text-white h6 mb-0" for="darkSwitch">Switch to Dark Mode</label>
            <input class="form-check-input" id="darkSwitch" type="checkbox" role="switch">
        </div>
    </div>
</div>
<!-- Top Products -->
<div class="top-products-area py-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>Hotel</h6><a class="btn p-0" href="shop-grid.html">View All<i
                    class="ms-1 fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="row g-2">
            @forelse ($hotels as $hotel)
            <?php $imageHotel = \App\Models\ImageHotel::where('hotel_id',$hotel->id)->first(); ?>
            <div class="col-6 col-md-4">
                <div class="card product-card">
                    <div class="card-body">
                        <span class="badge rounded-pill badge-warning">Sale</span>
                        <<a class="wishlist-btn" href="#"><i
                                class="fa-solid fa-heart"> </i></a>
                        <a class="product-thumbnail d-block" href="{{ route('apps.detail',['slug' => $hotel->slug]) }}">
                            @if ($imageHotel == null)
                            <img class="mb-2" src="{{ asset('frontend/assets4/img/tour-thumb01.jpg') }}" alt="">
                            @else
                            <img class="mb-2" src="{{ asset('backend/assets2/images/hotel/'.$imageHotel['image']) }}" alt="">
                            @endif
                            <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                            <ul class="offer-countdown-timer d-flex align-items-center shadow-sm"
                                data-countdown="2023/12/31 23:59:59">
                                <li><span class="days">0</span>d</li>
                                <li><span class="hours">0</span>h</li>
                                <li><span class="minutes">0</span>m</li>
                                <li><span class="seconds">0</span>s</li>
                            </ul>
                        </a>
                        <a class="product-title" href="{{ route('apps.detail',['slug' => $hotel->slug]) }}">{{ $hotel->nama_hotel }}</a>
                        {{-- <p class="sale-price">Rp.<span>$42</span></p> --}}
                        <div class="product-rating"><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        {{-- <a class="btn btn-success btn-sm" href="#"><i
                                class="fa-solid fa-plus"></i></a> --}}
                    </div>
                </div>
            </div>
            @empty
            <div class="row g-2 rtl-flex-d-row-r">
                <div class="col-12">
                    <div class="card catagory-card">
                        <div class="card-body px-2"><span>Data Belum Tersedia</span></div>
                    </div>
                </div>
            </div>
            @endforelse
            <div class="section-heading d-flex align-items-center justify-content-between dir-rtl mt-4">
                <h6>Wisata</h6><a class="btn p-0" href="shop-grid.html">View All<i
                        class="ms-1 fa-solid fa-arrow-right-long"></i></a>
            </div>
            @forelse ($wisatas as $wisata)
            <div class="col-6 col-md-4">
                <div class="card product-card">
                    <div class="card-body">
                        <span class="badge rounded-pill badge-warning">Sale</span>
                        <<a class="wishlist-btn" href="#"><i
                                class="fa-solid fa-heart"> </i></a>
                        <a class="product-thumbnail d-block" href="{{ route('apps.detail',['slug' => $wisata->slug]) }}">
                            <img class="mb-2" src="{{ asset('frontend/assets4/img/tour-thumb01.jpg') }}" alt="">
                            <ul class="offer-countdown-timer d-flex align-items-center shadow-sm"
                                data-countdown="2023/12/31 23:59:59">
                                <li><span class="days">0</span>d</li>
                                <li><span class="hours">0</span>h</li>
                                <li><span class="minutes">0</span>m</li>
                                <li><span class="seconds">0</span>s</li>
                            </ul>
                        </a>
                        <a class="product-title" href="{{ route('apps.detail',['slug' => $wisata->slug]) }}">{{ $wisata->nama_wisata }}</a>
                        {{-- <p class="sale-price">Rp.<span>$42</span></p> --}}
                        <div class="product-rating"><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        {{-- <a class="btn btn-success btn-sm" href="#"><i
                                class="fa-solid fa-plus"></i></a> --}}
                    </div>
                </div>
            </div>
            @empty
            <div class="row g-2 rtl-flex-d-row-r">
                <div class="col-12">
                    <div class="card catagory-card">
                        <div class="card-body px-2"><span>Data Belum Tersedia</span></div>
                    </div>
                </div>
            </div>
            @endforelse
            {{-- <!-- Product Card -->
            <div class="col-6 col-md-4">
                <div class="card product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge rounded-pill badge-warning">Sale</span>
                        <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i
                                class="fa-solid fa-heart"> </i></a>
                        <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
                                class="mb-2" src="{{ $link }}/img/product/11.png" alt="">
                            <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                            <ul class="offer-countdown-timer d-flex align-items-center shadow-sm"
                                data-countdown="2023/12/31 23:59:59">
                                <li><span class="days">0</span>d</li>
                                <li><span class="hours">0</span>h</li>
                                <li><span class="minutes">0</span>m</li>
                                <li><span class="seconds">0</span>s</li>
                            </ul>
                        </a>
                        <!-- Product Title --><a class="product-title" href="single-product.html">Beach
                            Cap</a>
                        <!-- Product Price -->
                        <p class="sale-price">$13<span>$42</span></p>
                        <!-- Rating -->
                        <div class="product-rating"><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- Product Card -->
            <div class="col-6 col-md-4">
                <div class="card product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge rounded-pill badge-success">New</span>
                        <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i
                                class="fa-solid fa-heart"> </i></a>
                        <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
                                class="mb-2" src="{{ $link }}/img/product/5.png" alt=""></a>
                        <!-- Product Title --><a class="product-title" href="single-product.html">Wooden
                            Sofa</a>
                        <!-- Product Price -->
                        <p class="sale-price">$74<span>$99</span></p>
                        <!-- Rating -->
                        <div class="product-rating"><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- Product Card -->
            <div class="col-6 col-md-4">
                <div class="card product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge rounded-pill badge-success">Sale</span>
                        <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i
                                class="fa-solid fa-heart"> </i></a>
                        <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
                                class="mb-2" src="{{ $link }}/img/product/6.png" alt=""></a>
                        <!-- Product Title --><a class="product-title" href="single-product.html">Roof
                            Lamp</a>
                        <!-- Product Price -->
                        <p class="sale-price">$99<span>$113</span></p>
                        <!-- Rating -->
                        <div class="product-rating"><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- Product Card -->
            <div class="col-6 col-md-4">
                <div class="card product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge rounded-pill badge-danger">-18%</span>
                        <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i
                                class="fa-solid fa-heart"> </i></a>
                        <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
                                class="mb-2" src="{{ $link }}/img/product/9.png" alt="">
                            <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                            <ul class="offer-countdown-timer d-flex align-items-center shadow-sm"
                                data-countdown="2022/12/23 00:21:29">
                                <li><span class="days">0</span>d</li>
                                <li><span class="hours">0</span>h</li>
                                <li><span class="minutes">0</span>m</li>
                                <li><span class="seconds">0</span>s</li>
                            </ul>
                        </a>
                        <!-- Product Title --><a class="product-title" href="single-product.html">Sneaker
                            Shoes</a>
                        <!-- Product Price -->
                        <p class="sale-price">$87<span>$92</span></p>
                        <!-- Rating -->
                        <div class="product-rating"><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- Product Card -->
            <div class="col-6 col-md-4">
                <div class="card product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge rounded-pill badge-danger">-11%</span>
                        <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i
                                class="fa-solid fa-heart"></i></a>
                        <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
                                class="mb-2" src="{{ $link }}/img/product/8.png" alt=""></a>
                        <!-- Product Title --><a class="product-title" href="single-product.html">Wooden
                            Chair</a>
                        <!-- Product Price -->
                        <p class="sale-price">$21<span>$25</span></p>
                        <!-- Rating -->
                        <div class="product-rating"><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- Product Card -->
            <div class="col-6 col-md-4">
                <div class="card product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge rounded-pill badge-warning">On Sale</span>
                        <!-- Wishlist Button--><a class="wishlist-btn" href="#"><i
                                class="fa-solid fa-heart"></i></a>
                        <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
                                class="mb-2" src="{{ $link }}/img/product/4.png" alt=""></a>
                        <!-- Product Title --><a class="product-title" href="single-product.html">Polo
                            Shirts</a>
                        <!-- Product Price -->
                        <p class="sale-price">$38<span>$41</span></p>
                        <!-- Rating -->
                        <div class="product-rating"><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <!-- Add to Cart --><a class="btn btn-success btn-sm" href="#"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- CTA Area -->

{{-- <div class="container">
    <div class="cta-text dir-rtl p-4 p-lg-5">
        <div class="row">
            <div class="col-9">
                <h4 class="text-white mb-1">20% discount on women's care items</h4>
                <p class="text-white mb-2 opacity-75">Offer will continue till this Friday.</p><a
                    class="btn btn-warning" href="#">Grab this offer</a>
            </div>
        </div><img src="{{ $link }}/img/bg-img/make-up.png" alt="">
    </div>
</div> --}}

<!-- Weekly Best Sellers-->

{{-- <div class="weekly-best-seller-area py-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>Weekly Best Sellers</h6><a class="btn p-0" href="shop-list.html">
                View All<i class="ms-1 fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="row g-2">
            <!-- Weekly Product Card -->
            <div class="col-12">
                <div class="horizontal-product-card">
                    <div class="d-flex align-items-center">
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail shadow-sm d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/18.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Wishlist  --><a class="wishlist-btn" href="#"><i
                                    class="fa-solid fa-heart"></i></a>
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Nescafe Coffee Jar</a>
                            <!-- Price -->
                            <p class="sale-price"><i class="fa-solid fa-dollar-sign"></i>$64<span>$89</span>
                            </p>
                            <!-- Rating -->
                            <div class="product-rating"><i class="fa-solid fa-star"></i>4.88 <span
                                    class="ms-1">(39 review)</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Weekly Product Card -->
            <div class="col-12">
                <div class="horizontal-product-card">
                    <div class="d-flex align-items-center">
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail shadow-sm d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/7.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Wishlist  --><a class="wishlist-btn" href="#"><i
                                    class="fa-solid fa-heart"></i></a>
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Modern Office Chair</a>
                            <!-- Price -->
                            <p class="sale-price"><i class="fa-solid fa-dollar-sign"></i>$99<span>$159</span>
                            </p>
                            <!-- Rating -->
                            <div class="product-rating"><i class="fa-solid fa-star"></i>4.82 <span
                                    class="ms-1">(125 review)</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Weekly Product Card -->
            <div class="col-12">
                <div class="horizontal-product-card">
                    <div class="d-flex align-items-center">
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail shadow-sm d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/12.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Wishlist  --><a class="wishlist-btn" href="#"><i
                                    class="fa-solid fa-heart"></i></a>
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Beach Sunglasses</a>
                            <!-- Price -->
                            <p class="sale-price"><i class="fa-solid fa-dollar-sign"></i>$24<span>$32</span>
                            </p>
                            <!-- Rating -->
                            <div class="product-rating"><i class="fa-solid fa-star"></i>4.79 <span
                                    class="ms-1">(63 review)</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Weekly Product Card -->
            <div class="col-12">
                <div class="horizontal-product-card">
                    <div class="d-flex align-items-center">
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail shadow-sm d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/17.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Wishlist  --><a class="wishlist-btn" href="#"><i
                                    class="fa-solid fa-heart"></i></a>
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Meow Mix Cat Food</a>
                            <!-- Price -->
                            <p class="sale-price"><i
                                    class="fa-solid fa-dollar-sign"></i>$11.49<span>$13</span></p>
                            <!-- Rating -->
                            <div class="product-rating"><i class="fa-solid fa-star"></i>4.78 <span
                                    class="ms-1">(7 review)</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Discount Coupon Card-->

{{-- <div class="container">
    <div class="discount-coupon-card p-4 p-lg-5 dir-rtl">
        <div class="d-flex align-items-center">
            <div class="discountIcon"><img class="w-100" src="{{ $link }}/img/core-img/discount.png" alt="">
            </div>
            <div class="text-content">
                <h4 class="text-white mb-1">Get 20% discount!</h4>
                <p class="text-white mb-0">To get discount, enter the<span
                        class="px-1 fw-bold">GET20</span>code on the checkout page.</p>
            </div>
        </div>
    </div>
</div> --}}

<!-- Featured Products Wrapper-->

{{-- <div class="featured-products-wrapper py-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>Featured Products</h6><a class="btn p-0" href="featured-products.html">View All<i
                    class="ms-1 fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="row g-2">
            <!-- Featured Product Card-->
            <div class="col-4">
                <div class="card featured-product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                class="fa-solid fa-star"></i></span>
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/14.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Blue Skateboard</a>
                            <!-- Price -->
                            <p class="sale-price">$39<span>$89</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Card-->
            <div class="col-4">
                <div class="card featured-product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                class="fa-solid fa-star"></i></span>
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/15.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Travel Bag</a>
                            <!-- Price -->
                            <p class="sale-price">$14.7<span>$21</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Card-->
            <div class="col-4">
                <div class="card featured-product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                class="fa-solid fa-star"></i></span>
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/16.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Cotton T-shirts</a>
                            <!-- Price -->
                            <p class="sale-price">$3.69<span>$5</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Card-->
            <div class="col-4">
                <div class="card featured-product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                class="fa-solid fa-star"></i></span>
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/21.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">ECG Rice Cooker</a>
                            <!-- Price -->
                            <p class="sale-price">$9.33<span>$13</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Card-->
            <div class="col-4">
                <div class="card featured-product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                class="fa-solid fa-star"></i></span>
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/20.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Beauty Cosmetics</a>
                            <!-- Price -->
                            <p class="sale-price">$5.99<span>$8</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Card-->
            <div class="col-4">
                <div class="card featured-product-card">
                    <div class="card-body">
                        <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                class="fa-solid fa-star"></i></span>
                        <div class="product-thumbnail-side">
                            <!-- Thumbnail --><a class="product-thumbnail d-block"
                                href="single-product.html"><img src="{{ $link }}/img/product/19.png" alt=""></a>
                        </div>
                        <div class="product-description">
                            <!-- Product Title --><a class="product-title d-block"
                                href="single-product.html">Basketball</a>
                            <!-- Price -->
                            <p class="sale-price">$16<span>$20</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="pb-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>Collections</h6><a class="btn p-0" href="#">
                View All<i class="ms-1 fa-solid fa-arrow-right-long"></i></a>
        </div>
        <!-- Collection Slide-->
        <div class="collection-slide owl-carousel">
            <!-- Collection Card-->
            <div class="card collection-card"><a href="single-product.html"><img src="{{ $link }}/img/product/17.jpg"
                        alt=""></a>
                <div class="collection-title"><span>Women</span><span class="badge bg-danger">9</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><a href="single-product.html"><img src="{{ $link }}/img/product/19.jpg"
                        alt=""></a>
                <div class="collection-title"><span>Men</span><span class="badge bg-danger">29</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><a href="single-product.html"><img src="{{ $link }}/img/product/21.jpg"
                        alt=""></a>
                <div class="collection-title"><span>Kids</span><span class="badge bg-danger">4</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><a href="single-product.html"><img src="{{ $link }}/img/product/22.jpg"
                        alt=""></a>
                <div class="collection-title"><span>Gadget</span><span class="badge bg-danger">11</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><a href="single-product.html"><img src="{{ $link }}/img/product/23.jpg"
                        alt=""></a>
                <div class="collection-title"><span>Foods</span><span class="badge bg-danger">2</span></div>
            </div>
            <!-- Collection Card-->
            <div class="card collection-card"><a href="single-product.html"><img src="{{ $link }}/img/product/24.jpg"
                        alt=""></a>
                <div class="collection-title"><span>Sports</span><span class="badge bg-danger">5</span></div>
            </div>
        </div>
    </div>
</div> --}}
@endsection