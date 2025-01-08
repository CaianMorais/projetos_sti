<nav class="navbar navbar-expand-lg navbar-dark p-0">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img class="img-fluid" src="{{ asset('img/senai_negativo.svg') }}" width="100" height="50">
    </a>
    <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
            <a href="{{ route('home') }}" class="nav-item nav-link">Início</a>
            <a href="{{ route('projetos') }}" class="nav-item nav-link">Projetos</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Páginas</a>
                <div class="dropdown-menu bg-light mt-2">
                    <a href="{{ route('quem_somos') }}" class="dropdown-item">Quem somos</a>
                    <a href="{{ route('equipe') }}" class="dropdown-item">Nossa equipe</a>
                    <a href="{{ route('capda') }}" class="dropdown-item">Certificação CAPDA</a>
                </div>
            </div>
            <a href="{{ route('contato') }}" class="nav-item nav-link">Contato</a>
            @if (auth()->check())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                    <div class="dropdown-menu bg-light mt-2">
                        @if (auth()->user()->perfil_id === 2 || auth()->user()->perfil_id === 3)
                            <a href="{{ route('admin.menu') }}" class="dropdown-item">Administração</a>
                        @endif
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" {{ __('Logout') }}>Logout</a>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endif
        </div>
        {{--
        <butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
            data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
        --}}
    </div>
</nav>