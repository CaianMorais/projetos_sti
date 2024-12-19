<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.menu') }}">Admin STI</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">- Gerenciar conteúdo</li>

                <li class="sidebar-item ">
                    <a href="{{ route('admin.projetos') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Projetos</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('admin.equipe') }}" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                        <span>Equipe</span>
                    </a>
                </li>

                <li class="sidebar-title">- Gerenciar contatos</li>

                <li class="sidebar-item ">
                    <a href="{{ route('admin.solicitacoes_contato') }}" class='sidebar-link'>
                    <i class="bi bi-telephone"></i>
                        <span>Solicitações de contato</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="#" class='sidebar-link'>
                    <i class="bi bi-telephone"></i>
                        <span>Contato via projeto</span>
                    </a>
                </li>

                @if(auth()->user()->perfil_id == 3)

                <li class="sidebar-title">- Gerenciar dados</li>

                <li class="sidebar-item  ">
                    <a href="{{ route('admin.usuarios') }}" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                        <span>Usuários</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="{{ route('admin.perfis') }}" class='sidebar-link'>
                    <i class="bi bi-person-bounding-box"></i>
                        <span>Perfis</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="#" class='sidebar-link'>
                    <i class="bi bi-cloud-fill"></i>
                        <span>Contatos armazenados</span>
                    </a>
                </li>

                @endif

                <li class="sidebar-item ">
                    <a href="{{ route('home') }}" class='sidebar-link text-danger'>
                    <i class="bi bi-door-open-fill text-danger"></i>
                        <span>Sair do Admin STI</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>