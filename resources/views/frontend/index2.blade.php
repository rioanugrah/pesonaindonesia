@extends('layouts.frontend2.app')

@section('content')
    <section class="our-history" id="tentang">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Tentang Kami</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-6 -->
                <div class="col-lg-6">
                    <p class="section-desc">Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang
                        menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi,
                        Destinasi, Restoran Transportasi, Travel dan MICE se Indonesia.</p>
                </div>
                <!-- end col-6 -->
                <div class="col-12">
                    <div class="wrapper">
                        <div class="content">
                            <div class="inner">
                                <h4>Guidong with Passion Since 1988</h4>
                                <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. In erat est viverra fringilla
                                    euismod in fermentum sed augue. Nullam consectetur ligula id elementum hendrerit
                                    suspendisse potenti. Nulla facilisi sed sque lectus venenatis quam venenatis euntum
                                    lectus molestie. </p>
                                <a href="#" class="read-more"><span>READ MORE</span></a>
                            </div>
                            <!-- end inner -->
                        </div>
                        <!-- end content -->
                        <figure><img src="frontend/assets2/images/history01.jpg" alt="Image"></figure>
                    </div>
                    <!-- end wrapper -->
                    <div class="wrapper">
                        <figure><img src="frontend/assets2/images/history02.jpg" alt="Image"></figure>
                        <div class="content">
                            <div class="inner">
                                <h4>The Highest Safety Standards</h4>
                                <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. In erat est viverra fringilla
                                    euismod in fermentum sed augue. Nullam consectetur ligula id elementum hendrerit
                                    suspendisse potenti. Nulla facilisi sed sque lectus venenatis quam venenatis euntum
                                    lectus molestie. </p>
                                <a href="#" class="read-more"><span>READ MORE</span></a>
                            </div>
                            <!-- end inner -->
                        </div>
                        <!-- end content -->
                    </div>
                    <!-- end wrapper -->
                    <div class="wrapper">
                        <div class="content">
                            <div class="inner">
                                <h4>Protecting world’s Environment</h4>
                                <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. In erat est viverra fringilla
                                    euismod in fermentum sed augue. Nullam consectetur ligula id elementum hendrerit
                                    suspendisse potenti. Nulla facilisi sed sque lectus venenatis quam venenatis euntum
                                    lectus molestie. </p>
                                <a href="#" class="read-more"><span>READ MORE</span></a>
                            </div>
                            <!-- end inner -->
                        </div>
                        <!-- end content -->
                        <figure><img src="frontend/assets2/images/history03.jpg" alt="Image"></figure>
                    </div>
                    <!-- end wrapper -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="about-us-desc">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2>VISI & MISI</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-12 -->
                <div class="col-lg-6">
                    <h4>Visi</h4>
                    <span>Menjadi Plesiran Malang sebagai pusat informasi dan reservasi industri pariwisata kreatif berbasis Digital Marketing yang inovatif.</span>
                </div>
                <!-- end col-6 -->
                <div class="col-lg-6">
                    <h4>Misi</h4>
                    <ol>
                        <li style="margin-bottom: 1rem">Memberikan kemudahan dan kenyamanan bagi setiap pelanggan yang membutuhkan informasi dan reservasi untuk kegiatan pariwisata.</li>
                        <li style="margin-bottom: 1rem">Membuat platform digital marketing yang mudah digunakan oleh pelanggan untuk mengetahui informasi dan reservasi hal-hal yang berhubungan dengan pariwisata.</li>
                        <li style="margin-bottom: 1rem">Menjalin kerjasama pemasaran dan informasi dengan seluruh industri pariwisata berskala lokal, nasional, dan internasional.</li>
                    </ol>
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="adventure-activities">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title">
                        <h2>Adventure Activities</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-6 -->
                <!-- end row -->

                <div class="col-lg-5">
                    <p class="section-desc">Orci varius natoque penatibus et magnis dis turient montes nascetur ridiculus
                        mus. Cras eleifend tellus sed congue consectetur, velit turpis faucibus odio eget volutpat odio
                        lectus eu erat.</p>
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end container -->
            <div class="col-12">
                <div class="activities-carousel">
                    <div class="swiper-carousel">
                        <div class="swiper-wrapper">
                            @foreach ($adventure as $ad)
                                <div class="swiper-slide">
                                    <a href="attractions-single.html">
                                        <figure class="activity-box"> <img src="{{ $ad['image'] }}" alt="Image">
                                            <figcaption>{{ $ad['title'] }}</figcaption>
                                        </figure>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- end  swiper-wrapper -->
                        <div class="swiper-button-prev">
                            <div class="arrow-left"></div>
                        </div>
                        <div class="swiper-button-next">
                            <div class="arrow-right"></div>
                        </div>
                    </div>
                    <!-- end swiper-carousel -->
                </div>
                <!-- end activities carousel -->
            </div>
            <!-- end col-12 -->
            <div class="col-12  text-center"> <a href="#" class="site-btn">LOAD MORE</a> </div>
            <!-- end col-12 -->
        </div>

    </section>
    <!-- end adventure-activities -->
    <section class="reviews">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Customer Reviews</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-12 -->
                <div class="col-12">
                    <div class="swiper-reviews">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="review"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <h4>A truly amazing experience!</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur dese adipiscing helit nullam li sodales, nibh
                                        quis viverra laotreet mauris jurna sagitis arcu ut erdiete metus dolor eget lemi.
                                    </p>
                                    <figure><img src="frontend/assets2/images/guide01.png" alt="Image"></figure>
                                    <small>JACK, USA</small>
                                </div>
                                <!-- end review -->
                            </div>
                            <!-- end swiper-slide -->
                            <div class="swiper-slide">
                                <div class="review"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <h4>A truly amazing experience!</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur dese adipiscing helit nullam li sodales, nibh
                                        quis viverra laotreet mauris jurna sagitis arcu ut erdiete metus dolor eget lemi.
                                    </p>
                                    <figure><img src="frontend/assets2/images/guide02.png" alt="Image"></figure>
                                    <small>KATE, GER</small>
                                </div>
                                <!-- end review -->
                            </div>
                            <!-- end swiper-slide -->
                            <div class="swiper-slide">
                                <div class="review"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <h4>A truly amazing experience!</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur dese adipiscing helit nullam li sodales, nibh
                                        quis viverra laotreet mauris jurna sagitis arcu ut erdiete metus dolor eget lemi.
                                    </p>
                                    <figure><img src="frontend/assets2/images/guide03.png" alt="Image"></figure>
                                    <small>JACK MC'CARTY, USA</small>
                                </div>
                                <!-- end review -->
                            </div>
                            <!-- end swiper-slide -->
                            <div class="swiper-slide">
                                <div class="review"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <h4>A truly amazing experience!</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur dese adipiscing helit nullam li sodales, nibh
                                        quis viverra laotreet mauris jurna sagitis arcu ut erdiete metus dolor eget lemi.
                                    </p>
                                    <figure><img src="frontend/assets2/images/guide04.png" alt="Image"></figure>
                                    <small>JANE, AUS</small>
                                </div>
                                <!-- end review -->
                            </div>
                            <!-- end swiper-slide -->
                            <div class="swiper-slide">
                                <div class="review"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <h4>A truly amazing experience!</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur dese adipiscing helit nullam li sodales, nibh
                                        quis viverra laotreet mauris jurna sagitis arcu ut erdiete metus dolor eget lemi.
                                    </p>
                                    <figure><img src="frontend/assets2/images/guide05.png" alt="Image"></figure>
                                    <small>JACK, USA</small>
                                </div>
                                <!-- end review -->
                            </div>
                            <!-- end swiper-slide -->
                            <div class="swiper-slide">
                                <div class="review"> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <h4>A truly amazing experience!</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur dese adipiscing helit nullam li sodales, nibh
                                        quis viverra laotreet mauris jurna sagitis arcu ut erdiete metus dolor eget lemi.
                                    </p>
                                    <figure><img src="frontend/assets2/images/guide06.png" alt="Image"></figure>
                                    <small>KATE, GER</small>
                                </div>
                                <!-- end review -->
                            </div>
                            <!-- end swiper-slide -->
                        </div>
                        <!-- end swiper-wrapper -->
                        <div class="swiper-pagination"></div>
                        <!-- end swiper-pagination -->
                    </div>
                    <!-- end swiper-reviews -->
                </div>
                <!-- end col-12-->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end reviews -->
    <section class="recent-blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Recent Blog Posts</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-12 -->
                <div class="col-lg-4">
                    <div class="blog-post">
                        <figure class="post-image"> <img src="frontend/assets2/images/blog-thumb01.jpg" alt="Image"> </figure>
                        <div class="post-content"> <small>2018-03-02 <span>|</span>BY GFXPARTNER</small>
                            <a href="blog-single.html">
                                <h3>An Enchanted Ice Cave in Midst of Denmark</h3>
                            </a>
                            <a href="blog-single.html" class="read-more">READ MORE</a>
                        </div>
                        <!-- end post-content -->
                    </div>
                    <!-- end blog-post -->
                </div>
                <!-- end col-4  -->
                <div class="col-lg-4">
                    <div class="blog-post">
                        <figure class="post-image"> <img src="frontend/assets2/images/blog-thumb02.jpg" alt="Image"> </figure>
                        <div class="post-content"> <small>2018-03-02 <span>|</span>BY GFXPARTNER</small>
                            <a href="blog-single.html">
                                <h3>Laugavegur Trek Classic (Huts) for Camping</h3>
                            </a>
                            <a href="blog-single.html" class="read-more">READ MORE</a>
                        </div>
                        <!-- end post-content -->
                    </div>
                    <!-- end blog-post -->
                </div>
                <!-- end col-4  -->
                <div class="col-lg-4">
                    <div class="blog-post">
                        <figure class="post-image"> <img src="frontend/assets2/images/blog-thumb03.jpg" alt="Image"> </figure>
                        <div class="post-content"> <small>2018-03-02 <span>|</span>BY GFXPARTNER</small>
                            <a href="blog-single.html">
                                <h3>How to Reach the Peak Without Exhausting</h3>
                            </a>
                            <a href="blog-single.html" class="read-more">READ MORE</a>
                        </div>
                        <!-- end post-content -->
                    </div>
                    <!-- end blog-post -->
                </div>
                <!-- end col-4  -->
                <div class="col-12 text-center"> <a href="#" class="site-btn">VISIT OUR BLOG</a> </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end recent-blog -->
    <section class="quote bg-image" data-background="frontend/assets2/images/jatimpark2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Petualangan Paling Dihargai<br>
                        Perusahaan Tur di Indonesia</h2>
                    <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. In erat est viverra fringilla euismod in
                        fermentum sed augue nullam consectetur ligula id elementum.</p>
                    <a href="#" class="site-btn">LEARN MORE</a>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <section class="our-team" id="team" style="padding-top: 2rem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Team Office</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-12 -->
                <div class="col-12">
                    <ul class="team-list">
                        @foreach ($teams as $team)
                            <li>
                                <div class="team-member">
                                    <figure><img src="frontend/assets2/images/team/{{ $team['image'] }}" alt="Image">
                                        <figcaption>
                                            <h6>{{ $team['name'] }}</h6>
                                            <span>{{ $team['posisi'] }}</span>
                                            {{-- <ul class="social-media">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul> --}}
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- end team-member -->
                            </li>
                        @endforeach
                        <!-- end li -->
                    </ul>
                    <!-- end team-list -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <section class="contact" id="contact">
        <div class="content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Office Locations</h2>
                            <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                        </div>
                        <!-- end section-title -->
                        <p>Pellentesque vestibulum fermentum velit non placerat aecenas in hendrerit justo quisque quis
                            rhoncus exeget semper semlam at lobortis velit. Vestibulum ante ipsum primis in faucibus orcie
                            luctus et ultrices posuere cubilia curae ed dignissim leo lorema intum mauris vestibulum et
                            maecenas vitae urna aced magna facilisis porttitor.</p>
                    </div>
                    <!-- end col-12 -->
                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="contact-box">
                            <figure><img src="frontend/assets2/images/contact-icon1.png" alt="Image"></figure>
                            <h5>MEDIA CONTACT</h5>
                            <span style="font-size: 14px"><a href="#">media@plesiranindonesia.com</a></span>
                        </div>
                    </div> --}}
                    <!-- end col-3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box">
                            <figure><img src="frontend/assets2/images/contact-icon2.png" alt="Image"></figure>
                            <h5>CONTACT</h5>
                            <span style="font-size: 14px"><a href="mailto:contact@plesiranindonesia.com">contact@plesiranindonesia.com</a></span>
                        </div>
                        <!-- end contact-box -->
                    </div>
                    <!-- end col-3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box">
                            <figure><img src="frontend/assets2/images/contact-icon3.png" alt="Image"></figure>
                            <h5>PHONE</h5>
                            <span style="font-size: 14px">+123 456 7890</span>
                        </div>
                        <!-- end contact-box -->
                    </div>
                    <!-- end col-3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box no-border">
                            <figure><img src="frontend/assets2/images/contact-icon4.png" alt="Image"></figure>
                            <h5>SOCIAL</h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- end contact-box -->
                    </div>
                    <!-- end col-3 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end content -->
    </section>
    <!-- end contact -->
@endsection

@section('js')
    <script>
        $(".datepicker__input").daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('.datepicker__input').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('.datepicker__input').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    </script>
@endsection
