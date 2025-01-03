<div class="col-md-5 col-sm-12 card border-0 shadow py-5">
    <h2 class="text-center mb-4">Informações do projeto</h2>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-people-group"></i>&nbsp;
        <h5 class="m-0">Autor: {{ $projeto->autor_projeto }}</h5>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-magnifying-glass"></i>&nbsp;
        <h5 class="m-0">Status:
            @if ($projeto->status == 'AN')
                Em andamento/desenvolvimento
            @elseif ($projeto->status == 'PI')
                Pronto para investimento
            @elseif ($projeto->status == 'CN')
                Concluído
            @endif
        </h5>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-calendar"></i>&nbsp;
        <h5 class="m-0">Data de postagem: {{ date_format($projeto->created_at, 'd/m/Y')}}</h5>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-calendar"></i>&nbsp;
        <h5 class="m-0">Última modificação: {{ date_format($projeto->updated_at, 'd/m/Y')}}</h5>
    </div>
</div>