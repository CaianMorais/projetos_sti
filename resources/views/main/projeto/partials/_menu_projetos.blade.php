<div class="row g-4">

    @php
        $countProjetosTraduzidos = 0;
    @endphp

    @if(!$projetos->isEmpty())
        @foreach($projetos as $projeto)
        @if($projeto->traducaoAtual && $projeto->traducaoAtual->visibilidade)
            @php
                $countProjetosTraduzidos++;
            @endphp
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                <div class="case-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" style="min-width:400px; min-height:500px;"
                        src="{{ $projeto->fotos->where('capa',true)->isNotEmpty() ? asset('storage/' . $projeto->fotos->where('capa',true)->first()->path) : asset('img/default_project.jpg') }}"
                        alt="Imagem do projeto">
                    <a class="case-overlay text-decoration-none"
                        href="{{ route('projetos.ver_projeto', ['id' => $projeto->traducaoAtual->id]) }}">
                        @if($projeto->traducaoAtual->status == 'AN')
                            <small class="bg-primary">
                                {{ __('projetos.main.status.AN') }}
                            </small>
                        @elseif($projeto->traducaoAtual->status == 'PI')
                            <small class="bg-info">
                                {{ __('projetos.main.status.PI') }}
                            </small>
                        @elseif($projeto->traducaoAtual->status == 'CN')
                            <small class="bg-success">
                                {{ __('projetos.main.status.CN') }}
                            </small>
                        @endif
                        <h5 class="lh-base text-white mb-3">{{ $projeto->traducaoAtual->nome_projeto }}
                        </h5>
                        <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        @endif
        @endforeach
    @endif
    
    @if($countProjetosTraduzidos == 0)
        <div class="col-lg-12 text-center mt-5">
            <h6>{{ __('projetos.main.semProjetos') }}</h6>
        </div>
    @endif
</div>

{{-- Paginação --}}
<div class="d-flex justify-content-center">
    {{ $projetos->links('pagination::bootstrap-4') }}
</div>