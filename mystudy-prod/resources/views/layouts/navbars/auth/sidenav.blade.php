<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps ps--active-y bg-default"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer opacity-5 position-absolute end-0 top-0 d-none d-xl-none text-white opacity-8"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0">
            <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/logo-ct.png"
                class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">My Study Dashboard</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link collapsed"
                    aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboards</span>
                </a>
                <div class="collapse" id="dashboardsExamples" style="">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
                                <span class="sidenav-mini-icon"> V </span>
                                <span class="sidenav-normal"> Virtual Reality <b class="caret"></b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tagplano" class="nav-link collapsed" aria-controls="tagplano"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Planos de Estudos</span>
                </a>
                <div class="collapse" id="tagplano" style="">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('planoestudo.index') }}">
                                <span class="sidenav-mini-icon"> L </span>
                                <span class="sidenav-normal"> Index </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PAGES</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples"
                    class="nav-link {{ request()->routeIs('atividade.*') ? 'active':'' }}" aria-controls="pagesExamples"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Atividades</span>
                </a>
                <div class="collapse {{ request()->routeIs('atividade.*') ? ' font-weight-bolder collapse show':'' }}"
                    id="pagesExamples" style="">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('atividade.index') }}">
                                <span class="sidenav-normal"> Index </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('atividade.create') }}">
                                <span class="sidenav-normal"> Criar </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('atividade.index') }}">
                                <span class="sidenav-normal"> Lista </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesanotacao"
                    class="nav-link {{ request()->routeIs('anotacao.*') ? 'active':'' }}" aria-controls="pagesanotacao"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Anotações</span>
                </a>
                <div class="collapse {{ request()->routeIs('anotacao.*') ? ' font-weight-bolder collapse show':'' }}"
                    id="pagesanotacao" style="">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('anotacao.index') }}">
                                <span class="sidenav-normal"> Index </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('anotacao.create') }}">
                                <span class="sidenav-normal"> Criar </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('anotacao.index') }}">
                                <span class="sidenav-normal"> Lista </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tagconteudo"
                    class="nav-link {{ request()->routeIs('conteudo.*') ? 'active':'' }}" aria-controls="tagconteudo"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Conteúdos</span>
                </a>
                <div class="collapse " id="tagconteudo">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('conteudo.index') }}">
                                <span class="sidenav-normal"> Index </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tagexercicio"
                    class="nav-link {{ request()->routeIs('exercicio.*') ? 'active':'' }}" aria-controls="tagexercicio"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Exercícios</span>
                </a>
                <div class="collapse " id="tagexercicio">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('exercicio.index') }}">
                                <span class="sidenav-normal"> Index </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tagdesempenho"
                    class="nav-link {{ request()->routeIs('desempenho.*') ? 'active':'' }}"
                    aria-controls="tagdesempenho" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Desempenhos</span>
                </a>
                <div class="collapse " id="tagdesempenho">
                    <ul class="nav ms-4">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('desempenho.index') }}">
                                <span class="sidenav-normal"> Index </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <hr class="horizontal light">
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ADMIN</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tagedital" class="nav-link collapsed" aria-controls="tagedital"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-spaceship text-sm text-white"></i>
                    </div>
                    <span class="nav-link-text ms-1">Edital</span>
                </a>
                <div class="collapse " id="tagedital">
                    <ul class="nav ms-4">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('edital.index') }}">
                                <span class="sidenav-normal"> Index </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; height: 593px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 237px;"></div>
    </div>
</aside>