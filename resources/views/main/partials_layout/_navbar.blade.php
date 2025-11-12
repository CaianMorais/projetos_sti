<nav class="navbar navbar-expand-lg navbar-dark p-0">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img class="img-fluid" src="{{ asset('img/senai_negativo.svg') }}" width="100" height="50">
    </a>
    <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    @php
        use Illuminate\Support\Facades\App;

        $locale = App::getLocale();
        $flag = $locale === 'en' ? 'us.svg' : 'br.svg';
        $alt = $locale === 'en' ? 'English' : 'Português';
    @endphp
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
            <a href="{{ route('home') }}" class="nav-item nav-link">
                {{ __('navbar.inicio') }}
            </a>
            <a href="{{ route('projetos') }}" class="nav-item nav-link">
                {{ __('navbar.projetos') }}
            </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    {{ __('navbar.paginas.paginas') }}
                </a>
                <div class="dropdown-menu bg-light mt-2">
                    <a href="{{ route('quem_somos') }}" class="dropdown-item">
                        {{ __('navbar.paginas.quemSomos') }}
                    </a>
                    <a href="{{ route('equipe') }}" class="dropdown-item">
                        {{ __('navbar.paginas.nossoTime') }}
                    </a>
                    <a href="{{ route('capda') }}" class="dropdown-item">{{ __('navbar.paginas.capda') }}</a>
                </div>
            </div>
            <a href="{{ route('contato') }}" class="nav-item nav-link">
                {{ __('navbar.contato') }}
            </a>
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
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="{{ asset("img/$flag") }}" alt="{{ $alt }}" width="20" height="20"></a>
                <div class="dropdown-menu bg-light mt-2">
                    <a href="{{ url('lang/en') }}" class="dropdown-item"><img src="{{ asset('img/us.svg') }}" alt="English" width="20" height="20"> English (beta)</a>
                    <a href="{{ url('lang/pt_BR') }}" class="dropdown-item"><img src="{{ asset('img/br.svg') }}" alt="Português" width="20" height="20"> Português</a>
                </div>
            </div>
        </div>
        {{--
        <butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
            data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
        --}}
    </div>
</nav>