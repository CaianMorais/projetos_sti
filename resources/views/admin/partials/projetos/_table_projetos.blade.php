<table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>PROJETO</th>
                                    <th>STATUS</th>
                                    <th>VALORES (min - máx)</th>
                                    <th>CRIADO EM</th>
                                    <th>AÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projetos as $projeto)
                                <tr>
                                    <td>{{ $projeto->nome_projeto }}</td>

                                    @if ($projeto->status == 'PI')
                                    <td>{{ $projeto->status }} - Pronto para Investimento</td>
                                    @elseif ($projeto->status == 'AN')
                                    <td>{{ $projeto->status }} - Em andamento</td>
                                    @elseif ($projeto->status == 'CN')
                                    <td>{{ $projeto->status }} - Concluído</td>
                                    @endif

                                    <td>R${{ number_format($projeto->valor_minimo,2, ',','.') }} - R${{ number_format($projeto->valor_maximo,2, ',','.') }}</td>
                                    
                                    <td>{{ date_format($projeto->created_at, 'd/m/Y H:i') }}</td>

                                    <td class="d-flex justify-content-around align-items-center">
                                        <a href="{{ route('admin.projetos.editar', $projeto->id) }}" title="Editar">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="{{ route('admin.projetos.delete', $projeto->id) }}" class="delete-project" data-id="{{ $projeto->id }}" title="Excluir">
                                            <i class="text-danger bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>