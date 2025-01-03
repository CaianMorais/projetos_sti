<div class="col-md-5 col-sm-12 card border-0 shadow py-5">
    <h2 class="text-center mb-4">Valores para investimento</h2>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-money-bill-trend-up"></i>&nbsp;
        <h5 class="m-0">Valor mínimo: {{ 'R$ ' . number_format($projeto->valor_minimo, 2, ',', '.') }}</h5>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-money-bill-trend-up"></i>&nbsp;
        <h5 class="m-0">Valor máximo: {{ 'R$ ' . number_format($projeto->valor_maximo, 2, ',', '.') }}</h5>
    </div>
</div>