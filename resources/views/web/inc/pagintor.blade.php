<!-- pagination -->
@if ($paginator->hasPages())
<div class="col-md-12">
    <div class="post-pagination">
        @if ($paginator->onFirstPage())
        <a href="" class="btn disabled  pagination-back pull-left">السابق</a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="pagination-back pull-left">السابق</a>
    @endif


        <ul class="pages">
        @foreach ($elements as $element)

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li id="paginate_link" class="active">{{ $page }}</li>

                @else
                <li id="paginate_link"><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
</ul>




        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next pull-right">التالي</a>
    @else
    <a href="" class=" btn disabled pagination-next pull-right">التالي</a>
    @endif
        

    </div>
</div>
@endif
<!-- pagination -->
