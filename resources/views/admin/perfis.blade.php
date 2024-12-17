@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header text-end">
            <a href="#" class="btn btn-primary">Novo perfil</a>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PERFIL</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perfis as $perfil)
                            <tr>
                                <td>{{ $perfil->id }}</td>

                                <td>{{ $perfil->nome_perfil }}</td>

                                <td class="d-flex justify-content-evenly align-items-center">
                                    <a href="#" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="#" class="delete-member" data-id="" title="Excluir">
                                        <i class="text-danger bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection