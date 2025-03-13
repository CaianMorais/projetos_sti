<div class="container">
    <div class="row">
        <h2 class="text-center">
            Entre em contato
        </h2>
        <p class="text-center">
            Esse formulário é para entrar em contato com a equipe de desenvolvimento sobre investimentos, objetivos e
            resultados ou dúvidas sobre este projeto. Caso queira falar de outro use o formulário do projeto que deseja
            clicando <a href="{{ route('projetos') }}"> aqui</a>.<br> Caso queira tratar outro assunto, clique <a
                href="{{ route('contato') }}">aqui</a>
        </p>
    </div>
    <form action="{{ route('projetos.enviar_contato') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <input type="hidden" name="projeto_id" value="{{ $projeto->id }}">
            <input type="hidden" name="hash" value="{{ $hash }}">
            <div class="col-md-4">
                <div class="form-floating">
                    <input name="nome" maxlength="100" type="text" class="form-control" id="nome" placeholder="Nome"
                        required>
                    <label for="nome">Nome<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" required>
                    <label for="email">E-mail<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input name="telefone" type="tel" class="form-control" id="phone" placeholder="Seu telefone">
                    <label for="phone">Telefone</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea name="mensagem" maxlength="1000" class="form-control" placeholder="Leave a message here"
                        id="message" style="height: 150px" required autocomplete="off"></textarea>
                    <label for="message">Mensagem<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="autorizacao" type="checkbox" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Eu autorizo o SENAI-RO a enviar mensagens automáticas sobre novos projetos.
                    </label>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="h-captcha" data-sitekey="17509ae2-c4ae-4eb0-93cc-e36a9ffc50c0"></div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Enviar mensagem</button>
                <small>Ao enviar a mensagem você automaticamente estará concordando com o <a href="{{ route('termo') }}">Termo de
                        Consentimento</a> da plataforma.</small>
            </div>
        </div>
    </form>
</div>