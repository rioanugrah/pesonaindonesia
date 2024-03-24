{{-- <li class="dropdown submenu">
    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('frontend') }}">Beranda</a></li>
    <li class="submenu dropdown">
        <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paket Wisata <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <ul class="dropdown-menu">
            <li class="{{ Request::is('bromo*') ? 'active' : '' }}"><a href="{{ route('frontend.bromo') }}">Bromo</a></li>
            <li><a href="#">Tour</a></li>
        </ul>
    </li>
    <li class="{{ Request::is('blog*') ? 'active' : '' }}"><a href="{{ route('frontend.blog') }}">Referensi</a></li>
    <li class="{{ Request::is('event*') ? 'active' : '' }}"><a href="{{ route('frontend.event') }}">Event</a></li>
    <li class="{{ Request::is('tracking_order*') ? 'active' : '' }}"><a href="{{ route('frontend.tracking') }}">Tracking Tiket</a></li>
</li> --}}
{{-- <li class="{{ Request::is('travelling*') ? 'active' : '' }}"><a href="{{ route('frontend.travelling') }}">Travelling</a></li> --}}
{{-- <li class="{{ Request::is('gallery*') ? 'active' : '' }}"><a href="{{ route('frontend.gallery') }}">Gallery</a></li> --}}
{{-- <li class="{{ Request::is('tracking*') ? 'active' : '' }}"><a href="#">Cek Order</a></li> --}}
{{-- <li class="{{ Request::is('paket*') ? 'active' : '' }}"><a href="{{ route('frontend.paket') }}">Paket Wisata</a></li> --}}
{{-- <li><a href="javascript:void()">Dokumentasi</a></li> --}}

<li class="dropdown submenu">
    <a href="{{ route('frontend') }}">Beranda</a>
    {{-- <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <i class="icon-arrow-down" aria-hidden="true"></i></a>
    <ul class="dropdown-menu">
        <li><a href="index.html">Homepage Default</a></li>
        <li><a href="index-1.html">Homepage 1</a></li>
        <li><a href="index-2.html">Homepage 2</a></li>
        <li><a href="index-3.html">Homepage 3</a></li>
        <li><a href="index-4.html">Homepage 4</a></li>
        <li><a href="index-5.html">Homepage 5</a></li>
        <li class="submenu dropdown">
            <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Flights <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <ul class="dropdown-menu">
                <li><a href="index-flight.html">Flight Homepage</a></li>
                <li><a href="flight-grid.html">Flight Grid</a></li>
                <li><a href="flight-list.html">Flight List</a></li>
                <li><a href="flight-detail.html">Flight Detail</a></li>
            </ul>
        </li>
        <li class="submenu dropdown">
            <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cars <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <ul class="dropdown-menu">
                <li><a href="index-car.html">Car Homepage</a></li>
                <li><a href="car-grid.html">Car Grid</a></li>
                <li><a href="car-list.html">Car List</a></li>
                <li><a href="car-detail.html">Car Detail</a></li>
            </ul>
        </li>
        <li class="submenu dropdown">
            <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cruise <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <ul class="dropdown-menu">
                <li><a href="index-cruise.html">Cruise Homepage</a></li>
                <li><a href="cruise-grid.html">Cruise Grid</a></li>
                <li><a href="cruise-list.html">Cruise List</a></li>
                <li><a href="cruise-detail.html">Cruise Detail</a></li>
            </ul>
        </li>
    </ul> --}}
</li>
<li class="dropdown submenu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paket Wisata <i class="icon-arrow-down" aria-hidden="true"></i></a>
    <ul class="dropdown-menu">
        <li><a href="{{ route('frontend.bromo') }}">Bromo</a></li>
        <li><a href="{{ route('frontend.tour') }}">Tour Wisata</a></li>
    </ul>
</li>
<li class="{{ Request::is('blog*') ? 'active' : '' }}"><a href="{{ route('frontend.blog') }}">Referensi</a></li>
    <li class="{{ Request::is('event*') ? 'active' : '' }}"><a href="{{ route('frontend.event') }}">Event</a></li>
    <li class="{{ Request::is('tracking_order*') ? 'active' : '' }}"><a href="{{ route('frontend.tracking') }}">Tracking Tiket</a></li>
