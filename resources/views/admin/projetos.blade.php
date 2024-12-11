@extends('layouts.admin')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header text-end">
                <a href="{{ route('admin.criar') }}" class="btn btn-primary">Postar novo projeto</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>PROJETO</th>
                                    <th>STATUS</th>
                                    <th>VALORES (min - máx)</th>
                                    <th>AUTOR</th>
                                    <th>CRIADO EM</th>
                                    <th>AÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projetos as $projeto)
                                <tr>
                                    <td class="text-bold-500">{{ $projeto->nome_projeto }}</td>

                                    @if ($projeto->status == 'PI')
                                    <td>{{ $projeto->status }} - Pronto para Investimento</td>
                                    @elseif ($projeto->status == 'AN')
                                    <td>{{ $projeto->status }} - Em andamento</td>
                                    @elseif ($projeto->status == 'CN')
                                    <td>{{ $projeto->status }} - Concluído</td>
                                    @endif

                                    <td class="text-bold-500">R${{ number_format($projeto->valor_minimo,2, ',','.') }} - R${{ number_format($projeto->valor_maximo,2, ',','.') }}</td>
                                    
                                    <td>{{ $projeto->autor_projeto }}</td>

                                    <td>{{ $projeto->created_at }}</td>

                                    <td class="d-flex justify-content-around align-items-center">
                                        <a href="{{ route('admin.projetos.editar', $projeto->id) }}" title="Editar">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="#" title="Excluir">
                                            <i class="text-danger bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <ul class="pagination pagination-primary">
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
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection