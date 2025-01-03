@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Nome do Projeto</th>
                                <th class="table-danger">Não lidas</th>
                                <th class="table-success">Lidas</th>
                                <th class="table-primary">Total</th>
                                <th>Última mensagem</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if ($projeto->contatos_count != 0)
                                <tr>
                                    <td>{{ $projeto->nome_projeto }}</td>
                                    <td class="table-danger">{{ $projeto->contatos()->where('lido', false)->count() }}</td>
                                    <td class="table-success">{{ $projeto->contatos()->where('lido', true)->count() }}</td>
                                    <td class="table-primary">{{ $projeto->contatos_count }}</td>
                                    <td>
                                        @php
                                            $ultimaMensagem = $projeto->contatos()->latest('created_at')->first();
                                        @endphp
                                        {{ $ultimaMensagem->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection