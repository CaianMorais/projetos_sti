<table class="table table-striped mb-0 table-centered">
    <thead>
        <tr>
            <th class="text-center">NOME</th>
            <th class="text-center">TELEFONE</th>
            <th class="text-center">SOCIAL</th>
            <th class="text-center">ÚLTIMA MODIFICAÇÃO</th>
            <th class="text-center">AÇÃO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($equipe as $membro)
        <tr>
            <td class="text-center">{{ $membro->nome }}</td>

            <td class="text-center">{{ $membro->telefone }}</td>

            <td class="d-flex justify-content-around" style="font-size:18px;">
                @if (!is_null($membro->linkedin))
                    <a href="{{ $membro->linkedin }}" target="_blank" title="LinkedIn">
                        <i class="bi bi-linkedin" style="color: #00bd39;"></i>
                    </a>
                @else
                    <a href="javascript:void(0);" title="Não cadastrado">
                        <i class="bi bi-linkedin" style="color: #bd0000;"></i>
                    </a>
                @endif
                @if (!is_null($membro->instagram))
                    <a href="{{ $membro->instagram }}" target="_blank" title="Instagram">
                        <i class="bi bi-instagram" style="color: #00bd39;"></i>
                    </a>
                @else
                    <a href="javascript:void(0);" title="Não cadastrado">
                        <i class="bi bi-instagram" style="color: #bd0000;"></i>
                    </a>
                @endif
            </td>
            
            <td class="text-center">
                {{ date_format($membro->updated_at, 'd/m/Y H:i')}}
            </td>

            <td class="d-flex justify-content-around align-items-center">
                <a href="{{ route('admin.equipe.editar', $membro->id) }}" title="Editar">
                    <i class="bi bi-pencil-fill"></i>
                </a>
                <a href="{{ route('admin.equipe.destroy', $membro->id) }}" class="delete-member" data-id="{{ $membro->id }}" title="Excluir">
                    <i class="text-danger bi bi-trash-fill"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>