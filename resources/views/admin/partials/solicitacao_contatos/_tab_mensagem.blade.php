<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    @if (!isset($mensagem->projeto))
    <h5>Assunto da mensagem:</h5>
    <p>{{ $mensagem->assunto }}</p>
    @else
    <h5>Projeto vinculado:</h5>
    <p>{{ $mensagem->projeto->nome_projeto }}</p>
    @endif

    <h5>Mensagem enviada pelo contato: </h5>
    <p>{{ $mensagem->mensagem }}</p>

    @if(isset($mensagem->projeto))
    <a href="mailto:{{ $mensagem->email }}?subject=RESPOSTA: {{ $mensagem->projeto->nome_projeto }}&body= Olá, {{ $mensagem->nome }}. Obrigado por ter demonstrado interesse no projeto e nos contatar." class="btn btn-primary">Responder no e-mail</a>
    @endif
</div>