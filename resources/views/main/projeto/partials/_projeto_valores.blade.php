<div class="col-md-5 col-sm-12 card border-0 shadow py-5">
    <h2 class="text-center mb-4">
            {{ __('projetos.main.projeto.valores.titulo') }}
        </h2>
    @if (!$projeto->valor_visibilidade)
        <div class="d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-money-bill-trend-up"></i>&nbsp;
            <h5 class="m-0">
                {{ __('projetos.main.projeto.valores.valorMinimo') }}: 
                {{ 'R$ ' . number_format($projeto->valor_minimo, 2, ',', '.') }}
            </h5>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-money-bill-trend-up"></i>&nbsp;
            <h5 class="m-0">
                {{ __('projetos.main.projeto.valores.valorMaximo') }}: 
                {{ 'R$ ' . number_format($projeto->valor_maximo, 2, ',', '.') }}
            </h5>
        </div>
    @else
        <div class="d-flex align-items-center justify-content-center">
            <h5 class="m-0 text-center">
                {{ __('projetos.main.projeto.valores.naoDefinido') }}, 
                <a href="#contato_projeto">{{ __('projetos.main.projeto.valores.contate') }}</a>.</h5>
        </div>
    @endif
</div>