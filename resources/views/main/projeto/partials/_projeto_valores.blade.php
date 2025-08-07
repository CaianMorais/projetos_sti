<div class="col-md-5 col-sm-12 card border-0 shadow py-5">
    <h2 class="text-center mb-4">Valores para investimento</h2>
    @if ($projeto->valor_visibilidade)
        <div class="d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-money-bill-trend-up"></i>&nbsp;
            <h5 class="m-0">Valor mínimo: {{ 'R$ ' . number_format($projeto->valor_minimo, 2, ',', '.') }}</h5>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-money-bill-trend-up"></i>&nbsp;
            <h5 class="m-0">Valor máximo: {{ 'R$ ' . number_format($projeto->valor_maximo, 2, ',', '.') }}</h5>
        </div>
    @else
        <div class="d-flex align-items-center justify-content-center">
            <h5 class="m-0 text-center">Ainda não foram definidos os valores para investimento do projeto, para mais detalhes <a href="#contato_projeto">entre em contato</a>.</h5>
        </div>
    @endif
</div>