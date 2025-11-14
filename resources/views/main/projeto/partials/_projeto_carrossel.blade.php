<div class="container col-md-7">
    <h2 class="d-flex justify-content-between align-items-center">
        <a type="button" data-bs-target="#carouselExample" data-bs-slide="prev"><i
                class="fa-solid fa-chevron-left"></i></a>
        {{ __('projetos.main.projeto.imagens') }}
        <a type="button" data-bs-target="#carouselExample" data-bs-slide="next"><i
                class="fa-solid fa-chevron-right"></i></a>
    </h2>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if($projeto->fotos->slice(0, -1)->isNotEmpty())
                @foreach($projeto->fotos->slice(0, -1)->values() as $index => $foto)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img style="min-height: 500px; max-height: 500px;" src="{{ asset('storage/' . $foto->path) }}"
                            class="d-block w-100" alt="Imagem do projeto">
                    </div>
                @endforeach
            @else
                <div class="carousel-item active">
                    <img style="min-height: 500px; max-height: 500px;" src="{{ asset('img/default_carousel.jpg') }}"
                        class="d-block w-100" alt="Imagem padrão">
                </div>
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>