@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card card-body">
                <div class="col-sm-auto col-4">
                    <div class="h-100">
                        <h6 class="mb-1 font-weight-bolder">
                            {{ $planos->plano_nome}} - {{ $carbon::parse($planos->plano_data)->format('Y') }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Resumo do meu desempenho geral</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-3 col-6 text-center">
                            <div class="border-dashed border-1 border-secondary border-radius-md py-3">
                                <h6 class="text-primary mb-0">Total Atividades</h6>
                                <h4 class="font-weight-bolder"><span id="state1"
                                        countto="23980">{{ $count_atividade }}</span></h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 text-center">
                            <div class="border-dashed border-1 border-secondary border-radius-md py-3">
                                <h6 class="text-primary mb-0">Exercícios Resolvidos</h6>
                                <h4 class="font-weight-bolder"><span id="state1" countto="23980">{{ $count }}</span>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 text-center">
                            <div class="border-dashed border-1 border-secondary border-radius-md py-3">
                                <h6 class="text-primary mb-0">Assuntos Estudados</h6>
                                <h4 class="font-weight-bolder"><span id="state1" countto="23980">{{ $count }}</span>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 text-center">
                            <div class="border-dashed border-1 border-secondary border-radius-md py-3">
                                <h6 class="text-primary mb-0">Produtividade</h6>
                                <h4 class="font-weight-bolder"><span id="state1" countto="23980">{{ $count }}</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 col-lg-7">
            <div class="card mb-3 mt-lg-0 mt-4">
                <div class="card-header pb-0">
                    <h6>Conteúdo</h6>
                </div>
                <div class="card-body p-3">
                    <div class="accordion-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mx-auto">
                                    @foreach ($disciplinas as $key => $disciplina)
                                    <div class="accordion" id="accordionRental">
                                        <div class="accordion-item mb-3">
                                            <h5 class="accordion-header" id="headingOne">
                                                <button
                                                    class="accordion-button border-bottom font-weight-bold collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne{{ $key }}" aria-expanded="false"
                                                    aria-controls="collapseOne{{ $key }}">
                                                    <h6>{{ $disciplina->disciplina_none }}</h6>

                                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                        aria-hidden="true"></i>
                                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </h5>
                                            <div id="collapseOne{{ $key }}" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne{{ $key }}" data-bs-parent="#accordionRental"
                                                style="">
                                                <div class="accordion-body text-sm opacity-8">

                                                    <div class="">
                                                        @foreach ($disciplina->assuntos as $assunto)
                                                        <div class="d-flex justify-content-between">
                                                            <span class="mb-2 text-sm">
                                                                <i class="fa-solid fa-angles-right aria-hidden="
                                                                    true""></i> {{ $assunto->assunto_nome }}
                                                            </span>
                                                            <span class="text-dark font-weight-bold ms-2"><a
                                                                    href="{{ route('atividade.create') }}"
                                                                    class="text-primary text-sm icon-move-right my-auto text-end">criar
                                                                    atividade
                                                                    <i class="fas fa-arrow-right text-xs ms-1"
                                                                        aria-hidden="true"></i>
                                                                </a></span>
                                                        </div>
                                                        <hr class="horizontal light" style="margin:1%">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5">
            <div class="card mb-3 mt-lg-0 mt-4">
                <div class="card-header pb-0">
                    <h6>Timeline de Atividades</h6>
                </div>
                <div class="card-body p-3">

                    <div class="timeline timeline-one-side" data-timeline-axis-style="dotted">
                        @foreach ($atividades as $item)
                        <div class="timeline-block mb-3">

                            @if ($item->atividade_data > date("Y-m-d"))
                            <span class="timeline-step">
                                <i class="ni ni-bell-55 text-info text-gradient"></i>
                            </span>
                            @else
                            @if ($item->atividade_data == date("Y-m-d"))
                            <span class="timeline-step">
                                <i class="ni ni-bell-55 text-warning text-gradient"></i>
                            </span>
                            @else
                            <span class="timeline-step">
                                <i class="ni ni-bell-55 text-danger text-gradient"></i>
                            </span>
                            @endif
                            @endif
                            <div class="timeline-content">
                                <h6 class="text-dark  font-weight-bold mb-0">
                                    {{ ucwords($item->disciplina_none)  }} -
                                    {{ Str::ucfirst($item->assunto_nome)  }}
                                </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    de {{ $carbon::parse($item->atividade_data)->format('d/m/Y') }} até
                                    {{ $carbon::parse($item->atividade_tempo)->format('d/m/Y')  }}
                                </p>
                                <p class="text-sm mt-3 mb-2">
                                    {{ $item->atividade_observacao }}
                                </p>
                                @if ($item->atividade_prioridade == 'altissima')
                                <span class="badge badge-sm bg-gradient-danger">{{ $item->atividade_prioridade }}</span>
                                @else
                                @if ($item->atividade_prioridade == 'alta')
                                <span
                                    class="badge badge-sm bg-gradient-warning">{{ $item->atividade_prioridade }}</span>
                                @else
                                @if ($item->atividade_prioridade == 'media')
                                <span
                                    class="badge badge-sm bg-gradient-primary">{{ $item->atividade_prioridade }}</span>
                                @else
                                <span
                                    class="badge badge-sm bg-gradient-secondary">{{ $item->atividade_prioridade }}</span>
                                @endif
                                @endif
                                @endif

                                @foreach (explode(',', $item->atividade_tags) as $info)
                                - <span class="badge bg-gradient-info badge-sm">{{ $info }}</span>
                                @endforeach
                                <a class="text-sm text-secondary d-flex justify-content-end font-weight-bold mb-0 icon-move-right mt-2"
                                    href="{{ route('atividade.showAtividade', $item->id) }}">

                                    <i class="fas fa-eye text-secondary  ms-1" title="Ver atividade"
                                        aria-hidden="true"></i>
                                </a>
                            </div>

                        </div>

                        @endforeach
                    </div>

                </div>
            </div>
            <div class="card mb-3 mt-lg-0 mt-4">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize">To do list</h5>
                    <small class="text-xs">{{date('d/m/Y') }}</small>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-group list-group-flush" data-toggle="checklist">
                        <li class="checklist-entry list-group-item px-0">
                            <div class="checklist-item checklist-item-success checklist-item-checked d-flex">
                                <div class="checklist-info">
                                    <h6 class="checklist-title mb-0">Meta do dia</h6>

                                </div>
                                <div class="form-check my-auto ms-auto">
                                    {{ $count_exe }}
                                </div>
                            </div>
                        </li>
                        <li class="checklist-entry list-group-item px-0">
                            <div class="checklist-item checklist-item-warning d-flex">
                                <div class="checklist-info">
                                    <h6 class="checklist-title mb-0">Atividades do dia</h6>
                                </div>
                                <div class="form-check my-auto ms-auto">
                                    {{ $count_atividades }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 mb-4 mb-lg-0">

        </div>
        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">

        </div>
    </div>
    {{-- <div class="row mt-5">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Sales by Country</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <tbody>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="./img/icons/flags/US.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Country:</p>
                                            <h6 class="text-sm mb-0">United States</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                        <h6 class="text-sm mb-0">2500</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                                        <h6 class="text-sm mb-0">$230,900</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                        <h6 class="text-sm mb-0">29.9%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="./img/icons/flags/DE.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Country:</p>
                                            <h6 class="text-sm mb-0">Germany</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                        <h6 class="text-sm mb-0">3.900</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                                        <h6 class="text-sm mb-0">$440,000</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                        <h6 class="text-sm mb-0">40.22%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="./img/icons/flags/GB.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Country:</p>
                                            <h6 class="text-sm mb-0">Great Britain</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                        <h6 class="text-sm mb-0">1.400</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                                        <h6 class="text-sm mb-0">$190,700</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                        <h6 class="text-sm mb-0">23.44%</h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="./img/icons/flags/BR.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Country:</p>
                                            <h6 class="text-sm mb-0">Brasil</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                        <h6 class="text-sm mb-0">562</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                                        <h6 class="text-sm mb-0">$143,960</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-sm">
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                        <h6 class="text-sm mb-0">32.14%</h6>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Categories</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                    <span class="text-xs">250 in stock, <span class="font-weight-bold">346+
                                            sold</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button
                                    class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                        class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-tag text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                    <span class="text-xs">123 closed, <span class="font-weight-bold">15
                                            open</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button
                                    class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                        class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-box-2 text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                    <span class="text-xs">1 is active, <span class="font-weight-bold">40
                                            closed</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button
                                    class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                        class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-satisfied text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                    <span class="text-xs font-weight-bold">+ 430</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button
                                    class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                        class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection

@push('js')
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
</script>
@endpush