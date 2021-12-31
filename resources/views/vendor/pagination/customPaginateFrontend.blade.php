@if ($paginator->hasPages())
    {{-- <ul class="pager">
       
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
    </ul> --}}
    <div class="post-navigation-wrap">
        <nav>
            <ul class="pagination">
                {{-- <li>
                    <a href="#">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </li> --}}
                @if ($paginator->onFirstPage())
                    <li><a><i class="fas fa-arrow-left"></i></a></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-arrow-left"></i></a></li>
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
                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-arrow-right"></i></a></li>
                @else
                    <li><a><i class="fas fa-arrow-right"></i></a></li>
                @endif
                {{-- <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>
                    <a href="#">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </li> --}}
            </ul>
        </nav>
    </div>
@endif
