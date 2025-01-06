<div class="card-header" id="heading{{ $index }}" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
    aria-expanded="false" aria-controls="collapse{{ $index }}" role="button">
    <span class="collapse-title">
        <strong>{{ $projeto->nome_projeto }}</strong> ({{ count($projeto->contatos) }} mensagens)
    </span>
</div>