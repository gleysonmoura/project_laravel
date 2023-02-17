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
                                <li><a class="dropdown-item text-white"
                                        href="{{ route('atividade.finalizaratividade', $item->id) }}">Finalizar
                                        Atividade</a></li>
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
                    <a type="submit" href="{{ URL::previous() }}"
                        class="btn bg-gradient-primary btn-sm float-end mt-6 mb-0">Voltar</a>
                </div>
                @endforeach
            </div>
            <div class="col-12 col-lg-12 mt-4">
                <div class="col-12 col-md-12 mb-4 mb-md-0">
                    <div class="card bg-gradient-dark">
                        <div class="card-body">
                            <div class="mb-2">
                                <sup class="text-white">%</sup> <span
                                    class="h2 text-white">{{ number_format($count_porcentagem,2,",",".");  }}</span>
                                <div class="text-white opacity-8 mt-2 text-sm">Desempenho do Assunto</div>
                                <div>
                                    <span class="text-success font-weight-600">{{ $count_quantidade_total }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer pt-0">
                            <div class="row">
                                <div class="col">
                                    <small class="text-white opacity-8">Certas: {{ $count_quantidade_certas }}</small>
                                    <div class="progress progress-xs my-2">
                                        <div class="progress-bar bg-success" aria-valuemin="0"
                                            aria-valuemax="{{ $count_quantidade_total }}"
                                            style="width: {{ $count_quantidade_certas }}%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col"><small class="text-white opacity-8">Erradas:
                                        {{ $count_quantidade_erradas }}</small>
                                    <div class="progress progress-xs my-2">
                                        <div class="progress-bar bg-warning"
                                            style="width: {{ $count_quantidade_erradas }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.exercicio.create-exercicio')
@endsection