<div class="col-lg-9">
    <p class="text-center mb-4">Esse página de contato é destinada para dúvidas gerais. Para entrar em contato sobre um
        projeto específico, basta acessar o projeto pelo nosso site e preencher o formulário de contato navegando pra
        baixo.
        <a href="https://htmlcodex.com/contact-form">Veja os projetos</a>.
    </p>
    <div class="wow fadeIn" data-wow-delay="0.3s"
        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
        <form action="{{ route('contato.enviar') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="nome" maxlength="100" type="text" class="form-control" id="nome" placeholder="Nome"
                            required>
                        <label for="nome">Nome <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" required>
                        <label for="email">E-mail <span class="text-danger">*</span></label>
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
                        <input name="assunto" maxlength="100" type="text" class="form-control" id="subject"
                            placeholder="Subject" required autocomplete="off">
                        <label for="subject">Assunto <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea name="mensagem" maxlength="1000" class="form-control"
                            placeholder="Leave a message here" id="message" style="height: 150px" required
                            autocomplete="off"></textarea>
                        <label for="message">Mensagem <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="h-captcha" data-sitekey="17509ae2-c4ae-4eb0-93cc-e36a9ffc50c0"></div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Enviar mensagem</button>
                    <small>Ao enviar a mensagem você automaticamente estará concordando com o <a href="#">Termo de
                            Consentimento</a> da plataforma.</small>
                </div>
            </div>
        </form>
    </div>
</div>