<form class="form" action="{{ route('admin.equipe.update', $membro->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input value="{{ old('nome', $membro->nome) }}" type="text" id="nome" class="form-control" placeholder="Nome completo" name="nome" required>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input value="{{ old('nome', $membro->telefone) }}" type="phone" id="telefone" class="form-control" placeholder="Digite apenas números" name="telefone" >
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="bio">Bio</label>
                <input value="{{ old('nome', $membro->bio) }}" type="text" class="form-control" name="bio" placeholder="Ex.: Graduado em Engenharia de Software" id="bio" required></input>
                
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="linkedin">LinkedIn (Link)</label>
                <input value="{{ old('nome', $membro->linkedin) }}" type="url" id="linkedin" class="form-control" placeholder="Link do perfil do LinkedIn" name="linkedin">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="instagram">Instagram (Link)</label>
                <input value="{{ old('nome', $membro->instagram) }}" type="url" id="instagram" class="form-control" name="instagram" placeholder="Link do perfil do Instagram">
            </div>
        </div>
        
    </div>
    <div class="row gap-4 mt-4">
        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" name="descricao" title="Digite uma breve descrição" placeholder="Descrição" id="floatingTextarea2" style="height: 100px" required>{{ old('nome', $membro->descricao) }}</textarea>
                <label for="floatingTextarea2">Descrição</label>
            </div>
        </div>
        <div class="mb-3">
            <p class="m-0"><label for="formFile" class="form-label">Foto</label></p>
            <div class="avatar avatar-xl mb-1">
                <img src="{{ asset('storage/' . $membro->path_foto) }}" id="path_foto" alt="Foto do membro da equipe"/>
            </div>
            <input class="form-control" type="file" id="formFile" name="path_foto" accept=".jpg, .jpeg, .png">
            <small class="text-danger">Serão apenas aceitos imagens em .png, .jpg ou .jpeg</small>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" id="cadastrar" class="btn btn-primary me-1 mb-1">Atualizar</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpar formulário</button>
        </div>
    </div>
</form>