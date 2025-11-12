<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{ route('login') }}" class="d-inline-block mb-3">
        <h2 class="text-white">
            {{ __('footer.col1.titulo') }}
        </h2>
    </a>
    <p class="mb-0">
        {{ __('footer.col1.descricao') }}
    </p>
</div>
<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
    <h5 class="text-white mb-4">
        {{ __('footer.col2.titulo') }}
    </h5>
    <p><i class="fa fa-map-marker-alt me-3"></i>Rua Rui Barbosa, 1112, Arigolândia</p>
    <p><i class="fa fa-map-location me-3"></i>Porto Velho - RO, Brasil</p>
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
    <h5 class="text-white mb-4">
        {{ __('footer.col3.titulo') }}
    </h5>
    <a class="btn btn-link" href="{{ route('projetos') }}">
    {{ __('footer.col3.projetos') }}</a>
    <a class="btn btn-link" href="{{ route('equipe') }}">
        {{ __('footer.col3.equipe') }}
    </a>
    <a class="btn btn-link" href="{{ route('capda') }}">
        {{ __('footer.col3.certificacao') }}
    </a>
    <a class="btn btn-link" href="{{ route('contato') }}">
        {{ __('footer.col3.contato') }}
    </a>
</div>

<div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
    <h5 class="text-white mb-4">
        {{ __('footer.col4.titulo') }}
    </h5>
    <a class="btn btn-link" href="{{ route('termo') }}">
        {{ __('footer.col4.termoConsentimento') }}
    </a>
    <a class="btn btn-link" href="{{ route('quem_somos') }}">
        {{ __('footer.col4.quemSomos') }}
    </a>
    <a class="btn btn-link" href="https://portal.fiero.org.br/senai" target="_blank">
        {{ __('footer.col4.portalSENAI') }}
    </a>
    <a class="btn btn-link" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalDetalhes">
        {{ __('footer.col4.detalhes') }}
    </a>
</div>