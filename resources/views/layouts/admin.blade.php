<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Projetos STI</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}"/>
</head>

<body>
    <div id="app">
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
                            <a href="index.html" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                                <span>Equipe</span>
                            </a>
                        </li>

                        <li class="sidebar-title">- Gerenciar perfis</li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                                <span>Usuários</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="form-element-input.html">Redefinir senha</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-input-group.html">Atribuir perfil</a>
                                </li>
                            </ul>
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
        <div id="main">
            @if (session('toast_success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible show fade text-white">
                        {{ session('toast_success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @elseif (session('toast_error'))
                <div class="alert alert-danger alert-dismissible show fade text-white">
                    {{ session('toast_error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>
                    <a href="{{ route($urlBack ?? 'admin.menu') }}"><i class="bi bi-chevron-left"></i></a>
                     {{ $title ?? ''}}
                </h3>
            </div>
            <div class="page-content">
                <section class="row">

                    @yield('content')

                </section>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin/pages/dashboard.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/admin/main.js') }}"></script>
</body>

</html>