<div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-parent="#projetosAccordion">
    <div class="card-body">
        @if($projeto->contatos->isEmpty())
            <p>Nenhuma mensagem para este projeto ainda.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>IDIOMA</th>
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
                                <td>
                                    @if($contato->locale == 'pt_BR')
                                    <img width="20" height="20" src="{{ asset('img/br.svg') }}" title="Português">
                                    @elseif($contato->locale == 'en')
                                    <img width="20" height="20" src="{{ asset('img/us.svg') }}" title="Inglês">
                                    @endif
                                </td>
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