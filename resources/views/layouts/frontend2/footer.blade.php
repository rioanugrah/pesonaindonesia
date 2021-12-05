<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <h5>
                    <img src="{{ url('frontend/assets2/images/logo-light.png') }}" alt="Image">
                </h5>
                <address>
                    Jl. Raya Tlogowaru No. 3, Tlogowaru
                        Kec. Kedungkandang, Kota Malang
                        Jawa Timur<br>
                    Phone: 123 456 7890<br>
                    <a href="mailto:contact@pesonaindonesia.com">contact@pesonaindonesia.com</a>
                </address>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>PERUSAHAAN</h5>
                <ul class="footer-menu">
                    <li><a href="{{ route('tentang_kami') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('tim_kami') }}">Tim Kami</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>INFORMASI</h5>
            </div>
            <div class="col-lg-3 col-md-4">
                <ul class="social-media">
                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
            <!-- end col-12 -->
            <div class="col-12"> <span class="copyright">&copy; {{ date('Y') }} PESONA PLESIRAN INDONESIA</span> </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</footer>
