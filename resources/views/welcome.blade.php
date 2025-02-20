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

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Início</div>
                    <h1 class="display-5 text-white mb-4 animated slideInRight">Projetos de Tecnologia e Inovação SENAI Rondônia</h1>
                    <p class="text-white mb-4 animated slideInRight">A Coordenação de Soluções em Tecnologias e Inovação (STI) do SENAI Rondônia é credenciado pelo Comitê das Atividades de Pesquisa e Desenvolvimento na Amazônia (CAPDA) como instituição habilitada à execução de atividade de Pesquisa, Desenvolvimento e Inovação (PD&I).</p>
                    <a target="_blank" href="https://www.in.gov.br/en/web/dou/-/resolucao-capda-n-49-de-1-de-fevereiro-de-2024-544273654" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">Saiba mais</a>
                    <a href="{{ route('projetos') }}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Ver projetos</a>
                </div>
                <div class="col-lg-6 align-self-end text-lg-end">
                    <img class="img-fluid" src="{{ asset('img/welcome_banner.png') }}" alt="Banner tela inicial">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hero End -->
    <div class="container-fluid bg-light text-center py-5">
        <a href="#vantagens" class="icon-link icon-link-hover">
            <i class="fa-solid fa-angles-down fa-2xl"></i>
        </a>
    </div>

    <div class="container-fluid bg-light py-5" id="vantagens">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Vantagens</div>
                    <h1 class="mb-4">Vantagens de investir em projetos de Tecnologia e Inovação do SENAI-RO</h1>
                    <p class="mb-4">Para tornar o investimento uma opção atraente para investidores que buscam inovação, sustentabilidade e benefícios fiscais, o CAPDA oferece uma série de benefícios para esses investidores.</p>
                    <a class="btn btn-primary rounded-pill px-4" href="https://www.gov.br/suframa/pt-br/zfm/pdi/capda">Saiba mais</a>
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
                                        <h5 class="mb-3">Acesso a tecnologias</h5>
                                        <p>Investir nos nossos projetos dá acessos a tecnologias de ponta e oportunidades de crescimento.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="https://www.ddlconsultores.com.br/post/por-que-credenciar-icts-no-capda">Saiba mais</a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                        <i class="fa-brands fa-pagelines fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">Sustentabilidade</h5>
                                        <p>Investir em projetos focados no desenvolvimento da Amazônia pode contribuir para práticas empresariais mais sustentáveis.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="https://www.gov.br/suframa/pt-br/zfm/pdi/capda">Saiba mais</a>
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
                                        <h5 class="mb-3">Redução de Riscos</h5>
                                        <p>O credenciamento garante que os nossos projetos são viáveis e têm grande potencial para sucesso.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="https://www.gov.br/suframa/pt-br/zfm/pdi/capda">Saiba mais</a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeIn;">
                                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                        <div class="service-icon btn-square">
                                        <i class="fa-solid fa-hand-holding-dollar fa-2x"></i>
                                        </div>
                                        <h5 class="mb-3">Incentivos Fiscais</h5>
                                        <p>Investir em projetos da empresa credenciada trás benefícios fiscais como deduções de impostos, que podem melhorar a rentabilidade do investimento.</p>
                                        <a class="btn px-3 mt-auto mx-auto" href="https://www.gov.br/suframa/pt-br/zfm/pdi/capda">Saiba mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary newsletter py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-5 ps-lg-0 pt-5 pt-md-0 text-start wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                    <img class="img-fluid" src="img/contact.png" alt="">
                </div>
                <div class="col-md-7 py-5 newsletter-text wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Contato</div>
                    <h1 class="text-white mb-4">Gostou das vantagens e quer investir?</h1>
                    <p class="text-white">Envia uma mensagem através de um projeto ou entre em contato conosco para que nossa equipe responda você com mais informações.</p>
                    <a class="btn btn-outline-light rounded-pill px-4" href="{{ route('projetos') }}">Veja os projetos</a>
                    <a class="btn btn-light rounded-pill px-4" href="{{route('contato') }}">Entre com contato conosco</a>
                </div>
            </div>
        </div>
    </div>

@endsection