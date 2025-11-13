@extends('layout')

@section('title', __('guias.contato'))

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">
                        {{ __('contato.pill') }}
                    </div>
                    <h1 class="display-4 text-white mb-4 animated slideInRight">
                        {{ __('contato.titulo') }}
                    </h1>
                    <p class="text-white mb-4 animated slideInRight">
                        {{ __('contato.descricao') }}
                    </p>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="{{ asset('img/contact.png') }}" alt="Banner tela inicial">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                {{-- FORMULARIO DE CONTATO --}}
                @include('main.contato.partials._form_contato')
            </div>
        </div>
    </div>

    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
@endsection