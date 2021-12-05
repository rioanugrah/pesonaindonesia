@extends('layouts.frontend2.app')

@section('title')
    Kontak Kami
@endsection

@section('content')
    <section class="contact" id="contact">
        <div class="content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="section-title">
                            <h3 style="font-size: 3em">Kontak Kami</h3>
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
                            <span style="font-size: 14px"><a
                                    href="mailto:contact@plesiranindonesia.com">contact@plesiranindonesia.com</a></span>
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
@endsection
