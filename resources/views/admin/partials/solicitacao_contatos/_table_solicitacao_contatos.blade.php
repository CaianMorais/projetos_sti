<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>DATA</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>ASSUNTO</th>
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitacoes as $solicitacao)
                @if ($solicitacao->lido == true)
                    <tr class="table-success">
                @elseif ($solicitacao->lido == false)
                    <tr class="table-danger">
                @else
                    <tr>
                @endif
                        <td>{{ date_format($solicitacao->created_at, 'd/m/Y H:i')}}</td>

                        <td>{{ $solicitacao->nome }}</td>

                        <td>{{ $solicitacao->email }}</td>
                        
                        <td>{{ Str::limit($solicitacao->assunto, 40) }}</td>

                        <td class="d-flex align-items-center">
                            <a href="{{ route('admin.ver_solicitacao_contato', $solicitacao->id) }}" title="Ler mensagem">
                            <i class="bi bi-book"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>