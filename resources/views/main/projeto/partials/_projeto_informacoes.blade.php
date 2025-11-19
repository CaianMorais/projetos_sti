<div class="col-md-5 col-sm-12 card border-0 shadow py-5">
    <h2 class="text-center mb-4">
        {{ __('projetos.main.projeto.infos.titulo') }}
    </h2>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-people-group"></i>&nbsp;
        <h5 class="m-0">
            {{ __('projetos.main.projeto.infos.autor') }}: 
            {{ $projeto->traducaoAtual->autor_projeto }}
        </h5>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-magnifying-glass"></i>&nbsp;
        <h5 class="m-0">
            {{ __('projetos.main.projeto.infos.status') }}: 
            @if ($projeto->traducaoAtual->status == 'AN')
                {{ __('projetos.main.status.AN') }}
            @elseif ($projeto->traducaoAtual->status == 'PI')
                {{ __('projetos.main.status.PI') }}
            @elseif ($projeto->traducaoAtual->status == 'CN')
                {{ __('projetos.main.status.CN') }}
            @endif
        </h5>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-calendar"></i>&nbsp;
        <h5 class="m-0">
            {{ __('projetos.main.projeto.infos.dataPostagem') }}: 
            {{ date_format($projeto->traducaoAtual->created_at, 'd/m/Y')}}
        </h5>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-calendar"></i>&nbsp;
        <h5 class="m-0">
            {{ __('projetos.main.projeto.infos.ultimaModificacao') }}: 
            {{ date_format($projeto->traducaoAtual->updated_at, 'd/m/Y')}}
        </h5>
    </div>
</div>