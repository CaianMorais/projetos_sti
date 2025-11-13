<div class="col-lg-9">
    <p class="text-center mb-4">
        {{ __('contato.contato.descricao') }}
        <a href="{{ route('projetos') }}">
            {{ __('contato.contato.veja') }}</a>.
    </p>
    <div class="wow fadeIn" data-wow-delay="0.3s"
        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
        <form action="{{ route('contato.enviar') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="nome" maxlength="100" type="text" class="form-control" id="nome" placeholder="{{ __('form.placeholders.nome') }}"
                            required>
                        <label for="nome">{{ __('form.labels.nome') }} <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="email" type="email" class="form-control" id="email" placeholder="{{ __('form.placeholders.email') }}" required>
                        <label for="email">{{ __('form.labels.email') }} <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="telefone" type="tel" class="form-control" id="phone" placeholder="{{ __('form.placeholders.telefone') }}">
                        <label for="phone">{{ __('form.labels.telefone') }}</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input name="assunto" maxlength="100" type="text" class="form-control" id="subject"
                            placeholder="{{ __('form.placeholders.assunto') }}" required autocomplete="off">
                        <label for="subject">{{ __('form.labels.assunto') }} <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea name="mensagem" maxlength="1000" class="form-control"
                            placeholder="{{ __('form.placeholders.mensagem') }}" id="message" style="height: 150px" required
                            autocomplete="off"></textarea>
                        <label for="message">{{ __('form.labels.mensagem') }} <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="h-captcha" data-sitekey="17509ae2-c4ae-4eb0-93cc-e36a9ffc50c0"></div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">
                        {{ __('buttons.botaoEnviar') }}
                    </button>
                    <small>
                        {{ __('contato.contato.termo.text1') }}
                        <a href="{{ route('termo') }}">
                            {{ __('contato.contato.termo.link') }}</a>{{ __('contato.contato.termo.text2') }}
                    </small>
                </div>
            </div>
        </form>
    </div>
</div>