<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{ route('login') }}" class="d-inline-block mb-3">
        <h2 class="text-white">Inovação SENAI</h2>
    </a>
    <p class="mb-0">Site desenvolvido pelo setor de Coordenação de Tecnologia de Informação do Sistema da Federação das
        Indústrias do Estado de Rondônia juntamente com o setor de Soluções em Tecnologias e Inovação.</p>
</div>
<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
    <h5 class="text-white mb-4">Entre em contato</h5>
    <p><i class="fa fa-map-marker-alt me-3"></i>Rua Rui Barbosa, 1112, Arigolândia</p>
    <p><i class="fa fa-phone-alt me-3"></i>(69) 3216-3400</p>
    <p><i class="fa fa-envelope me-3"></i>sti@fiero.org.br</p>
    {{--
    <div class="d-flex pt-2">
        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
    </div>
    --}}
</div>
<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
    <h5 class="text-white mb-4">Páginas</h5>
    <a class="btn btn-link" href="{{ route('projetos') }}">Projetos</a>
    <a class="btn btn-link" href="{{ route('equipe') }}">Equipe</a>
    <a class="btn btn-link" href="{{ route('capda') }}">Certificação</a>
    <a class="btn btn-link" href="{{ route('contato') }}">Contato</a>
</div>

<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
    <h5 class="text-white mb-4">Mais</h5>
    <a class="btn btn-link" href="{{ route('termo') }}">Termo de Consentimento</a>
    <a class="btn btn-link" href="{{ route('quem_somos') }}">Quem Somos</a>
    <a class="btn btn-link" href="https://portal.fiero.org.br/senai" target="_blank">Portal SENAI/RO</a>
    <a class="btn btn-link" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalDetalhes">Detalhes do site</a>
</div>