<ul class="clearlist">
    <li class="active"><a href="{{ url('/') }}">Home</a></li>
    <li class="slash">/</li>
    <li><a href="{{ route('frontend.hotel') }}">Hotel</a></li>
    <li class="search"><a href="#" class="mn-has-sub">{{ auth()->user()->name }}</a>
        <ul class="mn-sub">
            <li><a href="{{ route('frontend.wistlist') }}">Wishlist</a></li>
        </ul>
    </li>
</ul>
