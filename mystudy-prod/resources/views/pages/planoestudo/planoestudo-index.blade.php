@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav-home', ['title' => 'Plano de Estudo'])
@include('layouts.navbars.auth.sidenav-home')
<div class="container-fluid py-4">
    <div class="row ">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h6>Plano de Estudo</h6>
                    <a href="{{ route('planoestudo.create') }}"
                        class="btn bg-gradient-primary btn-sm float-end mb-0">Add
                        Tag</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                </div>
            </div>
        </div>

        <div class="col-12">
            @include('alert-notification')
        </div>
    </div>

    <div class="row ">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Planos de Estudos</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Data</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Plano</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Progresso</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($planos as $item)
                                <tr>
                                    <td>
                                        <span class="badge badge-sm bg-gradient-info ">{{ $item->plano_status }}</span>
                                        <span class="text-xs font-weight-bold"></span>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">{{ $item->plano_nome }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">
                                            {{ $carbon::parse($item->plano_data)->format('d/m/Y') }}
                                        </p>
                                    </td>

                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar"
                                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="d-flex">
                                            <a href="{{ route('planoestudo.show', $item->id) }}"
                                                class="text-sm text-center text-secondary d-flex justify-content-end font-weight-bold mb-0 icon-move-right mt-2">
                                                Ir<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                            </a>

                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <div class="col-md-6 centered alert alert-warning alert-block fade show" role="alert">
                                    Não há Plano de Estudos cadastrados! <a href="{{route('planoestudo.create')}}"
                                        class="alert-link">Cadastrar Plano de Estudos</a>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection