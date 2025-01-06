<div class="card-footer d-flex justify-content-center">
    <ul class="pagination pagination-primary">
        {{-- Link para a página anterior --}}
        @if ($contatos->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                    <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $contatos->previousPageUrl() }}">
                    <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                </a>
            </li>
        @endif

        {{-- Links para páginas individuais --}}
        @for ($i = 1; $i <= $contatos->lastPage(); $i++)
            <li class="page-item {{ $contatos->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $contatos->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Link para a próxima página --}}
        @if ($contatos->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $contatos->nextPageUrl() }}">
                    <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                    <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                </a>
            </li>
        @endif
    </ul>
</div>