@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-md-12 col-sm-12">
    <div class="card collapse-icon accordion-icon-rotate">
        <div class="card-content">
            <div class="card-body">
                <div class="accordion" id="projetosAccordion">
                    @foreach($projetos as $index => $projeto)
                        <div class="card border">
                            {{-- ACCORDION GERADO PROJETO POR PROJETO --}}
                            @include('admin.partials.contatos_por_projeto._accordion_contatos', ['index' => $index, 'projeto' => $projeto])

                            {{-- TABELA DENTRO DO ACCORDION COM AS MENSAGENS --}}
                            @include('admin.partials.contatos_por_projeto._table_contatos_por_projeto', ['index' => $index, 'projeto' => $projeto])
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

@endsection