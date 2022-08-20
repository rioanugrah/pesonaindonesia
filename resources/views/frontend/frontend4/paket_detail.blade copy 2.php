
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Suntour</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <?php $css = asset('frontend/assets4/'); ?>
    <link rel="stylesheet" href="{{ $css }}/css/reset.css">
    <link rel="stylesheet" href="{{ $css }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ $css }}/css/font-awesome.css">
    <link rel="stylesheet" href="{{ $css }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ $css }}/css/jquery.fancybox.css">
    <link rel="stylesheet" href="{{ $css }}/fonts/fi/flaticon.css">
    <link rel="stylesheet" href="{{ $css }}/css/flexslider.css">
    <link rel="stylesheet" href="{{ $css }}/css/main.css">
    <link rel="stylesheet" href="{{ $css }}/css/indent.css">
    <link rel="stylesheet" href="{{ $css }}/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="{{ $css }}/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="{{ $css }}/rs-plugin/css/navigation.css">
    <link rel="stylesheet" href="{{ $css }}/tuner/css/colorpicker.css">
    <link rel="stylesheet" href="{{ $css }}/tuner/css/styles.css">
  </head>
  <body>
    <!-- header page-->
    <header>
      <!-- site top panel-->
      <div class="site-top-panel">
        <div class="container p-relative">
          <div class="row">
            <div class="col-md-6 col-sm-7">
              <!-- lang select wrapper-->
              <div class="top-left-wrap font-3">
                <div class="mail-top"><a href="mailto:support.suntour@example.com"> <i class="flaticon-suntour-email"></i>suntour@example.com</a></div><span>/</span>
                <div class="tel-top"><a href="tel:(723)-700-1183"> <i class="flaticon-suntour-phone"></i>(723)-700-1183</a></div>
              </div>
              <!-- ! lang select wrapper-->
            </div>
            <div class="col-md-6 col-sm-5 text-right">
              <div class="top-right-wrap">
                <div class="top-login"><a href="#">My Account</a></div>
                <div class="curr-wrap dropdown">
                  <div>
                    <ul>
                      <li><a href="#" class="lang-sel icl-en">Currency<i class="fa fa-angle-down"></i></a>
                        <ul>
                          <li><a href="#">USD</a></li>
                          <li><a href="#">EUR</a></li>
                          <li> <a href="#">GBP</a></li>
                          <li> <a href="#">AUD</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="lang-wrap dropdown">
                  <div>
                    <ul>
                      <li><a href="#" class="lang-sel icl-en">Language <i class="fa fa-angle-down"></i></a>
                        <ul>
                          <li><a href="#">English</a></li>
                          <li> <a href="#">Deutsch</a></li>
                          <li> <a href="#">Espanol</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ! site top panel-->
      <!-- Navigation panel-->
      <nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
          <!-- Logo ( * your text or image into link tag *)-->
          <div class="nav-logo-wrap local-scroll"><a href="index.html" class="logo"><img src="img/logo.png" data-at2x="img/logo@2x.png" alt></a></div>
          <!-- Main Menu-->
          <div class="inner-nav desktop-nav">
            <ul class="clearlist">
              <!-- Item With Sub-->
              <li><a href="index.html" class="mn-has-sub">Home <i class="fa fa-angle-down button_open"></i></a>
                <ul class="mn-sub">
                  <li><a href="index.html">Standart Slider</a></li>
                  <li><a href="index-search.html">Main Search</a></li>
                  <li><a href="index-slider.html">Full Slider</a></li>
                  <li><a href="index-video.html">Video Slider</a></li>
                </ul>
              </li>
              <!-- End Item With Sub-->
              <li class="slash">/</li>
              <!-- Item With Sub-->
              <li><a href="hotels-search.html" class="mn-has-sub active">Hotels <i class="fa fa-angle-down button_open"></i></a>
                <!-- Sub-->
                <ul class="mn-sub">
                  <li><a href="hotels-list.html">Hotels list</a></li>
                  <li><a href="hotels-search.html">Hotels search</a></li>
                  <li class="active"><a href="hotels-details.html">Hotels details</a></li>
                </ul>
                <!-- End Sub-->
              </li>
              <!-- End Item With Sub-->
              <li class="slash">/</li>
              <!-- Item With Sub-->
              <li class="megamenu"><a href="page-about-us.html" class="mn-has-sub">Pages <i class="fa fa-angle-down button_open"></i></a>
                <!-- Sub-->
                <ul class="mn-sub mn-has-multi">
                  <li class="mn-sub-multi"><a class="mn-group-title">Pages</a>
                    <ul>
                      <li><a href="page-about-us.html">About Us</a></li>
                      <li><a href="page-services.html">Services</a></li>
                      <li><a href="page-procces.html">Our Procces</a></li>
                      <li><a href="page-our-team.html">Our Team</a></li>
                      <li><a href="page-profile.html">Profile</a></li>
                      <li><a href="page-elements.html">Elements</a></li>
                    </ul>
                  </li>
                  <li class="mn-sub-multi"><a class="mn-group-title">Portfolio</a>
                    <ul>
                      <li><a href="portfolio-3-col.html">Three Columns</a></li>
                      <li><a href="portfolio-4-col.html">Four Columns</a></li>
                      <li><a href="portfolio-masonry.html">Portfolio Masonry</a></li>
                      <li><a href="portfolio-with-sidebar.html">With Sidebar</a></li>
                      <li><a href="portfolio-gallery.html">Gallery</a></li>
                      <li><a href="page-portfolio-single.html">Portfolio Single</a></li>
                    </ul>
                  </li>
                  <li class="mn-sub-multi"><a class="mn-group-title">Blog</a>
                    <ul>
                      <li><a href="blog-2-col-sidebar.html">Two Columns + Sidebar</a></li>
                      <li><a href="blog-3-col.html">Three Columns</a></li>
                      <li><a href="blog-4-col.html">Four Columns</a></li>
                      <li><a href="blog-single.html">Blog Single</a></li>
                      <li><a href="blog-grid.html">Blog Grid</a></li>
                      <li><a href="blog-list.html">Blog List</a></li>
                    </ul>
                  </li>
                </ul>
                <!-- End Sub-->
              </li>
              <!-- End Item With Sub-->
              <!-- span /-->
              <!-- Item With Sub-->
              <!-- End Item With Sub-->
              <li class="slash">/</li>
              <!-- Item With Sub-->
              <li><a href="shop-grid.html" class="mn-has-sub">Shop <i class="fa fa-angle-down button_open"></i></a>
                <!-- Sub-->
                <ul class="mn-sub">
                  <li><a href="shop-grid.html">Shop Grid</a></li>
                  <li><a href="shop-cart.html">Shop Cart</a></li>
                  <li><a href="shop-checkout.html">Shop Checkout</a></li>
                  <li><a href="shop-single.html">Shop Single Product</a></li>
                </ul>
                <!-- End Sub-->
              </li>
              <!-- End Item With Sub-->
              <li class="slash">/</li>
              <!-- Item-->
              <li><a href="page-contact.html">Contact</a></li>
              <!-- End Item-->
              <!-- Search-->
              <li class="search"><a href="#" class="mn-has-sub">Search</a>
                <ul class="search-sub">
                  <li>
                    <div class="container">
                      <div class="mn-wrap">
                        <form method="post" class="form">
                          <div class="search-wrap">
                            <input type="text" placeholder="Where will you go next?" class="form-control search-field"><i class="flaticon-suntour-search search-icon"></i>
                          </div>
                        </form>
                      </div>
                      <div class="close-button"><span>Search</span></div>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- End Search-->
            </ul>
          </div>
          <!-- End Main Menu-->
        </div>
      </nav>
      <!-- End Navigation panel-->
      <!-- breadcrumbs start-->
      <section style="background-image:url('pic/breadcrumbs/bg-2.jpg');" class="breadcrumbs style-2 gray-90">
        <div class="container">
          <div class="text-left breadcrumbs-item"><a href="#">home</a><i>/</i><a href="#">hotels</a><i>/</i><a href="#" class="last"><span>Hotel</span> Bohemians</a>
            <h2><span>Hotel</span> Bohemians<span class="stars stars-4"><span>4 stars</span></span></h2>
            <div class="location"><i class="flaticon-suntour-map"></i>
              <p class="font-4">9300 Meadow Lane, Kalamazoo, MI 49009, Istanbul, Turkey</p><a href="#location" class="scrollto">Show map</a>
            </div>
          </div>
          <div class="breadright"><a href="#" class="cws-button small alt">Get price</a>
            <p>Best Price Guarantee</p>
          </div>
        </div>
      </section>
      <!-- ! breadcrumbs end-->
    </header>
    <!-- ! header page-->
    <div class="content-body">
      <section class="page-section pt-0 pb-50">
        <div class="container">
          <div class="menu-widget with-switch mt-30 mb-30">
            <ul class="magic-line">
              <li class="current_item"><a href="#overview" class="scrollto">Overview</a></li>
              <li><a href="#prices" class="scrollto">Prices</a></li>
              <li><a href="#location" class="scrollto">Location</a></li>
              <li><a href="#amenties" class="scrollto">Amenties</a></li>
              <li><a href="#reviews" class="scrollto">Reviews (28) <span class="stars stars-5"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="container">
          <div id="flex-slider" class="flexslider">
            <ul class="slides">
              <li><img src="pic/flexslider/l-1.jpg" alt></li>
              <li><img src="pic/flexslider/l-2.jpg" alt></li>
              <li><img src="pic/flexslider/l-3.jpg" alt></li>
              <li><img src="pic/flexslider/l-4.jpg" alt></li>
              <li><img src="pic/flexslider/l-5.jpg" alt></li>
              <li><img src="pic/flexslider/l-6.jpg" alt></li>
              <li><img src="pic/flexslider/l-7.jpg" alt></li>
              <li><img src="pic/flexslider/l-8.jpg" alt></li>
              <li><img src="pic/flexslider/l-9.jpg" alt></li>
              <li><img src="pic/flexslider/l-1.jpg" alt></li>
            </ul>
          </div>
          <div id="flex-carousel" class="flexslider">
            <ul class="slides">
              <li><img src="pic/flexslider/1@2x.jpg" data-at2x="pic/flexslider/1@2x.jpg" alt></li>
              <li><img src="pic/flexslider/2.jpg" data-at2x="pic/flexslider/2@2x.jpg" alt></li>
              <li><img src="pic/flexslider/3.jpg" data-at2x="pic/flexslider/3@2x.jpg" alt></li>
              <li><img src="pic/flexslider/4.jpg" data-at2x="pic/flexslider/4@2x.jpg" alt></li>
              <li><img src="pic/flexslider/5.jpg" data-at2x="pic/flexslider/5@2x.jpg" alt></li>
              <li><img src="pic/flexslider/6.jpg" data-at2x="pic/flexslider/6@2x.jpg" alt></li>
              <li><img src="pic/flexslider/7@2x.jpg" data-at2x="pic/flexslider/7@2x.jpg" alt></li>
              <li><img src="pic/flexslider/8@2x.jpg" data-at2x="pic/flexslider/8@2x.jpg" alt></li>
              <li><img src="pic/flexslider/9.jpg" data-at2x="pic/flexslider/9@2x.jpg" alt></li>
              <li><img src="pic/flexslider/1.jpg" data-at2x="pic/flexslider/1@2x.jpg" alt></li>
            </ul>
          </div>
        </div>
        <div class="container mt-30">
          <h4 class="mb-20">Morbi facilisis nisi et leo egestas gravida</h4>
          <div class="row">
            <div class="col-md-8">
              <p class="mb-15">Barcelo Eresin Topkapi offers a modern setting in Istanbul and features a swimming pool, free Wi-Fi and complimentary private parking on-site. It also has a sauna, a Jacuzzi and a Turkish steam bath. </p>
              <p class="mb-15">Guests can enjoy a range of massage treatments and beauty therapy at the on-site spa, U Spa. It offers child-minding services, a currency exchange and a reception that is available 24/7. It also has superb facilities for meetings and events. </p>
              <p class="mb-15">Rooms offer premium amenities, including mini bars, pillow menus and rain showers. All have a sofa bed, slippers and tea and coffee making facilities. </p>
              <p class="mb-15">The hotel's restaurant, Picasso, serves Turkish and international cuisine. In the evening, guests are able to relax in the cosy lounge bar.</p>
              <p>The area surrounding <ins class="alt-4">Barcelo Eresin</ins>  is popular for its shopping. The helpful staff at the tour desk are available to book tours and sightseeing trips in Istanbul.</p>
            </div>
            <div class="col-md-4">
              <div class="bg-gray-3 p-30-40">
                <ul class="style-1 mb-0">
                  <li>Parking</li>
                  <li>Concierge service</li>
                  <li>Gift shop</li>
                  <li>Meeting/Banquet facilities</li>
                  <li>Wheelchair accessible</li>
                  <li>Restaurant</li>
                  <li>Express check out</li>
                  <li>Air-conditioned</li>
                  <li>Babysitting/child services (surcharge)</li>
                </ul><a href="#"><ins class="alt-5">More amenties</ins></a>
              </div>
            </div>
          </div>
        </div>
        <!-- section prices-->
        <div id="prices" class="container mb-50 mt-40">
          <div class="search-hotels room-search pattern">
            <div class="search-room-title">
              <h5>Choose your room</h5>
            </div>
            <div class="tours-container">
              <div class="tours-box">
                <div class="tours-search mb-20">
                  <form method="post" class="form search divider-skew">
                    <div class="search-wrap">
                      <input type="text" placeholder="Destination" class="form-control search-field"><i class="flaticon-suntour-map search-icon"></i>
                    </div>
                  </form>
                  <div class="tours-calendar divider-skew"> 
                    <input placeholder="Depart date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="calendar-default textbox-n"><i class="flaticon-suntour-calendar calendar-icon"></i>
                  </div>
                  <div class="tours-calendar divider-skew"> 
                    <input placeholder="Return date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="calendar-default textbox-n"><i class="flaticon-suntour-calendar calendar-icon"></i>
                  </div>
                  <div class="selection-box divider-skew"><i class="flaticon-suntour-adult box-icon"></i>
                    <select>
                      <option>Adult</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="selection-box divider-skew"><i class="flaticon-suntour-children box-icon"></i>
                    <select>
                      <option>Child</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="selection-box"><i class="flaticon-suntour-bed box-icon"></i>
                    <select>
                      <option>Room</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                  <div class="button-search">GO</div>
                </div>
              </div>
            </div>
          </div>
          <div class="room-table">
            <table class="table alt-2">
              <thead>
                <tr>
                  <th>Room Type</th>
                  <th>Max.</th>
                  <th>Options</th>
                  <th>Today's price</th>
                  <th>Booking</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <img src="pic/190x130.jpg" data-at2x="pic/190x130@2x.jpg" alt>
                    <h6>Grand Hotel Wien</h6>
                    <p class="mb-0">(Extra beds available: Crib, <br> Rollaway bed) Room sleeps <br> 4 guests (up to 3 children)</p>
                  </td>
                  <td> 
                    <div class="table-icon"><i class="flaticon-people"></i><i class="flaticon-people"></i><i class="flaticon-people"></i><i class="flaticon-people"></i><i class="flaticon-people alt"></i></div>
                    <p>4 guest</p>
                  </td>
                  <td> 
                    <ul class="style-1">
                      <li>Special conditions, pay when you stay</li>
                      <li>Breakfast included</li>
                      <li>Free Parking</li>
                    </ul>
                  </td>
                  <td class="room-price">$120</td>
                  <td> <a href="#" class="cws-button alt gray">Book now</a></td>
                </tr>
                <tr>
                  <td> <img src="pic/190x130.jpg" data-at2x="pic/190x130@2x.jpg" alt>
                    <h6>Deluxe Room, Sea View</h6>
                    <p class="mb-0">(Extra beds available: Crib, <br> Rollaway bed)</p>
                  </td>
                  <td> 
                    <div class="table-icon"><i class="flaticon-people"></i><i class="flaticon-people"></i><i class="flaticon-people alt"></i><i class="flaticon-people alt"></i><i class="flaticon-people alt"></i></div>
                    <p>2 guest</p>
                  </td>
                  <td> 
                    <ul class="style-1">
                      <li>Special conditions, pay when you stay</li>
                      <li>Breakfast included</li>
                      <li>Free Parking</li>
                      <li>Free Internet</li>
                    </ul>
                  </td>
                  <td class="room-price">Sold out</td>
                  <td> <a href="#" class="cws-button alt gray">Book now</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- section location-->
        <div id="location" class="container mb-50">
          <div class="row">
            <div class="col-md-12">
              <h4 class="trans-uppercase mb-10">Location</h4>
              <div class="cws_divider mb-30"></div>
              <!-- google map-->
              <div class="map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25295.930156304785!2d16.371063311644324!3d48.208404844730474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d07986fcad78b%3A0x73f5a4d267cc4174!2zTmFnbGVyZ2Fzc2UgMTAsIDEwMTAgV2llbiwg0JDQstGB0YLRgNC40Y8!5e0!3m2!1sru!2sua!4v1453294615596" allowfullscreen=""></iframe>
              </div>
              <ul class="icon inline mt-20">
                <li> <a href="#">9300 Meadow Lane, Kalamazoo, MI 49009<i class="flaticon-suntour-map"></i></a></li>
                <li> <a href="#">00 1 877-859-5095<i class="flaticon-suntour-phone"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- section amenties-->
        <div id="amenties" class="container mb-50">
          <div class="row">
            <div class="col-md-12">
              <h4 class="trans-uppercase mb-10">Amenties</h4>
              <div class="cws_divider mb-10"></div>
            </div>
          </div>
          <div class="row mt-0 masonry">
            <div class="col-md-3 col-sm-6">
              <h6 class="trans-uppercase">General</h6>
              <ul class="style-1">
                <li>Room Service</li>
                <li>Newspapers</li>
                <li>Non-smoking Rooms</li>
                <li>Family Rooms</li>
                <li>Elevator</li>
                <li>Safe</li>
                <li>Heating</li>
                <li>All Spaces Non-Smoking</li>
                <li>Air Conditioning</li>
                <li>Carpeted</li>
              </ul>
              <h6 class="trans-uppercase mt-20">Business Facilities</h6>
              <ul class="style-1">
                <li>RooFax/Photocopying</li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6">
              <h6 class="trans-uppercase">Media & Technology</h6>
              <ul class="style-1">
                <li>Telephone</li>
                <li>Radio</li>
                <li>Cable channels</li>
                <li>Flat-screen TV</li>
              </ul>
              <h6 class="trans-uppercase mt-20"> Bathroom</h6>
              <ul class="style-1">
                <li>Hairdryer</li>
                <li>Toilet</li>
                <li>Bathroom</li>
                <li>Slippers</li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6">
              <h6 class="trans-uppercase">Food & Drink</h6>
              <ul class="style-1">
                <li>Bar</li>
                <li>Breakfast in the Room</li>
                <li>Restaurant with Dining Menu</li>
                <li>FSpecial Diet Meals (upon request)</li>
                <li>Minibar</li>
              </ul>
              <h6 class="trans-uppercase mt-20"> Activites</h6>
              <ul class="style-1">
                <li>Hiking</li>
                <li>Cycling</li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6">
              <h6 class="trans-uppercase">Front Desk Services</h6>
              <ul class="style-1">
                <li>24-Hour Front Desk</li>
                <li>Currency Exchange</li>
                <li>Tour Desk</li>
                <li>Ticket Service</li>
                <li>Baggage Storage</li>
                <li>Concierge Service</li>
              </ul>
              <h6 class="trans-uppercase mt-20"> Cleaning Services</h6>
              <ul class="style-1">
                <li>Laundry</li>
                <li>Dry Cleaning</li>
                <li>Ironing Service</li>
                <li>Shoeshine</li>
                <li>Daily Housekeeping</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- section reviews-->
        <div id="reviews" class="container mb-60">
          <div class="row">
            <div class="col-md-12">
              <h4 class="trans-uppercase mb-10">Reviews travellers</h4>
              <div class="cws_divider mb-30"></div>
            </div>
          </div>
          <div class="reviews-wrap">
            <div class="reviews-top pattern relative">
              <div class="reviews-total">
                <h5>Excellent</h5>
                <div class="reviews-sub-mark">4.2</div>
                <div class="stars-perc"><span style="width:85%"></span></div><span>Based on 67 reviews</span>
              </div>
              <div class="reviews-marks">
                <ul>
                  <li>Cleanliness<span><span class="stars-perc"><span style="width:85%"></span></span>4.5</span></li>
                  <li>Location<span><span class="stars-perc"><span style="width:80%"></span></span>4.0</span></li>
                  <li>Staff<span><span class="stars-perc"><span style="width:100%"></span></span>5.0</span></li>
                  <li>Free Wi-Fi<span><span class="stars-perc"><span style="width:65%"> </span></span>3.5</span></li>
                </ul>
                <ul>
                  <li>Comfort<span><span class="stars-perc"><span style="width:85%"> </span></span>4.5</span></li>
                  <li>Facilities<span><span class="stars-perc"><span style="width:80%"></span></span>4.0</span></li>
                  <li>Value for money<span><span class="stars-perc"><span style="width:100%"> </span></span>5.0</span></li>
                </ul>
              </div>
            </div>
            <div class="comments">
              <div class="comment-body">
                <div class="avatar"><img src="pic/blog/90x90/1.jpg" data-at2x="pic/blog/90x90/1@2x.jpg" alt>12 Reviews</div>
                <div class="comment-info">
                  <div class="comment-meta">
                    <div class="title">
                      <h5>Lovely clean, comfortable hotel <span>Rachel George</span></h5>
                    </div>
                    <div class="comment-date">
                      <div class="stars stars-5">5</div><span>Mon, 03-23-2016</span>
                    </div>
                  </div>
                  <div class="comment-content">
                    <p>Proin ut pretium sem. Maecenas id commodo massa. Sed vitae urna hendrerit, commodo dolor non, porttitor odio. Suspendisse ac arcu eu enim lobortis luctus sed quis velit. Nam ut vestibulum orci, at sodales libero. Fusce egestas urna a dolor fermentum, id tincidunt leo eleifend. Phasellus pulvinar hendrerit pulvinar.</p>
                  </div>
                </div>
              </div>
              <div class="comment-body">
                <div class="avatar"><img src="pic/blog/90x90/2.jpg" data-at2x="pic/blog/90x90/2@2x.jpg" alt>12 Reviews</div>
                <div class="comment-info">
                  <div class="comment-meta">
                    <div class="title">
                      <h5>Brilliant hotel with history <span>Phillip Ferguson</span></h5>
                    </div>
                    <div class="comment-date">
                      <div class="stars stars-4">4</div><span>Mon, 03-23-2016</span>
                    </div>
                  </div>
                  <div class="comment-content">
                    <p>Vestibulum tellus justo, scelerisque sit amet imperdiet et, placerat non massa. Aliquam erat volutpat. Proin vitae enim cursus, dapibus est at, feugiat mauris. Sed molestie dolor sed ante dictum dictum. Quisque at nulla ipsum. Praesent interdum euismod turpis, eget tristique justo porta eu. Cras ullamcorper pulvinar nibh, eget faucibus neque porta in.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="reviews-bottom">
              <h4>You've been in this hotel?</h4>
            </div>
          </div>
        </div>
        <!-- review -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h4 class="trans-uppercase mb-10">Write a review</h4>
              <div class="cws_divider mb-30"></div>
            </div>
          </div>
          <div class="review-content pattern relative">
            <div class="row">
              <div class="col-md-5 mb-md-30 mb-xs-0">
                <div class="review-total"><img src="pic/blog/120x120.jpg" data-at2x="pic/blog/120x120@2x.jpg" alt>
                  <div class="review-total-content">
                    <h6>Hotel Bohemians</h6>
                    <div class="stars stars-4"></div>
                    <ul class="icon">
                      <li>Istanbul, Turkey<i class="flaticon-suntour-map"></i></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="review-marks clearfix mb-30">
                  <ul>
                    <li>Cleanliness
                      <div class="stars stars-5"></div>
                    </li>
                    <li>Location
                      <div class="stars stars-5"></div>
                    </li>
                    <li>Staff
                      <div class="stars stars-5"></div>
                    </li>
                    <li>Free Wi-Fi
                      <div class="stars stars-5"></div>
                    </li>
                  </ul>
                  <ul>
                    <li>Comfort
                      <div class="stars stars-5"></div>
                    </li>
                    <li>Facilities
                      <div class="stars stars-5"></div>
                    </li>
                    <li>Value for money
                      <div class="stars stars-5"></div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <form class="form clearfix">
              <div class="row">
                <div class="col-md-4">
                  <input type="text" name="email" value="" size="40" placeholder="First Name" aria-required="true" class="form-row form-row-first">
                </div>
                <div class="col-md-4">
                  <input type="text" name="email" value="" size="40" placeholder="Last Name" aria-required="true" class="form-row form-row-first">
                </div>
                <div class="col-md-4">
                  <input type="text" name="email" value="" size="40" placeholder="Booking Number" aria-required="true" class="form-row form-row-first">
                </div>
                <div class="col-md-12">
                  <input type="text" name="password" value="" size="40" placeholder="Title of your review" aria-required="true" class="form-row form-row-last">
                </div>
                <div class="col-md-12">
                  <textarea name="message" cols="40" rows="4" placeholder="Message of your review" aria-invalid="false" aria-required="true" class="mb-20"></textarea>
                  <input type="submit" value="Add a review" class="cws-button alt float-right">
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- ! review -->
      </section>
    </div>
    <!-- footer-->
    <footer style="background-image: url('pic/footer/footer-bg.jpg')" class="footer footer-fixed">
      <div class="container">
        <div class="row pb-100 pb-md-40">
          <!-- widget footer-->
          <div class="col-md-6 col-sm-12 mb-sm-30">
            <div class="logo-soc clearfix">
              <div class="footer-logo"><a href="index.html"><img src="img/logo-white.png" data-at2x="img/logo-white@2x.png" alt></a></div>
            </div>
            <p class="color-g2 mt-10">Vestibulum tincidunt venenatis scelerisque. Proin quis enim lacinia, vehicula massa et, mollis urna. Proin nibh mauris, blandit vitae convallis at, tincidunt vel tellus. Praesent posuere nec lectus non.</p>
            <!-- social-->
            <div class="social-link dark"><a href="#" class="cws-social fa fa-twitter"></a><a href="#" class="cws-social fa fa-facebook"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social fa fa-linkedin"></a></div>
            <!-- ! social-->
          </div>
          <!-- ! widget footer-->
          <!-- widget footer-->
          <div class="col-md-3 col-sm-6 mb-sm-30">
            <div class="widget-footer">
              <h4>Latest Tweets</h4>
              <div class="twitter-footer align-left"></div>
            </div>
          </div>
          <!-- end widget footer-->
          <!-- widget footer-->
          <div class="col-md-3 col-sm-6">
            <div class="widget-footer">
              <h4>Tag cloud</h4>
              <div class="widget-tags-wrap"><a href="#" rel="tag" class="tag">Adventure</a><a href="#" rel="tag" class="tag">Romantic</a><a href="#" rel="tag" class="tag">Wildlife</a><a href="#" rel="tag" class="tag">Beach</a><a href="#" rel="tag" class="tag">Honeymoon</a><a href="#" rel="tag" class="tag">Island</a><a href="#" rel="tag" class="tag">Parks</a><a href="#" rel="tag" class="tag">Family</a><a href="#" rel="tag" class="tag">Travel</a></div>
            </div>
          </div>
          <!-- end widget footer-->
        </div>
      </div>
      <!-- copyright-->
      <div class="copyright"> 
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <p>© Copyright 2016 <span>Suntour</span> &nbsp;&nbsp;|&nbsp;&nbsp; All Rights Reserved</p>
            </div>
            <div class="col-sm-6 text-right"><a href="index.html" class="footer-nav">Home</a><a href="page-about-us.html" class="footer-nav">Pages</a><a href="hotels-search.html" class="footer-nav">Hotels</a><a href="blog-grid.html" class="footer-nav">Blog</a><a href="shop-grid.html" class="footer-nav">Shop</a><a href="page-contact.html" class="footer-nav">Contacts</a></div>
          </div>
        </div>
      </div>
      <!-- end copyright-->
      <!-- scroll top-->
    </footer>
    <div id="scroll-top"><i class="fa fa-angle-up"></i></div>
    <!-- ! footer-->
    <!-- login popup-->
    <div class="login-popup">
      <div class="login-popup-wrap">
        <div class="title-wrap">
          <h2>Login</h2><i class="close-button flaticon-close"></i>
        </div>
        <div class="login-content">
          <form class="form">
            <input type="text" name="email" value="" size="40" placeholder="Enter Your Email ..." aria-required="true" class="form-row form-row-first">
            <input type="text" name="password" value="" size="40" placeholder="Enter Your Password ..." aria-required="true" class="form-row form-row-last">
          </form>
          <div class="remember">
            <div class="checkbox">
              <input id="checkbox30" type="checkbox" value="None" name="check">
              <label for="checkbox30">Remember Me</label>
            </div><a href="#">Forgot Password ?</a>
          </div><a href="#" class="cws-button gray alt full-width mt-20">Login now</a>
        </div>
        <div class="login-bot">
          <p>No account yet? <a href="#">Register now</a></p>
        </div>
      </div>
    </div>
    <!-- ! login popup-->
    <script src="https://www.youtube.com/player_api"></script>
    <?php $js = asset('frontend/assets4/'); ?>
    <script type="text/javascript" src="{{ $js }}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/bootstrap.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/owl.carousel.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/TweenMax.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/cws_parallax.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/script.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/bg-video/cws_self_vimeo_bg.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/bg-video/jquery.vimeo.api.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/bg-video/cws_YT_bg.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery.tweet.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="{{ $js }}/tuner/js/colorpicker.js"></script>
    <script type="text/javascript" src="{{ $js }}/tuner/js/scripts.js"></script>
    <script type="text/javascript" src="{{ $js }}/js/retina.min.js"></script>
  </body>
</html>