<div class="menu-item">
    <div class="menu-content pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
    </div>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('home*') ? 'active' : '' }}" href="{{ route('home') }}">
        <span class="menu-icon">
            <span class="svg-icon svg-icon-2">
                {{-- <img src="{{ asset('backend/assets3/media/icons/duotune/technology/teh001.svg') }}" alt="" srcset=""> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                </svg>
            </span>
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Request::is('hotel*') ? 'active' : '' }}" href="{{ route('hotel') }}">
        <span class="menu-icon">
            <span class="svg-icon svg-icon-2">
                {{-- <img src="{{ asset('backend/assets3/media/icons/duotune/technology/teh001.svg') }}" alt="" srcset=""> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                </svg>
            </span>
        </span>
        <span class="menu-title">Hotel</span>
    </a>
</div>