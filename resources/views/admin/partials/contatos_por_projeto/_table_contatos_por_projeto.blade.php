<div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-parent="#projetosAccordion">
    <div class="card-body">
        @if($projeto->contatos->isEmpty())
            <p>Nenhuma mensagem para este projeto ainda.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>EMAIL</th>
                            <th>DATA</th>
                            <th>STATUS</th>
                            <th>VER</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projeto->contatos as $contato)
                            <tr>
                                <td>{{ $contato->nome }}</td>
                                <td>{{ $contato->email }}</td>
                                <td>{{ $contato->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if($contato->lido)
                                        <span class="badge bg-success">Lida</span>
                                    @else
                                        <span class="badge bg-danger">Não lida</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.ver_contato_do_projeto', $contato->id) }}"><i
                                            class="bi bi-chevron-double-right"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>