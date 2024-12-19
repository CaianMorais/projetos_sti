@extends('layouts.admin')

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <img width="64" height="22" src="{{ asset('img/admin/lido.png') }}"> Lido
                &nbsp;
                <img width="64" height="22" src="{{ asset('img/admin/nao-lido.png') }}"> Não lido
            </div>
            <div class="card-content">
                {{-- PARTIAL DA TABELA DE SOLICITAÇÃO DE CONTATO --}}
                @include('admin.partials.solicitacao_contatos._table_solicitacao_contatos')
                @if ($contagem > 20)
                {{-- PARTIAL DA PAGINAÇÃO DA TABELA DE SOLICITAÇÃO DE CONTATO --}}
                @include('admin.partials.solicitacao_contatos._paginate_solicitacao_contatos')
                @endif
            </div>
        </div>
    </div>

@endsection