<form class="form" action="{{ route('admin.projeto.update', $projeto->id) }}"  method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="detalhes" id="detalhes">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="form-group">
                <label for="nome">Nome do projeto</label>
                <input type="text" id="nome" class="form-control" placeholder="Nome do projeto" name="nome_projeto" value="{{ old('nome_projeto', $projeto->nome_projeto) }}" required>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="autor">Autor do projeto</label>
                <input type="text" id="autor" class="form-control" placeholder="Autor do projeto" name="autor_projeto" value="{{ old('autor_projeto', $projeto->autor_projeto) }}" required>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="status">Status atual do projeto</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="AN" {{ $projeto->status == 'AN' ? 'selected' : '' }}>Em andamento</option>
                    <option value="PI" {{ $projeto->status == 'PI' ? 'selected' : '' }}>Pronto para investimento</option>
                    <option value="CN" {{ $projeto->status == 'CN' ? 'selected' : '' }}>Concluído</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="min_value">Valor mínimo</label>
                <input type="text" id="min_value" class="form-control" placeholder="Digite apenas números" name="valor_minimo" value="{{ old('valor_minimo', number_format($projeto->valor_minimo, 2, ',', '.')) }}" required>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="max_value">Valor máximo</label>
                <input type="text" id="max_value" class="form-control" name="valor_maximo" value="{{ old('valor_maximo', number_format($projeto->valor_maximo, 2, ',', '.')) }}" required>
            </div>
        </div>
    </div>

    <div class="row gap-4 mt-4">
        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" name="descricao" title="Digite uma breve descrição sobre o projeto" placeholder="Uma breve descrição do projeto" id="floatingTextarea2" style="height: 100px" required>{{ old('descricao', $projeto->descricao) }}</textarea>
                <label for="floatingTextarea2">Descrição</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div id="editor">
                    {!! old('detalhes', $projeto->detalhes) !!}
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Fotos do projeto</label>
            <input class="form-control" type="file" id="formFileMultiple" name="img_projetos[]" multiple accept=".jpg, .jpeg, .png">
            <small class="text-danger">Serão apenas aceitos imagens em .png, .jpg ou .jpeg</small><br>
            <small class="text-danger">A primeira imagem será a capa na tela do projeto em <a href={{ route('projetos') }}>Projetos</a> e deve ser de resolução 400x500 ou aproximado</small><br>
            <small class="text-danger">As demais imagens serão exibidas na tela do projeto e devem ser de resolução 850x500 ou aproximado</small><br>
            <small class="text-danger">As imagens postadas que não seguirem as recomendações acima, poderão estar comprometendo a responsividade e a visualização do usuário final.</small>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" id="publicar" class="btn btn-primary me-1 mb-1">Atualizar</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpar formulário</button>
        </div>
    </div>
</form>