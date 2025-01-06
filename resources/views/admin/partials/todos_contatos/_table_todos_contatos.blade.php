<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>PROJETO</th>
                    <th>ENVIADO EM</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contatos as $contato)
                    @if($contato->lido == false)
                        <tr class="table-danger">
                    @elseif($contato->lido == true)
                        <tr class="table-success">
                    @endif
                        <td>{{ $contato->nome }}</td>
                        <td>{{ $contato->email }}</td>
                        <td>{{ $contato->projeto->nome_projeto }}</td>
                        <td>{{ date_format($contato->created_at, 'd/m/Y H:i') }}</td>
                        <td><a href="{{ route('admin.ver_contato_projeto', $contato->id) }}"><i
                                    class="bi bi-chevron-double-right"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>