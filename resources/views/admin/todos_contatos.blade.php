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
            {{-- TABELA QUE MOSTRA TODOS OS CONTATOS ENVIADOS ATRAVES DE PROJETOS --}}
            @include('admin.partials.todos_contatos._table_todos_contatos')

            {{-- PAGINAÇÃO DA TABELA --}}
            @if ($contagem > 20)
            @include('admin.partials.todos_contatos._paginate_todos_contatos')
            @endif
        </div>
    </div>
</div>

@endsection