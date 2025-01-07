<div class="card-header" id="heading{{ $index }}" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
    aria-expanded="false" aria-controls="collapse{{ $index }}" role="button">
    <div class="d-flex justify-content-between gap-3">

        {{-- COLOCA O NOME DO PROJETO NO ACCORDION --}}
        <span class="collapse-title flex-grow-1">
            <strong>{{ $projeto->nome_projeto }}</strong>
        </span>

        {{-- COLOCA O STATUS NUM BADGE --}}
        @if($projeto->status == 'AN')
        <span class="badge bg-warning text-dark">Em andamento</span>
        @elseif($projeto->status == 'PI')
        <span class="badge bg-primary">Pronto para investimeto</span>
        @elseif($projeto->status == 'CN')
        <span class="badge bg-success">Concluído</span>
        @endif

        {{-- COLOCA O NÚMERO DE MENSAGENS NÃO LIDAS (SE HOUVER) NUM BADGE,
         OU ENTAO AS LIDAS, SENAO SEM MENSAGENS --}}
        @if(count($projeto->contatos) > 0 && count($projeto->contatos->where('lido', 0)) > 0)
        <span class="badge bg-danger">{{ count($projeto->contatos->where('lido', 0)) }} não lidas</span>
        @elseif(count($projeto->contatos) > 0 && count($projeto->contatos->where('lido', 1)) > 0)
        <span class="badge bg-info text-dark">{{ count($projeto->contatos->where('lido', 1)) }} lidas</span>
        @else
        <span class="badge bg-secondary">Sem mensagens</span>
        @endif
    </div>
</div>