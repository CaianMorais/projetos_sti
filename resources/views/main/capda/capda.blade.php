@extends('layout')

@section('title', 'Certificação CAPDA')

@section('content')

<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Certificação</div>
                <h1 class="display-4 text-white mb-4 animated slideInRight">Certificação CAPDA</h1>
                <p class="text-white mb-4 animated slideInRight">O SENAI-RO é uma instituição habilitada à execução de atividade de Pesquisa, Desenvolvimento e Inovação (PD&I) pelo Comitê das Atividades de Pesquisa e Desenvolvimento na Amazônia (CAPDA).</p>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-center">
                <img class="img-fluid" src="{{ asset('img/certificado.png') }}" alt="Banner tela inicial">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Certificação</div>
                <h1 class="mb-4">O que diz o CAPDA!</h1>
                <p class="mb-4">O Comitê das Atividades de Pesquisa e Desenvolvimento na Amazônia através da Resolução CAPDA Nº 49, de 1 de Fevereiro de 2024 dispôs o credenciamento CAPDA para o SENAI-RO no Diário Oficial da União. Publicado em: 22/02/2024 </p>
                <a class="btn btn-primary rounded-pill px-4" href="https://www.in.gov.br/en/web/dou/-/resolucao-capda-n-49-de-1-de-fevereiro-de-2024-544273654">Veja aqui</a>
            </div>
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel testimonial-carousel border-start border-primary">
                    <div class="testimonial-item ps-5">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="fs-4">O COMITÊ DAS ATIVIDADES DE PESQUISA E DESENVOLVIMENTO NA AMAZÔNIA (CAPDA), no cumprimento de suas atribuições estabelecidas no art. 27 do Decreto nº 10.521, de 15 de outubro de 2020, e na Resolução nº 8 de 29 de outubro de 2019, dispõe sobre o credenciamento do Serviço Nacional de Aprendizagem Industrial - Departamento Regional de Rondônia (SENAI/RO), como Instituição habilitada à execução de atividades de Pesquisa, Desenvolvimento e Inovação (PD&I).</p>
                    </div>
                    <div class="testimonial-item ps-5">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="fs-4">Art. 1º Credenciar o Serviço Nacional de Aprendizagem Industrial - Departamento Regional de Rondônia (SENAI/RO), como instituição habilitada à execução de atividades de Pesquisa, Desenvolvimento e Inovação (PD&I), para os fins previstos nos incisos I e IV do § 4º e nos incisos I e IV do § 18, todos do art. 2º da Lei nº 8.387, de 30 de dezembro de 1991.</p>
                    </div>
                    <div class="testimonial-item ps-5">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="fs-4">A unidade do Serviço Nacional de Aprendizagem Industrial - Departamento Regional de Rondônia (SENAI/RO), capacitada a receber os benefícios previstos no caput deste artigo é o Centro Tecnológico de Mecatrônica do SENAI - Prof. Dr. Volkmar Schuler (CETEM), inscrito no CNPJ nº 03.780.605/0006-45. Art. 3º Esta Resolução entra em vigor na data de sua publicação no Diário Oficial da União.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection