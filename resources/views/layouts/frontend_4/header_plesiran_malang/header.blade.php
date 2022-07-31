<div class="nav-logo-wrap local-scroll"><a href="{{ route('plmlg') }}" class="logo"><img
    src="{{ $asset . '/img/logo_plesiran_malang.png' }}"
    data-at2x="{{ $asset . '/img/logo_plesiran_malang.png' }}" width="210" alt></a></div>
<div class="inner-nav desktop-nav">
<ul class="clearlist">
<li><a href="{{ url('/') }}" class="mn-has-sub active">Home</a>
</li>
<li class="slash">/</li>
<li><a href="{{ route('plmlg.hotel') }}" class="mn-has-sub">Hotel</a>
</li>
<li class="slash">/</li>
@guest
    <li><a href="{{ route('login') }}" class="mn-has-sub">Login</a></li>
    <li><a href="{{ route('register') }}" class="mn-has-sub">Register</a></li>
@else
    <li><a href="#" class="mn-has-sub">{{ auth()->user()->name }}</a>
        <ul class="mn-sub">
            <li>
                <a href="{{ route('frontend.wistlist') }}">Wistlish</a>
            </li>
            <li>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                    Out</a>
            </li>
        </ul>
    </li>
@endguest
</ul>
</div>