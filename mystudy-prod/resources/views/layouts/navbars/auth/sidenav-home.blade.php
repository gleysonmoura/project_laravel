<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer opacity-5 position-absolute end-0 top-0 d-none d-xl-none text-white opacity-8"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="http://127.0.0.1:8000/dashboard" target="_blank">
            <img src="http://127.0.0.1:8000/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">My Study Dashboard</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto ps ps--active-y" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-laravel" style="color: #f4645f;" aria-hidden="true"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Ações</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="http://127.0.0.1:8000/profile">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('planoestudo.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Planos de Estudos</span>
                </a>
            </li>
        </ul>
    </div>
</aside>