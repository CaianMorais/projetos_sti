@extends('layout')

@section('content')

<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Equipe</div>
                <h1 class="display-4 text-white mb-4 animated slideInRight">Conheça nosso time</h1>
                <p class="text-white mb-4 animated slideInRight">Confira abaixo, nossa equipe responsável pela supervisão e desenvolvimento dos projetos apresentados na plataforma.</p>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="{{ asset('img/team.png') }}" alt="Banner tela inicial">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="col-md-12 col-lg-12 col-sm-12">
            {{-- PARTIAL QUE CRIA OS CARDS DE CADA MEMBRO DA EQUIPE --}}
            @include('main.equipe.partials._cards_equipe')
        </div>
    </div>
</div>

@endsection