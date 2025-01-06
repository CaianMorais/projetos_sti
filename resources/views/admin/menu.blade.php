@extends('layouts.admin')

@section('content')

<div class="col-12 col-lg-12">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-center">Manual de administrador do Projetos STI</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Introdução</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="projetos-tab" data-bs-toggle="tab" href="#projeto" role="tab" aria-controls="profile" aria-selected="false">Projetos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="equipe-tab" data-bs-toggle="tab" href="#equipe" role="tab" aria-controls="equipe" aria-selected="false">Equipe</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contatos-tab" data-bs-toggle="tab" href="#contatos" role="tab" aria-controls="contatos" aria-selected="false">Contatos</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @include('admin.partials.menu._introducao_menu')
                    </div>
                    <div class="tab-pane fade" id="projeto" role="tabpanel" aria-labelledby="projetos-tab">
                        @include('admin.partials.menu._projeto_menu')
                    </div>
                    <div class="tab-pane fade" id="equipe" role="tabpanel" aria-labelledby="equipe-tab">
                        @include('admin.partials.menu._equipe_menu')
                    </div>
                    <div class="tab-pane fade" id="contatos" role="tabpanel" aria-labelledby="contatos-tab">
                        INSERIR INFORMAÇÃO
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection