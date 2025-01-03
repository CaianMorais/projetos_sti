@extends('layouts.admin')

@section('content')

<div class="col-md-6 col-sm-12">
    <div class="card">
        <div class="card-content">
            <img class="card-img-top img-fluid" src="{{ asset('img/contacts.svg') }}" alt="Card image cap"
                style="height: 20rem">
            <div class="card-body">
                <h4 class="card-title">Todas as mensagens</h4>
                <p class="card-text">
                    Nesse menu você vera todas as mensagens enviadas 
                    de todos os projetos postados na mesma tabela, ordenados
                    apenas pela data de envio mais recente para o mais antigo.
                </p>
                <button class="btn btn-primary block">Acessar</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-12">
    <div class="card">
        <div class="card-content">
            <img class="card-img-top img-fluid" src="{{ asset('img/organization.svg') }}" alt="Card image cap"
                style="height: 20rem">
            <div class="card-body">
                <h4 class="card-title">Mensagens por projeto</h4>
                <p class="card-text">
                    Nesse menu você verá uma tabela com todos os projetos postados
                    e a quantidade de mensagens enviadas por cada projeto, lidas e
                    não lidas. Podendo acessar as mensagens de cada projeto.
                </p>
                <a type="button" href="{{ route('admin.contatos_por_projeto') }}" class="btn btn-primary block">Acessar</a>
            </div>
        </div>
    </div>
</div>

@endsection