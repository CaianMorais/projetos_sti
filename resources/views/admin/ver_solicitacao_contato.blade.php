@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Mensagem</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dados do contato</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Mensagem</a>
                        @if (isset($mensagem->projeto))
                        <a class="nav-link" href="{{ route('projetos.ver_projeto', $mensagem->projeto->id) }}" target="_blank" aria-selected="false">Projeto <i class="bi bi-box-arrow-up-right"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        {{-- PARTIALS DE CONTEUDO DAS TABS DE NAVEGAÇÃO --}}
                        @include('admin.partials.solicitacao_contatos._tab_dados_contato')
                        @include('admin.partials.solicitacao_contatos._tab_mensagem')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection