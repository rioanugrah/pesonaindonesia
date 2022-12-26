@if ($paginator->onFirstPage())
    <li><a><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
@else
    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-double-left"></i></a></li>
@endif

@foreach ($elements as $element)
    @if (is_string($element))
        <li class="active"><span>{{ $element }}</span></li>
    @endif
    @if (is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
            @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach
    @endif
@endforeach

@if ($paginator->hasMorePages())
    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-double-right"></i></a></li>
@else
    <li><a><i class="fa fa-angle-double-right"></i></a></li>
@endif
