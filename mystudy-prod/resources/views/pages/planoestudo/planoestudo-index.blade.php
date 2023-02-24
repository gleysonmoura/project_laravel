@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav-home', ['title' => 'Plano de Estudo'])
@include('layouts.navbars.auth.sidenav-home')
<div class="container-fluid py-4">
    {{-- DIV ALERT --}}
    <div class="row mt-2 mx-4 col-12">
        @include('alert-notification')
    </div>
    <div class="row mt-4 ">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <h6 class="mb-0">Planos de Estudos</h6>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('planoestudo.create') }}"
                                    class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Add
                                    Plano</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Plano</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Data da prova</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        Dias estudados</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                        ações</th>
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
                                            @php
                                            $hoje = new DateTime();
                                            /* calculo de dias estudos a aparti da data de criação do plano */
                                            $diferenca = $hoje->diff(new DateTime($item->created_at));

                                            /* calculo para saber quantos dias falta para a data provavel da prova */
                                            $data_prova = $hoje->diff(new DateTime($item->plano_data));
                                            /* echo $diferenca->format('%a days');
                                            */@endphp
                                            <div class="progress-wrapper">
                                                <div class="progress-info">
                                                    <div class="progress-percentage">
                                                        <span class="text-sm font-weight-bold">dias
                                                            {{ $diferenca->format(" %a" ) }}</span>
                                                        <span class="text-sm font-weight-bold">dias para prova{{
                                                            $data_prova->format(" %a" ) }}</span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                        aria-valuenow="{{ $diferenca->format(" %a" ) }}"
                                                        aria-valuemin="0" aria-valuemax="{{ $data_prova->format(" %a" )
                                                        }}" style="width: {{ $diferenca->format(" %a" ) }}%;">
                                                        {{ $diferenca->format(" %a" ) }}%</div>
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
                                <div class=" bg-gradient-default">
                                    <div class="card-body">
                                        <h5 class="card-title text-info text-warning">Olá,
                                            {{ ucwords(auth()->user()->firstname)   }}
                                            {{ ucwords(auth()->user()->lastname) }}
                                        </h5>
                                        <blockquote class="blockquote text-white mb-0">
                                            <p class="text-dark ms-3">Você ainda não tem um plano de estudo!</p>
                                            <footer class="blockquote-footer text-secondary text-sm ms-3">
                                                Faça o cadastro e comece seus estudos.
                                            </footer>
                                        </blockquote>
                                    </div>
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