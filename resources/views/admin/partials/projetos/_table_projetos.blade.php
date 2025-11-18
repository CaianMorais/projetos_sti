<table class="table table-striped mb-0">
    <thead>
        <tr class="text-center">
            <th>VISÍVEL</th>
            <th>IDIOMA</th>
            <th>PROJETO</th>
            <th>STATUS</th>
            <th>VALORES (min - máx)</th>
            <th>CRIADO EM</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projetos as $projeto)
        <tr class="text-center">
            <td>
                @if($projeto->visibilidade == true)
                <i class="bi bi-check2-circle text-success" title="Visível"></i>
                @else
                <i class="bi bi-x-circle text-danger" title="Não visível"></i>
                @endif
            </td>

            <td>
                @if($projeto->locale == 'pt_BR')
                <img src="{{ asset('img/br.svg') }}" width="20" height="20">
                @elseif($projeto->locale == 'en')
                <img src="{{ asset('img/us.svg') }}" width="20" height="20">
                @else
                -
                @endif
            </td>

            <td>{{ \Illuminate\Support\Str::limit($projeto->nome_projeto, 20, '...') }}</td>

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
                <a href="{{ route('admin.projetos.form_duplicar', $projeto->id) }}" title="Duplicar em outro idioma">
                    <i class="bi bi-translate"></i>
                </a>
                <a href="{{ route('admin.projetos.fotos', $projeto->id) }}" title="Editar imagens">
                    <i class="bi bi-images"></i>
                </a>
                <a href="{{ route('admin.projetos.editar', $projeto->id) }}" title="Editar informações">
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