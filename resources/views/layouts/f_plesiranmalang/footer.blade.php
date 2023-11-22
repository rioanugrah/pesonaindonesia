<footer class="rlr-footer rlr-section rlr-section__mt">
    <div class="container">
        <div class="rlr-footer__getintouch">
            <div class="rlr-footer__getintouch_col rlr-footer__getintouch__col--title">
                <h4>Ikuti perjalanan</h4>
                <p style="font-size: 14pt">Liburan, waktunya bersenang-senang, melepas penat, dan menikmati keindahan alam.</p>
            </div>
            <div class="rlr-footer__getintouch_col rlr-footer__getintouch__col--address">
                <h4>Our Offices</h4>
                <a href="{{ route('plesiranmalang.contact') }}">Kota Malang, Jawa Timur, Indonesia</a>
            </div>
        </div>
        <!-- Footer menu -->
        <div class="rlr-footer__menu">
            {{-- <nav class="rlr-footer__menu__col">
                <h4>Services</h4>
                <ul>
                    <li><a href="#">Budget Tours</a></li>
                    <li><a href="#">Expert Insight</a></li>
                    <li><a href="#">Independent</a></li>
                    <li><a href="#">Luxury Tours</a></li>
                    <li><a href="#">Safety Tips</a></li>
                    <li><a href="#">Tips n Tricks</a></li>
                </ul>
            </nav> --}}
            <!-- Subscribe -->
            {{-- <nav class="rlr-footer__menu__col rlr-footer__menu__col--lg">
                <h4>Get In Touch</h4>
                <a href="#" class="rlr-footer__menu__col__letstalk">Let’s Talk</a>
                <form class="rlr-subscribe" data-aos="fade-up" data-aos-offset="250"
                    data-aos-duration="700">
                    <input type="email" class="rlr-subscribe__input" placeholder="Enter your email" />
                    <button class="btn">Send Now!</button>
                </form>
            </nav> --}}
        </div>
        <!-- Footer bottom -->
        <div class="rlr-footer__legal">
            <div class="rlr-footer__legal__row rlr-footer__legal__row--top">
                <div class="rlr-footer__legal__row__col">
                    <a href="#">Privacy Policy</a>
                </div>
                <!-- Footer social links -->
                <div class="rlr-footer__legal__row__col">
                    <a href="https://www.instagram.com/plesiranmalang.id/">Instagram</a>
                </div>
            </div>
            <!-- Footer copyright -->
            <div class="rlr-footer__legal__row rlr-footer__legal__row--bottom">
                <div class="rlr-footer__legal__row__col">
                    <span>2023 © Plesiran Malang - Corporate By <a href="{{ route('frontend') }}">Pesona Plesiran Indonesia</a></span>
                </div>
                <!-- Footer payment thumbs -->
                <div class="rlr-footer__legal__row__col">
                    <img src="{{ $assets }}/assets/bca.webp" width="70" style="margin-right: 0%">
                    <img src="{{ $assets }}/assets/bni.webp" width="70" style="margin-right: 0%">
                    <img src="{{ $assets }}/assets/bri.webp" width="70" style="margin-right: 0%">
                    <img src="{{ $assets }}/assets/mandiri.webp" width="70" style="margin-right: 0%">
                </div>
            </div>
        </div>
    </div>
</footer>