@extends('layout')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Projetos</div>
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Explore os projetos</h1>
                    <p class="text-white mb-4 animated slideInRight">Confira abaixo, nossos projetos que estão em desenvolvimento, prontos para investimento e os já concluídos.</p>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/projects.png" alt="Banner tela inicial">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px; visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <h1 class="mb-4">Veja nossos mais recentes projetos</h1>
            </div>
            {{-- PARTIAL DE MENU DE PROJETOS --}}
            @include('main.projetos.partials._menu_projetos')
        </div>
    </div>
@endsection