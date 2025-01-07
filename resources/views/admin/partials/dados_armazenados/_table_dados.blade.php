<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="container-fluid">
                <div class="table-responsive">
                    <table id="dadosTabela" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>E-MAIL</th>
                                <th>SALVO EM</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dados as $dado)
                                <tr>
                                    <td>{{ $dado->id }}</td>
                                    <td>{{ $dado->name }}</td>
                                    <td>{{ $dado->email }}</td>
                                    <td>{{ $dado->created_at->format('d/m/Y H:i') }}</td>
                                    <td><a href="{{ route('admin.dados_armazenados.delete', $dado->id) }}" class="delete-member" data-id="{{ $dado->id }}" title="Excluir"><i class="bi bi-trash text-danger"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>