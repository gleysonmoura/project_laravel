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
                                    class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;
                                    Add
                                    Plano</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    {{-- <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                        Status</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                        Plano</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                        Data da prova</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                        Dias estudados</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
                                        Dias para a prova</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">
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
                        @php
                        $hoje = new DateTime();
                        /* calculo de dias estudos a aparti da data de criação do plano */
                        $diferenca = $hoje->diff(new DateTime($item->created_at));

                        /* calculo para saber quantos dias falta para a data provavel da prova */
                        $data_prova = $hoje->diff(new DateTime($item->plano_data));
                        /* echo $diferenca->format('%a days');
                        */@endphp

                        {{ $diferenca->format(" %a" ) }} dias
                    </td>
                    <td class="align-middle text-center">{{ $data_prova->format(" %a" ) }} dias</td>
                    <td class="text-sm">
                        <span class="d-flex">
                            <form action="{{ route('planoestudo.destroy', $item->id) }}" class="delete_form"
                                method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button data-bs-toggle="tooltip" data-bs-original-title="Delete item"
                                    class="border-0 bg-default">
                                    <i class="fas fa-trash text-secondary" aria-hidden="true"></i>
                                </button>
                            </form>
                            <a href="{{ route('planoestudo.show', $item->id) }}" class="text-sm text-center text-secondary d-flex justify-content-end
                                            font-weight-bold mb-0 icon-move-right ms-3">
                                Ir<i class="fas fa-arrow-right text-sm ms-3" aria-hidden="true"></i>
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
                </div> --}}
            </div>
        </div>
    </div>
    @forelse ( $planos as $item )
    <div class="col-12 col-lg-6">
        <div class="card mt-4">
            <div class="card-body p-3">
                <div class="d-flex">
                    <div class="avatar avatar-lg">
                        <i class="fa-solid fa-person-chalkboard fa-xl"></i>
                    </div>
                    <div class="ms-3 my-auto">
                        <h6 class="mb-0">{{ strtoupper($item->plano_nome) }}</h6>
                        <p class="text-xs mb-0">{{ $carbon::parse($item->plano_data)->format('d/m/Y') }}</p>

                    </div>
                    <div class="ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-link text-secondary ps-0 pe-2" title="Ações"
                                id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-lg" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3"
                                aria-labelledby="navbarDropdownMenuLink" style="">
                                <a class="dropdown-item" href="javascript:;">Editar</a>
                                <form action="{{ route('planoestudo.destroy', $item->id) }}" class="delete_form"
                                    method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class=" dropdown-item">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mt-3"> You have an upcoming meet for Marketing Planning</p>
                <span class="badge badge-sm bg-gradient-warning ">{{ $item->plano_status }}</span>
                <hr class="horizontal light">
                <div class="d-flex">
                    <a href="{{ route('planoestudo.show', $item->id) }}"
                        class="btn bg-gradient-primary btn-sm float-end mt-2 mb-0">
                        Estudar
                    </a>

                </div>
            </div>
        </div>

    </div>
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
    @foreach ($planos as $item)


    @endforeach





</div>

</div>


@endsection