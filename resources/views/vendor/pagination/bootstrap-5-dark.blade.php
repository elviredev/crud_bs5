@if ($paginator->hasPages())
  <nav>
    <ul class="pagination justify-content-center">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
          <span class="page-link bg-dark text-white border-secondary">«</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link bg-dark text-white border-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="page-item disabled" aria-disabled="true"><span class="page-link bg-dark text-white border-secondary">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="page-item active" aria-current="page"><span class="page-link bg-primary border-primary">{{ $page }}</span></li>
            @else
              <li class="page-item"><a class="page-link bg-dark text-white border-secondary" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="page-item">
          <a class="page-link bg-dark text-white border-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next">»</a>
        </li>
      @else
        <li class="page-item disabled" aria-disabled="true">
          <span class="page-link bg-dark text-white border-secondary">»</span>
        </li>
      @endif
    </ul>
  </nav>
@endif

