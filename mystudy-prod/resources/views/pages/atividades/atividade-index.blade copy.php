@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Atividades'])

<div class="container-fluid py-4">
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h6>Atividades</h6>
                    <a href="{{ route('atividade.create') }}" class="btn bg-gradient-primary btn-sm float-end mb-0">Add
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
    <div class="row mt-2 mx-4">
        <div class="col-lg-8 col-12">
            <div class="card">
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
                                    {{ $carbon::parse($item->atividade_data)->format('d/m/Y')  }}
                                </p>
                                <p class="text-sm mt-3 mb-2">
                                    {{ $item->atividade_observacao }}
                                </p>
                                @if ($item->atividade_prioridade == 'altissima')
                                <span class="badge badge-sm bg-gradient-danger">{{ $item->atividade_prioridade }}</span>
                                @else
                                @if ($item->atividade_prioridade == 'alta')
                                <span class="badge badge-sm bg-gradient-warning">{{ $item->atividade_prioridade }}</span>
                                @else
                                @if ($item->atividade_prioridade == 'media')
                                <span class="badge badge-sm bg-gradient-primary">{{ $item->atividade_prioridade }}</span>
                                @else
                                <span class="badge badge-sm bg-gradient-secondary">{{ $item->atividade_prioridade }}</span>
                                @endif
                                @endif
                                @endif

                                @foreach (explode(',', $item->tags_nome) as $info)
                                - <span class="badge bg-gradient-info badge-sm">{{ $info }}</span>
                                @endforeach


                                <a class="text-sm text-secondary d-flex justify-content-end font-weight-bold mb-0 icon-move-right mt-2" href="{{ route('atividade.edit', $item->id) }}">
                                    Editar
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>

                        </div>

                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mt-4 mt-lg-0">
            <div class="card overflow-hidden">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                            <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                        <div class="ms-3">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Atividades</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $count_atividade_abertas }}
                            </h5>
                        </div>
                        <div class="progress-wrapper ms-auto w-25">
                            <div class="progress-info">
                                <div class="progress-percentage">
                                    <span class="text-xs font-weight-bold">60%</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3 p-0">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="100" width="351" style="display: block; box-sizing: border-box; height: 100px; width: 351px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="card overflow-hidden mt-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="d-flex">
                                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                    <i class="ni ni-delivery-fast text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Projects</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        115
                                    </h5>
                                </div>
                            </div>
                            <span class="badge badge-dot d-block text-start pb-0 mt-3">
                                <i class="bg-gradient-info"></i>
                                <span class="text-muted text-xs font-weight-bold">Done</span>
                            </span>
                            <span class="badge badge-dot d-block text-start">
                                <i class="bg-gradient-secondary"></i>
                                <span class="text-muted text-xs font-weight-bold">In progress</span>
                            </span>
                        </div>
                        <div class="col-lg-7 my-auto">
                            <div class="chart ms-auto">
                                <canvas id="chart-bar" class="chart-canvas" height="150" width="176" style="display: block; box-sizing: border-box; height: 150px; width: 176.1px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
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



@endsection