<form action="{{ route('admin.projetos.fotos.update', $projeto_translate->id) }}" class="form" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-12 mb-3">
        <label for="formFileMultiple" class="form-label">Fotos do projeto</label>
        <input class="form-control" type="file" id="formFileMultiple" name="img_projetos[]" multiple accept=".jpg, .jpeg, .png">
        <small class="text-danger">Serão apenas aceitos imagens em .png, .jpg ou .jpeg</small><br>
        <small class="text-danger">A capa do projeto em <a href={{ route('projetos') }}>Projetos</a> e deve ser de resolução 400x500 ou aproximado</small><br>
        <small class="text-danger">As demais imagens serão exibidas no carrossel dentro do projeto e devem ser de resolução 850x500 ou aproximado</small><br>
        <small class="text-danger">As imagens postadas que não seguirem as recomendações acima, poderão estar comprometendo a responsividade e a visualização do usuário final.</small>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" id="publicar" class="btn btn-primary me-1 mb-1">Atualizar</button>
    </div>
</form>
{{-- @if($projetos_count > 1)
    <h6 class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Atualizar as fotos desse projeto também atualizará a(s) versão(ões) dele em outro idioma</h4>
@endif --}}
@if($projetos_id && $projetos_id->count() > 1)
    <div class="col-12">
        <h6>As imagens deste projeto são espelhadas nesses projetos:</h6>
        @foreach($projetos_id as $id)
            <a href="{{ route('admin.projetos.fotos', $id->id) }}">#{{ $id->id }} - {{ $id->nome_projeto }} </a>
            @if($projeto_translate->id == $id->id)
            <span class="badge bg-success">Atual</span>
            @endif
            <br>
        @endforeach
    </div>
@endif

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
                    <td>
                        <img src="{{ asset('storage/' . $foto->path) }}" alt="Imagem do Projeto" width="100">
                        <p>Nº: {{ $foto->id }} 
                            @if($foto->capa)
                                <span class="badge bg-primary">Capa</span>
                            @endif
                        </p>
                        
                    </td>
                    <td>
                        <!-- Formulário separado para excluir a foto -->
                        <form action="{{ route('admin.projetos.fotos.destroy', $foto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                        @if(!$foto->capa)
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.projetos.definir_capa', [$foto->id, $projeto->id, $projeto_translate->id]) }}">Definir capa</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Não há fotos para este projeto.</p>
@endif