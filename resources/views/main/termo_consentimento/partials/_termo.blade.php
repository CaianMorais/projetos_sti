<div class="container">
    <div class="row g-5">
        <div class="col-12 text-center">
            {!! $termo->termo !!}
            
            <h5 class="mb-4 pt-4 animated slideInRight">Este termo entrou em vigor em: {{ \Carbon\Carbon::parse($termo->data_vigor)->format('d/m/Y') }}</h5>
        </div>
    </div>
</div>