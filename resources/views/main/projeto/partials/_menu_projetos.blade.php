<div class="row g-4">
    @foreach($projetos as $projeto)
        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s"
            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
            <div class="case-item position-relative overflow-hidden rounded mb-2">
                <img class="img-fluid" style="min-width:400px; min-height:500px;"
                    src="{{ $projeto->fotos->isNotEmpty() ? asset('storage/' . $projeto->fotos->last()->path) : asset('img/default_project.jpg') }}"
                    alt="Imagem do projeto">
                <a class="case-overlay text-decoration-none"
                    href="{{ route('projetos.ver_projeto', ['id' => $projeto->id]) }}">
                    @if($projeto->status == 'AN')
                        <small class="bg-primary">Em andamento</small>
                    @elseif($projeto->status == 'PI')
                        <small class="bg-info">Pronto para investimento</small>
                    @elseif($projeto->status == 'CN')
                        <small class="bg-success">Concluído</small>
                    @endif
                    <h5 class="lh-base text-white mb-3">{{ $projeto->nome_projeto }}
                    </h5>
                    <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                </a>
            </div>
        </div>
    @endforeach
</div>