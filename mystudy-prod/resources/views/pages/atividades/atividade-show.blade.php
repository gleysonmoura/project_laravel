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
                            <h5 class="text-white font-weight-700 mt-lg-0 mt-4">{{ Str::ucfirst($item->assunto_nome)  }}
                            </h5>
                            <small
                                class="d-block mb-0 text-white font-weight-bold text-sm">{{ ucwords($item->disciplina_none)  }}
                            </small>

                            <div class="rating mt-4">
                                <span class="mb-0 text-white font-weight-bold text-sm">Incidência de Prova</span>
                                @if ($item->atividade_prioridade == 'baixa')
                                <i class="fas fa-star text-primary" aria-hidden="true"></i>
                                @else
                                @if ($item->atividade_prioridade == 'média')
                                <i class="fas fa-star text-success" aria-hidden="true"></i>
                                <i class="fas fa-star text-success" aria-hidden="true"></i>
                                @else
                                @if ($item->atividade_prioridade == 'alta')
                                <i class="fas fa-star text-warning" aria-hidden="true"></i>
                                <i class="fas fa-star text-warning" aria-hidden="true"></i>
                                <i class="fas fa-star text-warning" aria-hidden="true"></i>
                                @else
                                <i class="fas fa-star text-danger" aria-hidden="true"></i>
                                <i class="fas fa-star text-danger" aria-hidden="true"></i>
                                <i class="fas fa-star text-danger" aria-hidden="true"></i>
                                <i class="fas fa-star text-danger" aria-hidden="true"></i>
                                @endif
                                @endif
                                @endif
                                {{-- <i class="fas fa-star-half-alt" aria-hidden="true"></i> --}}
                            </div>
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
                                        data-bs-target="#Modaladdexercicio" href="#">Add Meta Exercicios</a></li>
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
                    <label class="mb-0 font-weight-bold text-sm">Observação</label>
                    {{-- <span class="mb-0 font-weight-bold text-sm">Observação</span> --}}
                    <p>
                        @foreach (explode(';', $item->atividade_observacao) as $info)
                    <ul>
                        <li class="text-white">
                            {{ ucwords($info)}}
                        </li>
                    </ul>
                    @endforeach
                    </p>
                    <hr class="horizontal gray-light my-2">
                    <div class="">
                        <label class="mb-0 font-weight-bold text-sm">Você tem que</label> <br>
                        @foreach (explode(',', $item->atividade_tags) as $info)
                        <span class="badge bg-gradient-success text-white badge-sm">{{ $info }}</span>
                        @endforeach

                    </div>
                    <hr class="horizontal gray-light my-2">
                    <div class="">
                        <label class="mb-0 font-weight-bold text-sm">Data de início e termino</label> <br>
                        <span
                            class="badge badge-pill bg-gradient-secondary badge-sm">{{ $carbon::parse($item->atividade_data)->format('d/m/Y')  }}</span>
                        <span
                            class="badge badge-pill bg-gradient-secondary badge-sm">{{ $carbon::parse($item->atividade_tempo)->format('d/m/Y')  }}</span>
                    </div>
                    <hr class="horizontal gray-light my-2">
                    <div class="mt-1">
                        @forelse ($exercicio as $exer)
                        <label class="mb-0 font-weight-bold text-sm">Você tem exercício para fazer</label> <br>
                        <span class="badge badge-warning">{{ $exer->exer_quantidade }}</span>
                        questões sobre o assunto {{ Str::ucfirst($item->assunto_nome)  }} -
                        <span class="badge c bg-gradient-danger mt-4">{{ $exer->exer_status }}</span>
                        @empty
                        @endforelse
                    </div>
                    <hr class="horizontal gray-white my-2">
                    <div class="mt-1">
                        <div class="card mb-3 mt-lg-0 mt-4">
                            <div class="card-body pb-0">
                                <div class="row align-items-center mb-3">
                                    <div class="col-9">
                                        <h5 class="mb-1">
                                            <a href="javascript:;">Digital Marketing</a>
                                        </h5>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="dropstart">
                                            <a href="javascript:;" class="text-secondary" id="dropdownMarketingCard"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                                                aria-labelledby="dropdownMarketingCard">
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Edit
                                                        Team</a>
                                                </li>
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Add
                                                        Member</a></li>
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">See
                                                        Details</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item border-radius-md text-danger"
                                                        href="javascript:;">Remove Team</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p>A group of people who collectively are responsible for all of the work necessary to
                                    produce
                                    working, validated assets.</p>
                                <ul class="list-unstyled mx-auto">
                                    <li class="d-flex">
                                        <p class="mb-0">Industry:</p>
                                        <span class="badge badge-secondary ms-auto">Marketing Team</span>
                                    </li>
                                    <li>
                                        <hr class="horizontal dark">
                                    </li>
                                    <li class="d-flex">
                                        <p class="mb-0">Rating:</p>
                                        <div class="rating ms-auto">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="horizontal dark">
                                    </li>
                                    <li class="d-flex">
                                        <p class="mb-0">Members:</p>
                                        <div class="avatar-group ms-auto">
                                            <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Alexa Tompson">
                                                <img alt="Image placeholder" src="/assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Romina Hadid">
                                                <img alt="Image placeholder" src="/assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Alexander Smith">
                                                <img alt="Image placeholder" src="/assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Martin Doe">
                                                <img alt="Image placeholder" src="/assets/img/team-4.jpg">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="mb-0 font-weight-bold text-sm">Desempenho para esse assunto</span> </br>
                        <span class="badge badge-warning badge-sm">total de {{ $count_quantidade_total }}</span>
                        <span class="badge badge-warning badge-sm">certas {{ $count_quantidade_certas }}</span>
                        <span class="badge badge-warning badge-sm">erradas {{ $count_quantidade_erradas }}</span>
                        <span class="badge badge-warning badge-sm">Aproveitamento de:
                            {{ number_format($count_porcentagem,2,",",".");  }}</span>
                        @forelse ($desempenhos as $desem)

                        @empty
                        <div class="card mb-3 mt-lg-0 mt-4">
                            <div class="card-body pb-0">
                                <div class="row align-items-center mb-3">
                                    <div class="col-9">
                                        <h5 class="mb-1">
                                            <a href="javascript:;">Digital Marketing</a>
                                        </h5>
                                    </div>

                                </div>
                                <p>A group of people who collectively are responsible for all of the work necessary to
                                    produce
                                    working, validated assets.</p>
                                <ul class="list-unstyled mx-auto">
                                    <li class="d-flex">
                                        <p class="mb-0">Industry:</p>
                                        <span class="badge badge-secondary ms-auto">Marketing Team</span>
                                    </li>
                                    <li>
                                        <hr class="horizontal dark">
                                    </li>
                                    <li class="d-flex">
                                        <p class="mb-0">Rating:</p>
                                        <div class="rating ms-auto">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="horizontal dark">
                                    </li>
                                    <li class="d-flex">
                                        <p class="mb-0">Members:</p>
                                        <div class="avatar-group ms-auto">
                                            <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Alexa Tompson">
                                                <img alt="Image placeholder" src="/assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Romina Hadid">
                                                <img alt="Image placeholder" src="/assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Alexander Smith">
                                                <img alt="Image placeholder" src="/assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-lg avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="Martin Doe">
                                                <img alt="Image placeholder" src="/assets/img/team-4.jpg">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> <label class="mb-0 font-weight-bold text-sm">Você ainda não tem desempenho
                            cadastrado</label>
                        <br>
                        @endforelse
                    </div>
                    <a type="submit" href="{{ URL::previous() }}"
                        class="btn bg-gradient-primary btn-sm float-end mt-6 mb-0">Voltar</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('pages.exercicio.create-exercicio')
@endsection