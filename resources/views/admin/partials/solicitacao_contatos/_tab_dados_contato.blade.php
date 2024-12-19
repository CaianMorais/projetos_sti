<div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <h5>Nome: </h5><p>{{ $mensagem->nome }}</p>
    <h5>Telefone: </h5>
    <p>
        @if ($mensagem->telefone)
            {{ $mensagem->telefone }}
        @else
            Não informado
        @endif
    </p>
    <h5>E-mail: </h5><p>{{ $mensagem->email }}</p>
    <h5>Enviado em: </h5><p>{{ date_format($mensagem->created_at, 'd/m/Y H:i') }}</p>
</div>