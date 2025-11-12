@extends('layout')

@section('title', 'Início - Projetos STI')

@section('content')

<style>
    .icon-link-hover:hover i {
        animation: bounce 0.6s ease-in-out;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
</style>

    {{-- INICIO --}}
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">
                        {{ __('home.inicio.pill') }}
                    </div>
                    <h1 class="display-5 text-white mb-4 animated slideInRight">
                        {{ __('home.inicio.titulo') }}
                    </h1>
                    <p class="text-white mb-4 animated slideInRight">
                        {{ __('home.inicio.subtitulo') }}
                    </p>
                    <a target="_blank" href="https://www.in.gov.br/en/web/dou/-/resolucao-capda-n-49-de-1-de-fevereiro-de-2024-544273654" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">
                        {{ __('buttons.botaoSaibaMais') }}
                    </a>
                    <a href="{{ route('projetos') }}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">
                        {{ __('buttons.botaoVerProjetos') }}
                    </a>
                </div>
                <div class="col-lg-6 align-self-end text-lg-end">
                    <img class="img-fluid" src="{{ asset('img/welcome_banner.png') }}" alt="Banner tela inicial">
                </div>
            </div>
        </div>
    </div>
    
    {{-- VANTAGENS --}}
    <div class="container-fluid bg-light text-center py-5">
        <a href="#vantagens" class="icon-link icon-link-hover">
            <i class="fa-solid fa-angles-down fa-2xl"></i>
        </a>
    </div>

    <div class="container-fluid bg-light py-5" id="vantagens">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">
                        {{ __('home.vantagens.pill') }}
                    </div>
                    <h1 class="mb-4">
                        {{ __('home.vantagens.titulo') }}
                    </h1>
                    <p class="mb-4">
                        {{ __('home.vantagens.subtitulo') }}
                    </p>
                    <a class="btn btn-primary rounded-pill px-4" href="https://www.gov.br/suframa/pt-br/zfm/pdi/capda">
                        {{ __('buttons.botaoSaibaMais') }}
                        </a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                        <i class="fa-solid fa-microchip fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">
                                            {{ __('home.vantagens.card1.title') }}
                                        </h5>
                                        <p>
                                            {{ __('home.vantagens.card1.description') }}
                                        </p>
                                        <a class="btn px-3 mt-auto mx-auto" href="https://www.ddlconsultores.com.br/post/por-que-credenciar-icts-no-capda">
                                            {{ __('buttons.botaoSaibaMais') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                        <i class="fa-brands fa-pagelines fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">
                                            {{ __('home.vantagens.card2.title') }}
                                        </h5>
                                        <p>
                                            {{ __('home.vantagens.card2.description') }}
                                        </p>
                                        <a class="btn px-3 mt-auto mx-auto" href="https://www.gov.br/suframa/pt-br/zfm/pdi/capda">
                                            {{ __('buttons.botaoSaibaMais') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-md-4">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                            <i class="fa-solid fa-arrow-trend-down fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">
                                            {{ __('home.vantagens.card3.title') }}
                                        </h5>
                                        <p>
                                            {{ __('home.vantagens.card3.description') }}
                                        </p>
                                        <a class="btn px-3 mt-auto mx-auto" href="https://www.gov.br/suframa/pt-br/zfm/pdi/capda">
                                            {{ __('buttons.botaoSaibaMais') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeIn;">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                        <i class="fa-solid fa-hand-holding-dollar fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">
                                            {{ __('home.vantagens.card4.title') }}
                                        </h5>
                                        <p>
                                            {{ __('home.vantagens.card4.description') }}
                                        </p>
                                        <a class="btn px-3 mt-auto mx-auto" href="https://www.gov.br/suframa/pt-br/zfm/pdi/capda">
                                            {{ __('buttons.botaoSaibaMais') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CONTATO --}}
    <div class="container-fluid bg-primary newsletter py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-5 ps-lg-0 pt-5 pt-md-0 text-start wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                    <img class="img-fluid" src="img/contact.png" alt="">
                </div>
                <div class="col-md-7 py-5 newsletter-text wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">
                        {{ __('home.contato.pill') }}
                    </div>
                    <h1 class="text-white mb-4">{{ __('home.contato.titulo') }}</h1>
                    <p class="text-white">{{ __('home.contato.subtitulo') }}</p>
                    <a class="btn btn-outline-light rounded-pill px-4" href="{{ route('projetos') }}">{{ __('buttons.botaoVerProjetos') }}</a>
                    <a class="btn btn-light rounded-pill px-4" href="{{route('contato') }}">{{ __('buttons.botaoContato') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection