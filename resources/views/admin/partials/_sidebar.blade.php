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

                <li class="sidebar-title">- Gerenciar contas</li>

                <li class="sidebar-item  ">
                    <a href="{{ route('admin.usuarios') }}" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                        <span>Usuários</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="form-layout.html" class='sidebar-link'>
                    <i class="bi bi-person-bounding-box"></i>
                        <span>Perfis</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>