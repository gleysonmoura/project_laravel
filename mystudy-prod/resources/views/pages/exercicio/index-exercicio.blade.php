@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Questões'])

<div class="container-fluid py-4">
    {{-- DIV ALERT --}}
    <div class="row mt-2 mx-4 col-12">
        @include('alert-notification')
    </div>
    {{-- ROW ESTATISTICAS DOS EXERCICIOS --}}
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body p-3 position-relative">
                    <div class="row">
                        <div class="col-7 text-start">
                            <p class="text-sm mb-1 text-uppercase font-weight-bold">Nos últimos 7 dias</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $count_semana_exercicio }}
                            </h5>
                            <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+55% <span
                                    class="font-weight-normal text-secondary">since last month</span></span>
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
                                {{ $count_semana_exercicio_atrasada }}
                            </h5>
                            <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span
                                    class="font-weight-normal text-secondary">since last month</span></span>
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
                                {{ $count_exercicio }}
                            </h5>
                            <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span
                                    class="font-weight-normal text-secondary">since last month</span></span>
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
                        <h6 class="mb-0">Exercícios</h6>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#Modaladdmeta">
                                    Add Exercício
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Atividades</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Data Criação
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantidade
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Desempenho
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
                                @foreach ($exercicios as $exercicio)
                                <tr>
                                    <td>
                                        <h6 class="ms-3 text-sm my-auto">
                                            {{ Str::ucfirst($exercicio->assunto_nome)  }} -
                                            <small>{{ ucwords($exercicio->disciplina_none)  }}</small>
                                        </h6>
                                    </td>
                                    <td class="text-sm text-center">
                                        {{\Carbon\Carbon::parse( $exercicio->created_at)->formatLocalized('%d de %b')}}
                                        {{-- {{ $carbon::parse($exercicio->created_at)->format('d/m/Y')  }}
                                        --}}
                                    </td>
                                    <td class="text-sm text-center">
                                        {{ $exercicio->exer_quantidade }}
                                    </td>

                                    <td class="text-sm text-center">
                                        @forelse($desempenhos as $desempenho)
                                        @if ($desempenho->exer_id === $exercicio->id)
                                        @if ($desempenho->desempenho_porcentagem <= 50) <span
                                            class="text-danger font-weight-bolder">
                                            {{ $desempenho->desempenho_porcentagem }}%</span>
                                            @else
                                            @if (($desempenho->desempenho_porcentagem > 50 ) &&
                                            ($desempenho->desempenho_porcentagem <= 80)) <span
                                                class="text-warning font-weight-bolder">
                                                {{ $desempenho->desempenho_porcentagem }}%</span>
                                                @else
                                                <span class="text-success font-weight-bolder">
                                                    {{ $desempenho->desempenho_porcentagem }}%
                                                </span>
                                                @endif
                                                @endif

                                                @else

                                                @endif
                                                {{-- --}}
                                                @empty
                                                0
                                                @endforelse
                                    </td>
                                    <td class="text-sm text-center">
                                        @if ($exercicio->exer_status == 'em andamento')
                                        <span class="badge badge-sm bg-gradient-danger">
                                            {{ $exercicio->exer_status }}
                                        </span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-primary">
                                            {{ $exercicio->exer_status }}
                                        </span>
                                        @endif
                                    </td>
                                    <td class="text-sm">
                                        <span class="d-flex">
                                            @if ($exercicio->exer_status == 'finalizada')
                                            <a type="button" class="me-3" style="pointer-events: none;"
                                                data-bs-toggle="modal" data-bs-target="#Modaldesempenho"
                                                data-bs-original-title="Finalizar meta" disabled>
                                                <i class="fa-solid fa-right-from-bracket text-secondary"></i>
                                            </a>
                                            @else
                                            <a href="{{ route('exercicio.show', $exercicio->id) }}" class="me-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit item">
                                                <i class="fa-solid fa-right-from-bracket text-secondary"></i>
                                            </a>
                                            {{-- <a type="button" class="me-3" data-bs-toggle="modal"
                                                data-bs-target="#Modaldesempenho" href="#"
                                                data-bs-original-title="Finalizar meta">
                                                <i class="fa-solid fa-right-from-bracket text-secondary"></i>
                                            </a> --}}
                                            @endif

                                            {{-- <a href="{{ route('atividade.edit', $exercicio->id) }}" class="me-3"
                                            data-bs-toggle="tooltip" data-bs-original-title="Edit item">
                                            <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                            </a> --}}
                                            {{-- <form action="{{ route('atividade.destroy', $exercicio->id) }}"
                                            class="delete_form" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button data-bs-toggle="tooltip" data-bs-original-title="Delete item"
                                                class="border-0 bg-default">
                                                <i class="fas fa-trash text-secondary" aria-hidden="true"></i>
                                            </button>
                                            </form> --}}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $exercicios->links('pages.atividades.paginate')}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.exercicio.modal-create-exercicio-atividade')
@include('pages.desempenhos.modal-desempenhoexercicio')
@include('pages.desempenhos.modal-desempenho')
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