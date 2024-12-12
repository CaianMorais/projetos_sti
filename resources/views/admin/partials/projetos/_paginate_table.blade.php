{{-- Link para a página anterior --}}
@if ($projetos->onFirstPage())
    <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">
            <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
        </a>
    </li>
@else
    <li class="page-item">
        <a class="page-link" href="{{ $projetos->previousPageUrl() }}">
            <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
        </a>
    </li>
@endif

{{-- Links para páginas individuais --}}
@for ($i = 1; $i <= $projetos->lastPage(); $i++)
    <li class="page-item {{ $projetos->currentPage() == $i ? 'active' : '' }}">
        <a class="page-link" href="{{ $projetos->url($i) }}">{{ $i }}</a>
    </li>
@endfor

{{-- Link para a próxima página --}}
@if ($projetos->hasMorePages())
    <li class="page-item">
        <a class="page-link" href="{{ $projetos->nextPageUrl() }}">
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