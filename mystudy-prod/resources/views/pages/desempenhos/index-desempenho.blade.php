@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Desempenho'])

<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12 col-md-8 mb-4 mb-md-0">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <h6 class="mb-0">Estatísticas de Assuntos</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Assunto</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Certas</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Erradas</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    %</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desempenhos as $desempenho)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        {{ $desempenho->assunto_nome }}
                                    </div>
                                </td>
                                <td>
                                    {{ $desempenho->desempenho_certas }}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    {{ $desempenho->desempenho_erradas }}
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{ $desempenho->desempenho_porcentagem }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Assuntos Baixo Aproveitamento</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach ($dados_atividade as $item)

                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">{{ $item->assunto_nome }}</h6>
                                    <span class="text-xs">último estudo<span class="font-weight-bold">
                                            {{ $item->updated_at }}</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button
                                    class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                        class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection