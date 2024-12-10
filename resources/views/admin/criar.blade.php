@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="nome">Nome do projeto</label>
                                <input type="text" id="nome" class="form-control" placeholder="Nome do projeto" name="nome_projeto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="autor">Autor do projeto</label>
                                <input type="text" id="autor" class="form-control" placeholder="Autor do projeto" name="autor_projeto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="status">Status atual do projeto</label>
                                <select class="form-select" id="status">
                                    <option selected>Selecione um status</option>
                                    <option value="AN">Em andamento</option>
                                    <option value="PI">Pronto para investimento</option>
                                    <option value="CN">Concluído</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="min_value">Valor mínimo</label>
                                <input type="text" id="min_value" class="form-control" placeholder="Digite apenas números" name="valor_minimo">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="max_value">Valor máximo</label>
                                <input type="text" id="max_value" class="form-control" name="valor_maximo" placeholder="Digite apenas números">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
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