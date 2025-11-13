@extends('layout')

@section('title', __('guias.capda'))

@section('content')

<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">
                    {{ __('certificacao.pill') }}
                </div>
                <h1 class="display-4 text-white mb-4 animated slideInRight">
                    {{ __('certificacao.titulo') }}
                </h1>
                <p class="text-white mb-4 animated slideInRight">
                    {{ __('certificacao.descricao') }}
                </p>
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
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">
                    {{ __('certificacao.pill') }}
                </div>
                <h1 class="mb-4">
                    {{ __('certificacao.certificado.titulo') }}
                </h1>
                <p class="mb-4">
                    {{ __('certificacao.certificado.descricao') }}
                </p>
                <a class="btn btn-primary rounded-pill px-4" href="https://www.in.gov.br/en/web/dou/-/resolucao-capda-n-49-de-1-de-fevereiro-de-2024-544273654">
                    {{ __('buttons.botaoVeja') }}
                </a>
            </div>
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel testimonial-carousel border-start border-primary">
                    <div class="testimonial-item ps-5">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="fs-4">
                            {{ __('certificacao.certificado.carrossel.1') }}
                        </p>
                    </div>
                    <div class="testimonial-item ps-5">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="fs-4">
                            {{ __('certificacao.certificado.carrossel.2') }}
                        </p>
                    </div>
                    <div class="testimonial-item ps-5">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="fs-4">
                            {{ __('certificacao.certificado.carrossel.3') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection