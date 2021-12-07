@extends('layouts.frontend2.app')

@section('title')
    Pesona Plesiran Indonesia
@endsection

@section('slider')
<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach ($wallpaper as $wp)
            <div class="swiper-slide">
                <div class="slide-inner bg-image"
                    data-background="frontend/assets2/images/wallpaper/{{ $wp['image'] }}">
                    <div class="container">
                        <h2 data-swiper-parallax="-300">{{ $wp['nama_slider'] }}</h2>
                        {{-- <a href="#" class="link" data-swiper-parallax="-100"><img src="{{ $wp['arrow'] }}" alt="Image">LEARN MORE</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end swiper-wrapper -->
        <div class="swiper-custom-pagination"></div>
        <!-- end swiper-custom-pagination -->
    </div>
</div>
@endsection

@section('content')
    <section class="adventure-activities">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Wisata</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                </div>

                <div class="col-lg-6">
                    <p class="section-desc">Orci varius natoque penatibus et magnis dis turient montes nascetur ridiculus
                        mus. Cras eleifend tellus sed congue consectetur, velit turpis faucibus odio eget volutpat odio
                        lectus eu erat.</p>
                </div>
            </div>
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
                        <div class="swiper-button-prev">
                            <div class="arrow-left"></div>
                        </div>
                        <div class="swiper-button-next">
                            <div class="arrow-right"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  text-center"> <a href="#" class="site-btn">LOAD MORE</a> </div>
        </div>

    </section>
    <section class="reviews">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Customer Reviews</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                </div>
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
                            </div>
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
                            </div>
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
                            </div>
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
                            </div>
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
                            </div>
                            <div class="swiper-slide">
                                <div class="review"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <h4>A truly amazing experience!</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur dese adipiscing helit nullam li sodales, nibh
                                        quis viverra laotreet mauris jurna sagitis arcu ut erdiete metus dolor eget lemi.
                                    </p>
                                    <figure><img src="frontend/assets2/images/guide06.png" alt="Image"></figure>
                                    <small>KATE, GER</small>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recent-blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Recent Blog Posts</h2>
                        <img src="frontend/assets2/images/title-seperator.png" alt="Image">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-post">
                        <figure class="post-image"> <img src="frontend/assets2/images/blog-thumb01.jpg" alt="Image">
                        </figure>
                        <div class="post-content"> <small>2018-03-02 <span>|</span>BY GFXPARTNER</small>
                            <a href="blog-single.html">
                                <h3>An Enchanted Ice Cave in Midst of Denmark</h3>
                            </a>
                            <a href="blog-single.html" class="read-more">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-post">
                        <figure class="post-image"> <img src="frontend/assets2/images/blog-thumb02.jpg" alt="Image">
                        </figure>
                        <div class="post-content"> <small>2018-03-02 <span>|</span>BY GFXPARTNER</small>
                            <a href="blog-single.html">
                                <h3>Laugavegur Trek Classic (Huts) for Camping</h3>
                            </a>
                            <a href="blog-single.html" class="read-more">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-post">
                        <figure class="post-image"> <img src="frontend/assets2/images/blog-thumb03.jpg" alt="Image">
                        </figure>
                        <div class="post-content"> <small>2018-03-02 <span>|</span>BY GFXPARTNER</small>
                            <a href="blog-single.html">
                                <h3>How to Reach the Peak Without Exhausting</h3>
                            </a>
                            <a href="blog-single.html" class="read-more">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center"> <a href="#" class="site-btn">VISIT OUR BLOG</a> </div>
            </div>
        </div>
    </section>
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
            </div>
        </div>
    </section>
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
