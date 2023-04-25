@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])

<div class="container-fluid my-5 py-2">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Resumo do assunto</h5>
                </div>
                <div class="accordion" id="accordionRental">
                    <div class="accordion-item mb-3">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button border-bottom font-weight-bold collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="false"
                                aria-controls="collapseOne1">
                                <h6>Atividades</h6>
                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                    aria-hidden="true"></i>
                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                    aria-hidden="true"></i>
                            </button>
                        </h5>
                        <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1"
                            data-bs-parent="#accordionRental" style="">
                            <div class="accordion-body text-sm opacity-8">
                                <div class="table-responsive">
                                    <div
                                        class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                                        <div class="dataTable-top">
                                            <div class="dataTable-dropdown"><label><select class="dataTable-selector">
                                                        <option value="5">5</option>
                                                        <option value="10" selected="">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25">25</option>
                                                    </select> entries per page</label></div>
                                            <div class="dataTable-search"><input class="dataTable-input"
                                                    placeholder="Search..." type="text"></div>
                                        </div>
                                        <div class="dataTable-container" style="height: 184.641px;">
                                            <table class="table table-flush dataTable-table" id="datatable-basic">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                            data-sortable="false" style="width: 26.5134%;">
                                                            <a href="#" class="dataTable-sorter">Assunto</a>

                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                            data-sortable="false" style="width: 26.5134%;">
                                                            <a href="#" class="dataTable-sorter">Status</a>

                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 desc"
                                                            data-sortable="" style="width: 45.4081%;"><a href="#"
                                                                class="dataTable-sorter">
                                                                Creation Date
                                                            </a></th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                            data-sortable="false" style="width: 26.5134%;">
                                                            Tags
                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                            data-sortable="false" style="width: 26.5134%;">
                                                            Ações
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $dados_assunto as $key => $dado_assunto)
                                                    <tr>
                                                        <td class="text-sm font-weight-normal">
                                                            <span class="my-2 text-xs">
                                                                {{ $dado_assunto->assunto_nome }}
                                                            </span>
                                                        </td>
                                                        <td class="text-sm font-weight-normal">
                                                            <span class="my-2 text-xs">
                                                                {{ $dado_assunto->atividade_status }}
                                                            </span>
                                                        </td>
                                                        <td class="text-sm font-weight-normal">
                                                            {{ $carbon::parse($dado_assunto->atividade_data)->format('d/m/Y') }}
                                                            -
                                                            {{ $carbon::parse($dado_assunto->atividade_tempo)->format('d/m/Y')  }}
                                                        </td>
                                                        <td class="text-sm font-weight-normal">
                                                            <span class="my-2 text-xs">
                                                                {{ $dado_assunto->atividade_tags }}
                                                            </span>
                                                        </td>
                                                        <td class="text-sm">
                                                            @if ($dado_assunto->atividade_status === 'em estudo')
                                                            <span class="d-flex">
                                                                <a href="{{ route('atividade.showAtividade', $dado_assunto->id) }}"
                                                                    class="me-3" data-bs-toggle="tooltip"
                                                                    data-bs-original-title="visualizar atividade">
                                                                    <i class="fas fa-user-edit text-secondary"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </span>
                                                            @else
                                                            <span class="d-flex">
                                                                <i class="fas fa-user-edit text-secondary"
                                                                    aria-hidden="true"></i>
                                                            </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="dataTable-bottom">
                                            <div class="dataTable-info">Showing 1 to 3 of 3 entries</div>
                                            <nav class="dataTable-pagination">
                                                <ul class="dataTable-pagination-list"></ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- accordion exercicios do assunto --}}
                <div class="accordion" id="accordionRental">
                    <div class="accordion-item mb-3">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button border-bottom font-weight-bold collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOneExercicio" aria-expanded="false"
                                aria-controls="collapseOneExercicio">
                                <h6>Exercícios</h6>
                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                    aria-hidden="true"></i>
                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                    aria-hidden="true"></i>
                            </button>
                        </h5>
                        <div id="collapseOneExercicio" class="accordion-collapse collapse" aria-labelledby="headingOne1"
                            data-bs-parent="#accordionRental" style="">
                            <div class="accordion-body text-sm opacity-8">
                                <div class="table-responsive">
                                    <div
                                        class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                                        <div class="dataTable-top">
                                            <div class="dataTable-dropdown"><label><select class="dataTable-selector">
                                                        <option value="5">5</option>
                                                        <option value="10" selected="">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25">25</option>
                                                    </select> entries per page</label></div>
                                            <div class="dataTable-search"><input class="dataTable-input"
                                                    placeholder="Search..." type="text"></div>
                                        </div>
                                        <div class="dataTable-container" style="height: 184.641px;">
                                            <table class="table table-flush dataTable-table" id="datatable-basic">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                            data-sortable="false" style="width: 26.5134%;">
                                                            Assunto
                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 desc"
                                                            data-sortable="" style="width: 45.4081%;"><a href="#"
                                                                class="dataTable-sorter">
                                                                Data
                                                            </a></th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                            data-sortable="false" style="width: 26.5134%;">
                                                            Quantidade
                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                            data-sortable="false" style="width: 26.5134%;">
                                                            Status
                                                        </th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                            data-sortable="false" style="width: 26.5134%;">
                                                            Ações
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $exercicios as $key => $exercicio)
                                                    <tr>
                                                        <td class="text-sm font-weight-normal">
                                                            <span class="my-2 text-xs">
                                                                {{ $exercicio->assunto_nome }}
                                                            </span>
                                                        </td>
                                                        <td class="text-sm font-weight-normal">
                                                            {{ $carbon::parse($exercicio->updated_at)->format('d/m/Y') }}
                                                        </td>
                                                        <td class="text-sm font-weight-normal">
                                                            <span class="my-2 text-xs">
                                                                {{ $exercicio->exer_quantidade }}
                                                            </span>
                                                        </td>

                                                        <td class="text-sm font-weight-normal">
                                                            <span class="my-2 text-xs">
                                                                {{ $exercicio->exer_status }}
                                                            </span>
                                                        </td>
                                                        <td class="text-sm">
                                                            @if ($exercicio->exer_status != 'finalizada')
                                                            <span class="d-flex">
                                                                <a href="{{ route('atividade.showAtividade', $exercicio->id) }}"
                                                                    class="me-3" data-bs-toggle="tooltip"
                                                                    data-bs-original-title="visualizar atividade">
                                                                    <i class="fas fa-user-edit text-secondary"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </span>
                                                            @else
                                                            <span class="d-flex">
                                                                <i class="fas fa-user-edit text-secondary"
                                                                    aria-hidden="true"></i>
                                                            </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="dataTable-bottom">
                                            <div class="dataTable-info">Showing 1 to 3 of 3 entries</div>
                                            <nav class="dataTable-pagination">
                                                <ul class="dataTable-pagination-list"></ul>
                                            </nav>
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

</div>



@endsection