@extends('layout')

@section('content')

<!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Projeto #{{ $projeto->id }}</div>
                    <h1 class="display-4 text-white mb-4 animated slideInRight">{{ $projeto->nome_projeto }}</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $projeto->descricao }}</p>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="{{ asset('img/projects.png') }}" alt="Banner tela inicial">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
     <div class="container-fluid py-5">
        <div class="container col-md-12 card border-0 shadow p-4">
            <div class="row">
                <h2 class="text-center">
                    Detalhes do projeto
                </h2>
            </div>
            <div class="row p-4">
                {!! $projeto->detalhes !!}
            </div>
        </div>
     </div>

    <div class="container-fluid py-5">
        <div class="container col-md-7">
            <h2 class="d-flex justify-content-between align-items-center">
                <a type="button" data-bs-target="#carouselExample" data-bs-slide="prev"><i class="fa-solid fa-chevron-left"></i></a>
                Imagens do projeto 
                <a type="button" data-bs-target="#carouselExample" data-bs-slide="next"><i class="fa-solid fa-chevron-right"></i></a></h2>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if($projeto->fotos->skip(1)->isNotEmpty())
                        @foreach($projeto->fotos->skip(1)->values() as $index => $foto)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img style="min-height: 500px; max-height: 500px;" 
                                    src="{{ asset('storage/' . $foto->path) }}" 
                                    class="d-block w-100" alt="Imagem do projeto">
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img style="min-height: 500px; max-height: 500px;" 
                                src="{{ asset('img/default_carousel.jpg') }}" 
                                class="d-block w-100" alt="Imagem padrão">
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="col-md-5 card border-0 shadow py-5">
                        <h2 class="text-center mb-4">Informações do projeto</h2>
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-people-group"></i>&nbsp; 
                            <h5 class="m-0">Autor: {{ $projeto->autor_projeto }}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-magnifying-glass"></i>&nbsp; 
                            <h5 class="m-0">Status: 
                                @if ($projeto->status == 'AN')
                                    Em andamento/desenvolvimento
                                @elseif ($projeto->status == 'PI')
                                    Pronto para investimento
                                @elseif ($projeto->status == 'CN')
                                    Concluído
                                @endif
                            </h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-calendar"></i>&nbsp; 
                            <h5 class="m-0">Data de postagem: {{ date_format($projeto->created_at, 'd/m/Y')}}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-calendar"></i>&nbsp; 
                            <h5 class="m-0">Última modificação: {{ date_format($projeto->updated_at, 'd/m/Y')}}</h5>
                        </div>
                    </div>

                    <div class="col-md-5 card border-0 shadow py-5">
                        <h2 class="text-center mb-4">Valores para investimento</h2>
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-money-bill-trend-up"></i>&nbsp; 
                            <h5 class="m-0">Valor mínimo: {{ 'R$ ' . number_format($projeto->valor_minimo, 2, ',', '.') }}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-money-bill-trend-up"></i>&nbsp; 
                            <h5 class="m-0">Valor máximo: {{ 'R$ ' . number_format($projeto->valor_maximo, 2, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center">
                    Entre em contato
                </h2>
                <p class="text-center">
                    Esse formulário é para entrar em contato com a equipe de desenvolvimento sobre investimentos, objetivos e resultados ou dúvidas sobre este projeto. Caso queira falar de outro use o formulário do projeto que deseja clicando <a href="{{ route('projetos') }}"> aqui</a>.<br> Caso queira tratar outro assunto, clique <a href="{{ route('contato') }}">aqui</a>
                </p>
            </div>
            <form>
                <div class="row g-3">
                    <input type="hidden" name="projeto_id" value="{{ $projeto->id }}">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input name="nome" maxlength="100" type="text" class="form-control" id="nome" placeholder="Nome" required>
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
                            <textarea name="mensagem" maxlength="1000" class="form-control" placeholder="Leave a message here" id="message" style="height: 150px" required autocomplete="off"></textarea>
                            <label for="message">Mensagem<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                        <input class="form-check-input" name="autorizacao" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Eu autorizo o SENAI-RO a armazenar meus dados para receber mensagens sobre novos projetos. <a href="#">Saiba mais</a>
                        </label>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="h-captcha" data-sitekey="17509ae2-c4ae-4eb0-93cc-e36a9ffc50c0"></div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Enviar mensagem</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>

@endsection