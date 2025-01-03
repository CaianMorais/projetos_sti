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

    {{-- CARD DETALHES DO PROJETO --}}
    <div class="container-fluid py-5">
        @include('main.projeto.partials._projeto_detalhes')
    </div>

    {{-- CARD DE CARROSSEL COM IMAGENS DO PROJETO --}}
    <div class="container-fluid py-5">
        @include('main.projeto.partials._projeto_carrossel')
    </div>

    {{-- CONTAINER COM CARDS DE INFORMAÇÕES E VALORES --}}
    <div class="container-fluid py-5">
            <div class="container">
                <div class="row gap-4 justify-content-center">
                    {{-- CARD INFORMAÇÕES DO PROJETO --}}
                    @include('main.projeto.partials._projeto_informacoes')

                    {{-- CARD VALORES DO PROJETO --}}
                    @include('main.projeto.partials._projeto_valores')
                </div>
            </div>
        </div>
    </div>

    {{-- CONTAINER DE CONTATO DO PROJETO --}}
    <div class="container-fluid py-5">
        @include('main.projeto.partials._projeto_contato')
    </div>

    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>

@endsection