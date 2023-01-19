@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Atividades'])

<div class="container-fluid py-4">
    <div class="d-flex justify-content-center col-lg-12 mt-4">
        @include('alert-notification')
    </div>
    <div class="d-flex justify-content-center mb-5">

        <div class="col-lg-9 mt-lg-0 mt-4">
            <div class="card mt-4">
                @foreach ($atividadeshow as $item)
                <div class="card-header d-flex align-items-center border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <h5 class="text-dark font-weight-700 ">{{ Str::ucfirst($item->assunto_nome)  }}
                            </h5>
                            <small class="d-block mb-0 font-weight-bold text-sm">{{ ucwords($item->disciplina_none)  }}
                            </small>
                            <span class="badge badge-sm bg-gradient-danger mt-4">Prioridade
                                {{ $item->atividade_prioridade }}</span>
                        </div>
                    </div>
                    <div class="text-end ms-auto">
                        <div class="dropdown">
                            <button class="btn bg-gradient-info btn-sm dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Ações
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item text-white" data-bs-toggle="modal"
                                        data-bs-target="#Modaladdmeta" href="#">Add Meta</a></li>
                                <li><a class="dropdown-item text-white" href="{{ route('notas.index') }}">Add
                                        anotações</a></li>
                                <li><a class="dropdown-item text-white" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        {{-- <a type="submit" href="{{ route('metaquestao.create') }}"
                        class="btn bg-gradient-primary btn-sm float-end mt-6 mb-0">Voltar</a> --}}
                    </div>
                </div>
                <div class="card-body p-3">
                    <span class="mb-0 font-weight-bold text-sm">Observação</span>
                    <p class="text-sm">
                        @foreach (explode(';', $item->atividade_observacao) as $info)
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <i class="fa-solid fa-terminal fa-2xs"></i>
                            {{ ucwords($info)}}
                        </li>
                    </ul>
                    @endforeach
                    </p>
                    <hr class="horizontal gray-light my-2">
                    <span class="mb-0 font-weight-bold text-sm">Você tem que</span>
                    <p>
                        @foreach (explode(',', $item->atividade_plano) as $info)
                        <span class="badge bg-gradient-info text-white badge-sm">{{ $info }}</span>
                        @endforeach
                    </p>
                    <hr class="horizontal gray-light my-2">
                    <span class="mb-0 font-weight-bold text-sm">Data de Inicio e termino</span> </br>

                    <span
                        class="badge badge-pill bg-gradient-secondary">{{ $carbon::parse($item->atividade_data)->format('d/m/Y')  }}</span>
                    <span
                        class="badge badge-pill bg-gradient-secondary">{{ $carbon::parse($item->atividade_tempo)->format('d/m/Y')  }}</span>

                    <a type="submit" href="{{ URL::previous() }}"
                        class="btn bg-gradient-primary btn-sm float-end mt-6 mb-0">Voltar</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('pages.metaquestao.create-metaquestao')
@endsection