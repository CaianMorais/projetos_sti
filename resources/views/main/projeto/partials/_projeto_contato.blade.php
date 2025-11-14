<div class="container" id="contato_projeto">
    <div class="row">
        <h2 class="text-center">
            {{ __('projetos.main.projeto.contato') }}
        </h2>
        <p class="text-center">
             {{ __('projetos.main.projeto.descricaoContato.1') }} <a href="{{ route('projetos') }}"> {{ __('projetos.main.projeto.descricaoContato.aqui') }}</a>.<br> {{ __('projetos.main.projeto.descricaoContato.2') }} <a
                href="{{ route('contato') }}">{{ __('projetos.main.projeto.descricaoContato.aqui') }}</a>.
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
                    <label for="nome">
                        {{ __('form.labels.nome') }}
                        <span class="text-danger">*</span>
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" required>
                    <label for="email">
                        {{ __('form.labels.email') }}
                        <span class="text-danger">*</span>
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input name="telefone" type="tel" class="form-control" id="phone" placeholder="Seu telefone">
                    <label for="phone">
                        {{ __('form.labels.telefone') }}
                    </label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea name="mensagem" maxlength="1000" class="form-control" placeholder="Leave a message here"
                        id="message" style="height: 150px" required autocomplete="off"></textarea>
                    <label for="message">
                        {{ __('form.labels.mensagem') }}
                        <span class="text-danger">*</span>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="autorizacao" type="checkbox" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ __('form.labels.autorizacao') }}
                    </label>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="h-captcha" data-sitekey="17509ae2-c4ae-4eb0-93cc-e36a9ffc50c0"></div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">{{ __('buttons.botaoEnviar') }}</button>
                <small>
                    {{ __('contato.contato.termo.text1') }}
                    <a href="{{ route('termo') }}">
                        {{ __('contato.contato.termo.link') }}</a>{{ __('contato.contato.termo.text2') }}
                </small>
            </div>
        </div>
    </form>
</div>