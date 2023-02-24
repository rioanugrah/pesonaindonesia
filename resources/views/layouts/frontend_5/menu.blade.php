<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('frontend') }}">Beranda</a></li>
<li class="{{ Request::is('travelling*') ? 'active' : '' }}"><a href="{{ route('frontend.travelling') }}">Travelling</a></li>
<li class="{{ Request::is('blog*') ? 'active' : '' }}"><a href="{{ route('frontend.blog') }}">Referensi</a></li>
<li class="{{ Request::is('event*') ? 'active' : '' }}"><a href="{{ route('frontend.event') }}">Event</a></li>
{{-- <li class="{{ Request::is('paket*') ? 'active' : '' }}"><a href="{{ route('frontend.paket') }}">Paket Wisata</a></li> --}}
<li><a href="javascript:void()">Dokumentasi</a></li>
