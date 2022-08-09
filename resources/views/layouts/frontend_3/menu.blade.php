<nav id="navigation" class="navigation">
    <ul>
        <li>
            <a href="{{ route('frontend.partnership') }}">Home</a>
        </li>
        @guest
        {{-- <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Daftar</a></li> --}}
        @else
        {{-- <li>
            <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i></a>
        </li> --}}
        <li class="menu-item-has-children">
            <a>{{ auth()->user()->name }}</a>
            <ul>
                <li>
                    <a href="#">Wishlist</a>
                </li>
            </ul>
        </li>
        @endguest
        {{-- <li class="menu-item-has-children">
            <a href="#">Tour</a>
            <ul>
                <li>
                    <a href="destination.html">Destination</a>
                </li>
                <li>
                    <a href="tour-packages.html">Tour Packages</a>
                </li>
                <li>
                    <a href="package-offer.html">Package Offer</a>
                </li>
                <li>
                    <a href="package-detail.html">Package Detail</a>
                </li>
                <li>
                    <a href="tour-cart.html">Tour Cart</a>
                </li>
                <li>
                    <a href="booking.html">Package Booking</a>
                </li>
                <li>
                    <a href="confirmation.html">Confirmation</a>
                </li>
            </ul>
        </li>
        <li class="menu-item-has-children">
            <a href="#">Pages</a>
            <ul>
                <li>
                    <a href="about.html">About</a>
                </li>
                <li>
                    <a href="service.html">Service</a>
                </li>
                <li>
                    <a href="career.html">Career</a>
                </li>
                <li>
                    <a href="career-detail.html">Career Detail</a>
                </li>
                <li>
                    <a href="tour-guide.html">Tour Guide</a>
                </li>
                <li>
                    <a href="gallery.html">Gallery</a>
                </li>
                <li>
                    <a href="single-page.html">Single Page</a>
                </li>
                <li>
                    <a href="faq.html">FAQ Page</a>
                </li>
                <li>
                    <a href="testimonial-page.html">Testimonial Page</a>
                </li>
                <li>
                    <a href="search-page.html">Search Page</a>
                </li>
                <li>
                    <a href="404.html">404 Page</a>
                </li>
                <li>
                    <a href="comming-soon.html">Comming Soon</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
                <li>
                    <a href="wishlist-page.html">Wishlist</a>
                </li>
            </ul>
        </li>
        <li class="menu-item-has-children">
            <a href="single-page.html">Shop</a>
            <ul>
                <li>
                    <a href="product-right.html">Shop Archive</a>
                </li>
                <li>
                    <a href="product-detail.html">Shop Single</a>
                </li>
                <li>
                    <a href="product-cart.html">Shop Cart</a>
                </li>
                <li>
                    <a href="product-checkout.html">Shop Checkout</a>
                </li>
            </ul>
        </li>
        <li class="menu-item-has-children">
            <a href="#">Blog</a>
            <ul>
                <li><a href="blog-archive.html">Blog List</a></li>
                <li><a href="blog-archive-left.html">Blog Left Sidebar</a></li>
                <li><a href="blog-archive-both.html">Blog Both Sidebar</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children">
            <a href="#">Dashboard</a>
            <ul>
                <li>
                    <a href="admin/dashboard.html">Dashboard</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">User</a>
                    <ul>
                        <li>
                            <a href="admin/user.html">User List</a>
                        </li>
                        <li>
                            <a href="admin/user-edit.html">User Edit</a>
                        </li>
                        <li>
                            <a href="admin/new-user.html">New User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin/db-booking.html">Booking</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="admin/db-package.html">Package</a>
                    <ul>
                        <li>
                            <a href="admin/db-package-active.html">Package Active</a>
                        </li>
                        <li>
                            <a href="admin/db-package-pending.html">Package Pending</a>
                        </li>
                        <li>
                            <a href="admin/db-package-expired.html">Package Expired</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin/db-comment.html">Comments</a>
                </li>
                <li>
                    <a href="admin/db-wishlist.html">Wishlist</a>
                </li>
                <li>
                    <a href="admin/login.html">Login</a>
                </li>
                <li>
                    <a href="admin/forgot.html">Forget Password</a>
                </li>
            </ul>
        </li> --}}
    </ul>
</nav>