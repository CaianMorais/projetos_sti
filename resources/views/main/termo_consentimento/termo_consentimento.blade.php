@extends('layout')

@section('title', 'Termo de Consentimento')

@section('content')

<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Termo</div>
                <h1 class="display-4 text-white mb-4 animated slideInRight">Termo de Consentimento para uso de dados</h1>
                <p class="text-white mb-4 animated slideInRight">Ao enviar uma mensagem para o SENAI-RO através da plataforma, você está automaticamente concordando com o termo abaixo</p>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="{{ asset('img/personal_data.png') }}" alt="Banner tela inicial">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<div class="container-fluid py-5 bg-light ">
    @include('main.termo_consentimento.partials._termo')
</div>

@endsection