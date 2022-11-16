@extends('layouts.frontend_2022.app')
@section('css')
    
@endsection
@section('title')
    Pesona Plesiran Indonesia
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia, plesiran indonesia
@endsection
@section('canonical')
    {{ url('/') }}
@endsection
@section('description')
    Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
    dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
@endsection
@section('content')
<div class="traveltour-page-wrapper" id="traveltour-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-wrapper " style="padding: 165px 0px 165px 0px;" data-skin="orange">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url({{ asset('frontend/assets_new/images/wallpaper/bromo.webp') }}) ;background-size: cover ;background-position: top center ;" data-parallax-speed="0.2"></div>
            </div>
            {{-- <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 50px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 52px ;text-transform: none ;color: #ffffff ;">Find Next Place To Visit<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 21px ;font-style: normal ;color: #ffffff ;margin-top: 5px ;">Discover amzaing places at exclusive deals</span></div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " style="max-width: 900px ;">
                                <div class="gdlr-core-pbf-element">
                                    <div class="tourmaster-tour-search-item clearfix tourmaster-style-column tourmaster-column-count-4 tourmaster-item-pdlr tourmaster-input-style-no-border" style="padding-bottom: 0px;">
                                        <div class="tourmaster-tour-search-wrap ">
                                            <form class="tourmaster-form-field  tourmaster-medium" action="#" method="GET">
                                                <div class="tourmaster-tour-search-field tourmaster-tour-search-field-keywords" style="padding-right: 2px;margin-bottom: 2px;">
                                                    <div class="tourmaster-tour-search-field-inner">
                                                        <input name="tour-search" type="text" placeholder="Keywords" value="" />
                                                    </div>
                                                </div>
                                                <div class="tourmaster-tour-search-field tourmaster-tour-search-field-tax" style="padding-right: 2px;margin-bottom: 2px;">
                                                    <div class="tourmaster-combobox-wrap">
                                                        <select name="tax-tour-destination">
                                                            <option value="">Destination</option>
                                                            <option value="africa-adventure">Africa Adventure</option>
                                                            <option value="africa-wild">Africa Wild</option>
                                                            <option value="america">America</option>
                                                            <option value="asia">Asia</option>
                                                            <option value="scandinavia">Scandinavia</option>
                                                            <option value="western-europe">Western Europe</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="tourmaster-tour-search-field tourmaster-tour-search-field-duration" style="padding-right: 2px;margin-bottom: 2px;">
                                                    <div class="tourmaster-combobox-wrap">
                                                        <select name="duration">
                                                            <option value="">Duration</option>
                                                            <option value="1">1 Day Tour</option>
                                                            <option value="2">2-4 Days Tour</option>
                                                            <option value="5">5-7 Days Tour</option>
                                                            <option value="7">7+ Days Tour</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input class="tourmaster-tour-search-submit" type="submit" value="Search" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="gdlr-core-pbf-wrapper " style="margin-top: -40px;margin-right: auto;margin-left: auto;padding: 50px 20px 0px 30px;max-width: 1200px ;">
            <div class="gdlr-core-pbf-background-wrap" style="border-radius: 3px 3px 3px 3px;-moz-border-radius: 3px 3px 3px 3px;-webkit-border-radius: 3px 3px 3px 3px;background-color: #f97251 ;background: linear-gradient(rgba(255, 144, 25, 1), rgba(255, 152, 108, 1));-moz-background: linear-gradient(rgba(255, 144, 25, 1), rgba(255, 152, 108, 1));-o-background: linear-gradient(rgba(255, 144, 25, 1), rgba(255, 152, 108, 1));-webkit-background: linear-gradient(rgba(255, 144, 25, 1), rgba(255, 152, 108, 1));"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class=" gdlr-core-pbf-wrapper-container-inner gdlr-core-item-mglr clearfix">
                        <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" data-skin="White Text">
                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                            <div class="gdlr-core-column-service-media gdlr-core-media-image"><img src="upload/tvicon1.1.png" alt="" width="59" height="59" title="tvicon1.1" /></div>
                                            <div class="gdlr-core-column-service-content-wrapper">
                                                <div class="gdlr-core-column-service-title-wrap" style="margin-bottom: 10px ;">
                                                    <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 13px ;letter-spacing: 2px ;">700+ Destinations</h3></div>
                                                <div class="gdlr-core-column-service-content" style="text-transform: none ;">
                                                    <p>Our expert team handpicked all destinations in this site</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="White Text">
                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                            <div class="gdlr-core-column-service-media gdlr-core-media-image"><img src="upload/tvicon2.1.png" alt="" width="48" height="50" title="tvicon2.1" /></div>
                                            <div class="gdlr-core-column-service-content-wrapper">
                                                <div class="gdlr-core-column-service-title-wrap" style="margin-bottom: 10px ;">
                                                    <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 13px ;letter-spacing: 2px ;">Best Price Guarantee</h3></div>
                                                <div class="gdlr-core-column-service-content" style="text-transform: none ;">
                                                    <p>Price match within 48 hours of order confirmation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="White Text">
                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                    <div class="gdlr-core-pbf-element">
                                        <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                            <div class="gdlr-core-column-service-media gdlr-core-media-image"><img src="upload/tvicon3.png" alt="" width="51" height="51" title="tvicon3" /></div>
                                            <div class="gdlr-core-column-service-content-wrapper">
                                                <div class="gdlr-core-column-service-title-wrap" style="margin-bottom: 10px ;">
                                                    <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 13px ;letter-spacing: 2px ;">Top Notch support</h3></div>
                                                <div class="gdlr-core-column-service-content" style="text-transform: none ;">
                                                    <p>We are here to help, before, during, and even after your trip.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="gdlr-core-pbf-wrapper " style="padding: 50px 0px 60px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/title-bg-popular-3.jpg) ;background-repeat: no-repeat ;background-position: top center ;" data-parallax-speed="0.05"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">Paket Trip Private<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="tourmaster-tour-item clearfix  tourmaster-tour-item-style-grid tourmaster-item-pdlr tourmaster-tour-item-column-3">
                            <div class="gdlr-core-flexslider flexslider gdlr-core-js-2 " data-type="carousel" data-column="3" data-nav="navigation-outer" data-nav-parent="tourmaster-tour-item" data-disable-autoslide="1">
                                <ul class="slides">
                                    @forelse ($paket_privates as $paket_private)
                                    <li class="gdlr-core-item-mglr">
                                        <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                            <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                <div class="tourmaster-tour-thumbnail tourmaster-media-image tourmaster-zoom-on-hover">
                                                    <a class="gdlr-core-lightgallery gdlr-core-js " href="https://www.youtube.com/watch?v=eZjmjT5SLYs">
                                                        <div class="tourmaster-tour-thumbnail-overlay"><i class="fa fa-film"></i></div><img src="upload/shutterstock_759608542-400x285.jpg" width="700" height="500"  alt="" /></a>
                                                </div>
                                                <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-15">
                                                    <div class="tourmaster-thumbnail-ribbon gdlr-core-outer-frame-element" style="color: #ffffff;background-color: #f97150;">
                                                        <div class="tourmaster-thumbnail-ribbon-cornor" style="border-right-color: rgba(249, 113, 80, 0.5);"></div>Best Seller</div>
                                                    <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 18px;font-weight: 800;letter-spacing: 0px;text-transform: none;"><a href="#" ><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"  style="fill: #f97150"  >
                                                        <path d="M397.413,199.303c-2.944-4.576-8-7.296-13.408-7.296h-112v-176c0-7.552-5.28-14.08-12.672-15.648
                                                                c-7.52-1.6-14.88,2.272-17.952,9.152l-128,288c-2.208,4.928-1.728,10.688,1.216,15.2c2.944,4.544,8,7.296,13.408,7.296h112v176
                                                                c0,7.552,5.28,14.08,12.672,15.648c1.12,0.224,2.24,0.352,3.328,0.352c6.208,0,12-3.616,14.624-9.504l128-288
                                                                C400.805,209.543,400.389,203.847,397.413,199.303z"/>
                                                    </svg><span>Venice, Rome and Milan &#8211; 9 Days 8 Nights</span></a></h3>
                                                    <div class="tourmaster-tour-price-wrap tourmaster-discount"><span class="tourmaster-tour-price"><span class="tourmaster-head">From</span><span class="tourmaster-tail">$4,300</span></span><span class="tourmaster-tour-discount-price">$3,500</span></div>
                                                    <div class="tourmaster-tour-info-wrap clearfix">
                                                        <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">

                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
                                                                c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
                                                                c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z" />
                                                                <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
                                                                c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
                                                                c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z" />
                                                                <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
                                                                c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
                                                                c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z" />
                                                                <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
                                                                c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
                                                                c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z" />
                                                                <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
                                                                c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
                                                                c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z" />
                                                                <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
                                                                c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
                                                                c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z" />
                                                                <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
                                                                c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
                                                                C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
                                                                c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
                                                                c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
                                                                C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
                                                                c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
                                                                c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
                                                                C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
                                                                c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
                                                                c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
                                                                c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
                                                                C214.925,437.943,208.163,428.223,197.999,426.402z" />
                                                                <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
                                                                c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
                                                                C236.243,89.978,229.477,83.198,221.124,83.198z" />
                                                            </svg>7 Days </div>
                                                    </div>
                                                    <div class="tourmaster-tour-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><span class="tourmaster-tour-rating-text">(1 Review)</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <h6 style="text-align: center">Data tidak tersedia</h6>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="gdlr-core-pbf-wrapper " style="padding: 45px 0px 60px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/title-bg-recommended-1.jpg) ;background-repeat: no-repeat ;background-position: top center ;" data-parallax-speed="0.05"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">Our Recommended<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 52px ;"><a class="gdlr-core-button  gdlr-core-button-transparent gdlr-core-button-no-border" href="#" style="font-size: 15px ;font-weight: 400 ;letter-spacing: 0px ;color: #e66836 ;padding: 8px 0px 0px 0px;"><span class="gdlr-core-content" >View All Recommended</span><i class="gdlr-core-pos-right fa fa-long-arrow-right" style="font-size: 17px ;"  ></i></a></div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="tourmaster-tour-item clearfix  tourmaster-tour-item-style-grid tourmaster-item-pdlr tourmaster-tour-item-column-3">
                            <div class="gdlr-core-flexslider flexslider gdlr-core-js-2 " data-type="carousel" data-column="3" data-nav="navigation-outer" data-nav-parent="tourmaster-tour-item" data-disable-autoslide="1">
                                <ul class="slides">
                                    @forelse ($paket_trips as $paket_trip)
                                    <li class="gdlr-core-item-mglr">
                                        <div class="tourmaster-tour-grid  tourmaster-tour-frame tourmaster-tour-grid-style-2 tourmaster-price-right-title">
                                            <div class="tourmaster-tour-grid-inner" style="box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -moz-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); -webkit-box-shadow: 0 0 23px rgba(10, 10, 10,0.08); border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                <div class="tourmaster-tour-thumbnail tourmaster-media-image tourmaster-zoom-on-hover">
                                                    <a href="#"><img src="{{ asset('frontend/assets_new/images/paket/list/'.$paket_trip->images) }}" style="width: 700px; height: 200px; object-fit: cover;" alt="{{ $paket_trip->nama_paket }}"></a>
                                                </div>
                                                <div class="tourmaster-tour-content-wrap gdlr-core-skin-e-background gdlr-core-js" data-sync-height="tour-item-16">
                                                    <h3 class="tourmaster-tour-title gdlr-core-skin-title" style="font-size: 18px;font-weight: 800;letter-spacing: 0px;text-transform: none;"><a href="#" >{{ $paket_trip->nama_paket }}</a></h3>
                                                    <div class="tourmaster-tour-price-wrap "><span class="tourmaster-tour-price"><span class="tourmaster-head">Price</span><span class="tourmaster-tail" style="font-size: 14pt">Rp. {{ number_format($paket_trip->price,0,",",".") }}</span></span>
                                                    </div>
                                                    <div class="tourmaster-tour-info-wrap clearfix">
                                                        <div class="tourmaster-tour-info tourmaster-tour-info-duration-text ">
                                                            {{-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 465 465" xml:space="preserve">

                                                                <path d="M279.591,423.714c-3.836,0.956-7.747,1.805-11.629,2.52c-10.148,1.887-16.857,11.647-14.98,21.804
                                                                c0.927,4.997,3.765,9.159,7.618,11.876c3.971,2.795,9.025,4.057,14.175,3.099c4.623-0.858,9.282-1.867,13.854-3.008
                                                                c10.021-2.494,16.126-12.646,13.626-22.662C299.761,427.318,289.618,421.218,279.591,423.714z" />
                                                                <path d="M417.887,173.047c1.31,3.948,3.811,7.171,6.97,9.398c4.684,3.299,10.813,4.409,16.662,2.475
                                                                c9.806-3.256,15.119-13.83,11.875-23.631c-1.478-4.468-3.118-8.95-4.865-13.314c-3.836-9.59-14.714-14.259-24.309-10.423
                                                                c-9.585,3.834-14.256,14.715-10.417,24.308C415.271,165.528,416.646,169.293,417.887,173.047z" />
                                                                <path d="M340.36,397.013c-3.299,2.178-6.704,4.286-10.134,6.261c-8.949,5.162-12.014,16.601-6.854,25.546
                                                                c1.401,2.433,3.267,4.422,5.416,5.942c5.769,4.059,13.604,4.667,20.127,0.909c4.078-2.352,8.133-4.854,12.062-7.452
                                                                c8.614-5.691,10.985-17.294,5.291-25.912C360.575,393.686,348.977,391.318,340.36,397.013z" />
                                                                <path d="M465.022,225.279c-0.407-10.322-9.101-18.356-19.426-17.953c-10.312,0.407-18.352,9.104-17.947,19.422
                                                                c0.155,3.945,0.195,7.949,0.104,11.89c-0.145,6.473,3.021,12.243,7.941,15.711c2.931,2.064,6.488,3.313,10.345,3.401
                                                                c10.322,0.229,18.876-7.958,19.105-18.285C465.247,234.756,465.208,229.985,465.022,225.279z" />
                                                                <path d="M414.835,347.816c-8.277-6.21-19.987-4.524-26.186,3.738c-2.374,3.164-4.874,6.289-7.434,9.298
                                                                c-6.69,7.86-5.745,19.666,2.115,26.361c0.448,0.38,0.901,0.729,1.371,1.057c7.814,5.509,18.674,4.243,24.992-3.171
                                                                c3.057-3.59,6.037-7.323,8.874-11.102C424.767,365.735,423.089,354.017,414.835,347.816z" />
                                                                <path d="M442.325,280.213c-9.855-3.09-20.35,2.396-23.438,12.251c-1.182,3.765-2.492,7.548-3.906,11.253
                                                                c-3.105,8.156-0.13,17.13,6.69,21.939c1.251,0.879,2.629,1.624,4.126,2.19c9.649,3.682,20.454-1.159,24.132-10.812
                                                                c1.679-4.405,3.237-8.906,4.646-13.382C457.66,293.795,452.178,283.303,442.325,280.213z" />
                                                                <path d="M197.999,426.402c-16.72-3.002-32.759-8.114-47.968-15.244c-0.18-0.094-0.341-0.201-0.53-0.287
                                                                c-3.584-1.687-7.162-3.494-10.63-5.382c-0.012-0.014-0.034-0.023-0.053-0.031c-6.363-3.504-12.573-7.381-18.606-11.628
                                                                C32.24,331.86,11.088,209.872,73.062,121.901c13.476-19.122,29.784-35.075,47.965-47.719c0.224-0.156,0.448-0.311,0.67-0.468
                                                                c64.067-44.144,151.06-47.119,219.089-1.757l-14.611,21.111c-4.062,5.876-1.563,10.158,5.548,9.518l63.467-5.682
                                                                c7.12-0.64,11.378-6.799,9.463-13.675L387.61,21.823c-1.908-6.884-6.793-7.708-10.859-1.833l-14.645,21.161
                                                                C312.182,7.638,252.303-5.141,192.87,5.165c-5.986,1.036-11.888,2.304-17.709,3.78c-0.045,0.008-0.081,0.013-0.117,0.021
                                                                c-0.225,0.055-0.453,0.128-0.672,0.189C123.122,22.316,78.407,52.207,46.5,94.855c-0.269,0.319-0.546,0.631-0.8,0.978
                                                                c-1.061,1.429-2.114,2.891-3.145,4.353c-1.686,2.396-3.348,4.852-4.938,7.308c-0.199,0.296-0.351,0.597-0.525,0.896
                                                                C10.762,149.191-1.938,196.361,0.24,244.383c0.005,0.158-0.004,0.317,0,0.479c0.211,4.691,0.583,9.447,1.088,14.129
                                                                c0.027,0.302,0.094,0.588,0.145,0.89c0.522,4.708,1.177,9.427,1.998,14.145c8.344,48.138,31.052,91.455,65.079,125.16
                                                                c0.079,0.079,0.161,0.165,0.241,0.247c0.028,0.031,0.059,0.047,0.086,0.076c9.142,9.017,19.086,17.357,29.793,24.898
                                                                c28.02,19.744,59.221,32.795,92.729,38.808c10.167,1.827,19.879-4.941,21.703-15.103
                                                                C214.925,437.943,208.163,428.223,197.999,426.402z" />
                                                                <path d="M221.124,83.198c-8.363,0-15.137,6.78-15.137,15.131v150.747l137.87,71.271c2.219,1.149,4.595,1.69,6.933,1.69
                                                                c5.476,0,10.765-2.982,13.454-8.185c3.835-7.426,0.933-16.549-6.493-20.384l-121.507-62.818V98.329
                                                                C236.243,89.978,229.477,83.198,221.124,83.198z" />
                                                            </svg>5 Days </div> --}}
                                                    </div>
                                                    <div class="tourmaster-tour-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><span class="tourmaster-tour-rating-text">(1 Review)</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <h6 style="text-align: center">Data tidak tersedia</h6>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 190px 0px 160px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url({{ asset('frontend/assets_new/images/wallpaper/bg_video.webp') }}) ;background-size: cover ;background-position: bottom center ;" data-parallax-speed="0.2"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 25px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 55px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #ffffff ;">Traveling Highlights<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-image-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-center-align" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-image-item-wrap gdlr-core-media-image  gdlr-core-image-item-style-rectangle" style="border-width: 0px;">
                                <a class="gdlr-core-lightgallery gdlr-core-js " href="https://www.youtube.com/watch?v=Yb6KMxB3I1M&#038;list=PLNIFTA4Bjp3stwYxIB6Aokpr9bfRQYO73"><img src="{{ asset('frontend/assets_new/upload/tvicon5.png') }}" alt="" width="71" height="71" title="tvicon5" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="padding: 45px 0px 40px 0px;">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-size: cover ;background-position: center ;" data-parallax-speed="0.1"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 10px ;">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 28px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">Partnership<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-gallery-item gdlr-core-item-pdb clearfix  gdlr-core-gallery-item-style-grid" style="padding-bottom: 0px ;">
                            <div class="gdlr-core-gallery-item-holder gdlr-core-js-2 clearfix" data-layout="fitrows">
                                <div class="gdlr-core-item-list gdlr-core-gallery-column  gdlr-core-column-12 gdlr-core-column-first gdlr-core-item-pdlr gdlr-core-item-mgb">
                                    <div class="gdlr-core-gallery-list gdlr-core-media-image"><img src="{{ asset('frontend/assets_new/images/partner/logo_plesiran_malang.png') }}" alt="" width="300" height="129" title="Plesiran Malang" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type='text/javascript' src='{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js') }}'></script>
<script type="text/javascript" src="{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/extensions/revolution.extension.parallax.min.js') }}"></script>  
<script type="text/javascript" src="{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/extensions/revolution.extension.actions.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets_new/plugins/revslider/public/assets/js/extensions/revolution.extension.video.min.js') }}"></script>   
<script type="text/javascript">
    /*<![CDATA[*/
    function setREVStartSize(e) {
        try {
            e.c = jQuery(e.c);
            var i = jQuery(window).width(),
                t = 9999,
                r = 0,
                n = 0,
                l = 0,
                f = 0,
                s = 0,
                h = 0;
            if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                    f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                var u = (e.c.width(), jQuery(window).height());
                if (void 0 != e.fullScreenOffsetContainer) {
                    var c = e.fullScreenOffsetContainer.split(",");
                    if (c) jQuery.each(c, function(e, i) {
                        u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                    }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                }
                f = u
            } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
            e.c.closest(".rev_slider_wrapper").css({
                height: f
            })
        } catch (d) {
            console.log("Failure at Presize of Slider:" + d)
        }
    }; /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    function revslider_showDoubleJqueryError(sliderID) {
        var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
        errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
        errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
        errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
        errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
        jQuery(sliderID).show().html(errorMessage);
    } /*]]>*/
</script>
<script>
    /*<![CDATA[*/
    var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
    var htmlDivCss = "";
    if (htmlDiv) {
        htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
    } else {
        var htmlDiv = document.createElement("div");
        htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
        document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
    } /*]]>*/
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    if (setREVStartSize !== undefined) setREVStartSize({
        c: '#rev_slider_1_1',
        gridwidth: [1280],
        gridheight: [680],
        sliderLayout: 'auto'
    });
    var revapi1, tpj;
    (function() {
        if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
        else onLoad();

        function onLoad() {
            if (tpj === undefined) {
                tpj = jQuery;
                if ("off" == "on") tpj.noConflict();
            }
            if (tpj("#rev_slider_1_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_1");
            } else {
                revapi1 = tpj("#rev_slider_1_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "plugins/revslider/public/assets/js/",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            touchOnDesktop: "off",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "uranus",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 1024,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 50
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 50
                            }
                        },
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            style: "uranus",
                            hide_onleave: false,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 5,
                            v_offset: 25,
                            space: 10,
                            tmp: '<span class="tp-bullet-inner"></span>'
                        }
                    },
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: 1280,
                    gridheight: 680,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            };
        };
    }()); /*]]>*/
</script>
<script>
    /*<![CDATA[*/
    var htmlDivCss = unescape("%23rev_slider_1_1%20.uranus.tparrows%20%7B%0A%20%20width%3A50px%3B%0A%20%20height%3A50px%3B%0A%20%20background%3Argba%28255%2C255%2C255%2C0%29%3B%0A%20%7D%0A%20%23rev_slider_1_1%20.uranus.tparrows%3Abefore%20%7B%0A%20width%3A50px%3B%0A%20height%3A50px%3B%0A%20line-height%3A50px%3B%0A%20font-size%3A40px%3B%0A%20transition%3Aall%200.3s%3B%0A-webkit-transition%3Aall%200.3s%3B%0A%20%7D%0A%20%0A%20%20%23rev_slider_1_1%20.uranus.tparrows%3Ahover%3Abefore%20%7B%0A%20%20%20%20opacity%3A0.75%3B%0A%20%20%7D%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%7B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C%200%29%3B%0A%20%20-webkit-transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20background%3Atransparent%3B%0A%20%20width%3A15px%3B%0A%20%20height%3A15px%3B%0A%7D%0A%23rev_slider_1_1%20.uranus%20.tp-bullet.selected%2C%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%3Ahover%20%7B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C1%29%3B%0A%20%20border%3Anone%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background%3Atransparent%3B%0A%7D%0A%0A%23rev_slider_1_1%20.uranus%20.tp-bullet-inner%20%7B%0A%20%20-webkit-transition%3A%20background-color%200.3s%20ease%2C%20-webkit-transform%200.3s%20ease%3B%0A%20%20transition%3A%20background-color%200.3s%20ease%2C%20transform%200.3s%20ease%3B%0A%20%20top%3A%200%3B%0A%20%20left%3A%200%3B%0A%20%20width%3A%20100%25%3B%0A%20%20height%3A%20100%25%3B%0A%20%20outline%3A%20none%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background-color%3A%20rgb%28255%2C%20255%2C%20255%29%3B%0A%20%20background-color%3A%20rgba%28255%2C%20255%2C%20255%2C%200.3%29%3B%0A%20%20text-indent%3A%20-999em%3B%0A%20%20cursor%3A%20pointer%3B%0A%20%20position%3A%20absolute%3B%0A%7D%0A%0A%23rev_slider_1_1%20.uranus%20.tp-bullet.selected%20.tp-bullet-inner%2C%0A%23rev_slider_1_1%20.uranus%20.tp-bullet%3Ahover%20.tp-bullet-inner%7B%0A%20transform%3A%20scale%280.4%29%3B%0A%20-webkit-transform%3A%20scale%280.4%29%3B%0A%20background-color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%7D%0A");
    var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
    if (htmlDiv) {
        htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
    } else {
        var htmlDiv = document.createElement('div');
        htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
        document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
    } /*]]>*/
</script>
@endsection