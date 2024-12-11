@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
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
                            <small class="text-danger">Serão apenas aceitos imagens em .png, .jpg ou .jpeg</small>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Atualizar</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpar formulário</button>
                        </div>
                    </div>
                </form>
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
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Inicia o Quill
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Digite mais detalhes sobre o projeto'
        });

        // Seleciona o formulário
        const form = document.querySelector('.form');

        // Captura o campo hidden que receberá o conteúdo do Quill
        const detalhesInput = document.getElementById('detalhes');

        // Atualiza o campo hidden com o conteúdo do Quill antes de enviar o formulário
        form.addEventListener('submit', function () {
            detalhesInput.value = quill.root.innerHTML;
        });

        // Seleciona os campos
        const minValueInput = document.getElementById('min_value');
        const maxValueInput = document.getElementById('max_value');

        // Aplica a máscara de moeda
        Inputmask({
            alias: "currency",
            prefix: "R$ ",
            groupSeparator: ".",
            radixPoint: ",",
            digits: 2,
            autoUnmask: true,
            removeMaskOnSubmit: true,
            rightAlign: false
        }).mask([minValueInput, maxValueInput]);
    });
</script>


@endsection