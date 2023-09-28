<li>
    <a href="{{ route('posting') }}">
        <i class="uil-presentation-check"></i>
        <span>Posting</span>
    </a>
</li>
<li class="menu-title">Payment</li>
<li>
    <a href="{{ route('b.order') }}">
        <i class="uil-home-alt"></i>
        <span>Transactions</span>
    </a>
</li>
<li class="menu-title">Marketing Officer</li>
{{-- <li>
    <a href="{{ route('b.invoice') }}">
        <i class="uil-home-alt"></i>
        <span>Invoice</span>
    </a>
</li> --}}
<li>
    <a href="#">
        <i class="uil-home-alt"></i>
        <span>Coupon</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="uil-home-alt"></i>
        <span>Honeymoon</span>
    </a>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uil-window-section"></i>
        <span>Travel</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li>
            <a href="{{ route('tour') }}">All Travel</a>
            <a href="{{ route('tour.category') }}">Category</a>
            <a href="{{ route('tour.attribute') }}">Attribute</a>
            <a href="{{ route('tour.order') }}">All Booking</a>
        </li>
    </ul>
</li>

<li class="menu-title">Operating Officer</li>

<li>
    <a href="{{ route('cooperation') }}">
        <i class="uil-home-alt"></i>
        <span>Kerjasama</span>
    </a>
</li>

<li>
    <a href="{{ route('events') }}">
        <i class="uil-home-alt"></i>
        <span>Event</span>
    </a>
</li>

<li>
    <a href="#">
        <i class="uil-home-alt"></i>
        <span>Vendor</span>
    </a>
</li>

<li class="menu-title">IT Officer</li>
<li>
    <a href="{{ route('perusahaan') }}">
        <i class="uil-bag"></i>
        <span>Company</span>
    </a>
</li>
<li>
    <a href="{{ route('b.gallery') }}">
        <i class="uil-bag"></i>
        <span>Gallery</span>
    </a>
</li>
<li>
    <a href="{{ route('seo') }}">
        <i class="uil-boombox"></i>
        <span>SEO</span>
    </a>
</li>
<li>
    <a href="{{ route('visitor') }}">
        <i class="uil-book-reader"></i>
        <span>Visitor</span>
    </a>
</li>
<li>
    <a href="{{ route('roles.index') }}">
        <i class="uil-user-circle"></i>
        <span>Roles</span>
    </a>
</li>
<li>
    <a href="{{ route('users.index') }}">
        <i class="uil-user-circle"></i>
        <span>User</span>
    </a>
</li>