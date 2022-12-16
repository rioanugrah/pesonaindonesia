<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('frontend') }}">Beranda</a></li>
<li class="{{ Request::is('paket*') ? 'active' : '' }}"><a href="{{ route('frontend.paket') }}">Paket Wisata</a></li>
<li><a href="javascript:void()">Dokumentasi</a></li>
