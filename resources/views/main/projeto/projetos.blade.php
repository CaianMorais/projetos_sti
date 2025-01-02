@extends('layout')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Projetos</div>
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Explore os projetos</h1>
                    <p class="text-white mb-4 animated slideInRight">Confira abaixo, nossos projetos que estão em desenvolvimento, prontos para investimento e os já concluídos.</p>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/projects.png" alt="Banner tela inicial">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px; visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <h1 class="mb-4">Veja nossos mais recentes projetos</h1>
            </div>
            <div class="row g-4">
                @foreach($projetos as $projeto)
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" style="min-width:400px; min-height:500px;" 
                    src="{{ $projeto->fotos->isNotEmpty() ? asset('storage/' . $projeto->fotos->first()->path) : asset('img/default_project.jpg') }}" 
                    alt="Imagem do projeto">
                        <a class="case-overlay text-decoration-none" href="{{ route('projetos.ver_projeto', ['id' => $projeto->id]) }}">
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
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/project-2.jpg" alt="">
                        <a class="case-overlay text-decoration-none" href="">
                            <small>Machine learning</small>
                            <h5 class="lh-base text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita
                            </h5>
                            <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeIn;">
                    <div class="case-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/project-3.jpg" alt="">
                        <a class="case-overlay text-decoration-none" href="">
                            <small>Predictive Analysis</small>
                            <h5 class="lh-base text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita
                            </h5>
                            <span class="btn btn-square btn-primary"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection