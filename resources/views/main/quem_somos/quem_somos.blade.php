@extends('layout')

@section('title', __('guias.quem_somos'))

@section('content')

<style>
    .img-original {
        display: inline-block; /* Para evitar comportamento inesperado */
        width: auto; /* Mantém a largura original */
        height: auto;
        max-width: none; /* Remove limites de largura */
    }
</style>


<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">
                    {{ __('quem_somos.pill') }}
                </div>
                <h1 class="display-4 text-white mb-4 animated slideInRight">
                    {{ __('quem_somos.titulo') }}
                </h1>
                <p class="text-white mb-4 animated slideInRight">
                    {{ __('quem_somos.descricao') }}
                </p>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="{{ asset('img/building.png') }}" alt="Banner tela inicial">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<div class="container-fluid py-5 bg-light  mb-4">
    @include('main.quem_somos.partials._text_sobre')
</div>


<div class="container-fluid py-5 bg-primary hero-header">
    <div class="container">
        <div class="row g-5">
            <div class="col-12">
                <h1 class="text-white animated slideInRight text-center">
                    {{ __('quem_somos.parceiros') }}
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="col-12 text-center">
            <img class="img-original" src="{{ asset('img/parceiros/ecopore.jpeg') }}">
            <img class="img-original" src="{{ asset('img/parceiros/fapero.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/fiocruz.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/capda.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/suframa_gov.jpeg') }}">
            <img class="img-original" src="{{ asset('img/parceiros/unir.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/sidia.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/softex.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/ventiur.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/venture_hub.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/certi_amazonia.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/certi.png') }}">
            <img class="img-original" src="{{ asset('img/parceiros/ppi40.png') }}">
        </div>
    </div>
</div>

@endsection