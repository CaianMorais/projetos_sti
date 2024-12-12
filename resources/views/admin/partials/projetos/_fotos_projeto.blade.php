@if($projeto->fotos->isNotEmpty())
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projeto->fotos as $foto)
                <tr>
                    <td><img src="{{ asset('storage/' . $foto->path) }}" alt="Imagem do Projeto" width="100"></td>
                    <td>
                        <!-- Formulário separado para excluir a foto -->
                        <form action="{{ route('admin.projetos.fotos.destroy', $foto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Não há fotos para este projeto.</p>
@endif