@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Atividades'])

<div class="container-fluid py-4">
    {{-- DIV ALERT --}}
    <div class="row mt-2 mx-4 col-12">
        @include('alert-notification')
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body p-3 position-relative">
                    <div class="row">
                        <div class="col-7 text-start">
                            <p class="text-sm mb-1 text-uppercase font-weight-bold">Atividades Futuras</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $count_atividade_abertas }}
                            </h5>
                            <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+55% <span
                                    class="font-weight-normal text-secondary">since last month</span></span>
                        </div>
                        <div class="col-5">
                            <div class="dropdown text-end">
                                <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-xs text-secondary"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers1">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a>
                                    </li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-sm-0 mt-4">
            <div class="card">
                <div class="card-body p-3 position-relative">
                    <div class="row">
                        <div class="col-7 text-start">
                            <p class="text-sm mb-1 text-uppercase font-weight-bold">Atrasadas</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $count_atividade_atrasadas }}
                            </h5>
                            <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span
                                    class="font-weight-normal text-secondary">since last month</span></span>
                        </div>
                        <div class="col-5">
                            <div class="dropdown text-end">
                                <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-xs text-secondary"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers2">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a>
                                    </li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-sm-0 mt-4">
            <div class="card">
                <div class="card-body p-3 position-relative">
                    <div class="row">
                        <div class="col-7 text-start">
                            <p class="text-sm mb-1 text-uppercase font-weight-bold"> Total</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $count_atividade }}
                            </h5>
                            <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span
                                    class="font-weight-normal text-secondary">since last month</span></span>
                        </div>
                        <div class="col-5">
                            <div class="dropdown text-end">
                                <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-xs text-secondary"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers2">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a>
                                    </li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <h6 class="mb-0">Atividades</h6>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('atividade.create') }}"
                                    class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Add Atividade</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Atividades</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Data
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Data Final
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Prioridade
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Actions
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atividades as $item)
                                <tr>
                                    <td>
                                        <h6 class="ms-3 text-sm my-auto">
                                            {{ ucwords($item->disciplina_none)  }} -
                                            {{ Str::ucfirst($item->assunto_nome)  }}
                                        </h6>
                                    </td>
                                    <td class="text-sm text-center">
                                        {{ $carbon::parse($item->atividade_data)->format('d/m/Y')  }}
                                    </td>
                                    <td class="text-sm text-center">
                                        {{ $carbon::parse($item->atividade_tempo)->format('d/m/Y')  }}
                                    </td>
                                    <td class="text-sm text-center">
                                        @if ($item->atividade_prioridade == 'altissima')
                                        <span
                                            class="badge badge-sm bg-gradient-danger">{{ $item->atividade_prioridade }}</span>
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

                                    </td>
                                    <td class="text-sm text-center">
                                        @if ($item->atividade_data > date("Y-m-d"))
                                        <span class="badge badge-sm bg-gradient-danger">
                                            {{ $item->atividade_status }}
                                        </span>
                                        @else
                                        @if ($item->atividade_data == date("Y-m-d"))
                                        <span class="badge badge-sm bg-gradient-danger">
                                            {{ $item->atividade_status }}
                                        </span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-danger">
                                            {{ $item->atividade_status }}
                                        </span>
                                        @endif
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        <span class="d-flex">
                                            <a href="{{ route('atividade.showAtividade', $item->id) }}" class="me-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Show item">
                                                <i class="fas fa-eye text-secondary" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('atividade.edit', $item->id) }}" class="me-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit item">
                                                <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('atividade.destroy', $item->id) }}"
                                                class="delete_form" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button data-bs-toggle="tooltip" data-bs-original-title="Delete item"
                                                    class="border-0 bg-default">
                                                    <i class="fas fa-trash text-secondary" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $atividades->links('pages.atividades.paginate')}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')

<script>
    $(document).ready(function(){
    $('.delete_form').on('submit', function(){
    if(confirm("Deseja remover essa atividade?"))
    {
    return true;
    }
    else
    {
    return false;
    }
    });
    });
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