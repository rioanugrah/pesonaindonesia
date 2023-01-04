<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('frontend') }}"><i class="fas fa-home"></i> Beranda</a></li>
<li class="{{ Request::is('travelling*') ? 'active' : '' }}"><a href="{{ route('frontend.travelling') }}"><i class="fas fa-car"></i> Travelling</a></li>
{{-- <li class="{{ Request::is('paket*') ? 'active' : '' }}"><a href="{{ route('frontend.paket') }}">Paket Wisata</a></li> --}}
<li><a href="javascript:void()"><i class="fas fa-camera"></i> Dokumentasi</a></li>
