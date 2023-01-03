@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Atividades'])

<div class="row mt-4 mx-4">
    <div class="row mt-4">
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
    </div>

</div>
<div class="row mt-4 mx-4">
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Timeline with dotted line</h6>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side" data-timeline-axis-style="dotted">

                    <div class="timeline-block mb-3">
                        @foreach ($atividades as $item)
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
                                {{ $carbon::parse(now())->format('d/m/Y') }}
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
                        </div>
                        @endforeach
                    </div>


                    {{-- <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="ni ni-bell-55 text-success text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                            <span class="badge badge-sm bg-gradient-success">Design</span>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="ni ni-html5 text-danger text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                            <span class="badge badge-sm bg-gradient-danger">Order</span>
                            <span class="badge badge-sm bg-gradient-danger">#1832412</span>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="ni ni-cart text-info text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                            <span class="badge badge-sm bg-gradient-info">Server</span>
                            <span class="badge badge-sm bg-gradient-info">Payments</span>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="ni ni-credit-card text-warning text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                            <span class="badge badge-sm bg-gradient-warning">Card</span>
                            <span class="badge badge-sm bg-gradient-warning">#4395133</span>
                            <span class="badge badge-sm bg-gradient-warning">Priority</span>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step">
                            <i class="ni ni-key-25 text-primary text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                            <span class="badge badge-sm bg-gradient-primary">Development</span>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <span class="timeline-step">
                            <i class="ni ni-archive-2 text-success text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New message unread</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">16 DEC</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                            <span class="badge badge-sm bg-gradient-success">Message</span>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <span class="timeline-step">
                            <i class="ni ni-check-bold text-info text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Notifications unread</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">15 DEC</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <span class="timeline-step">
                            <i class="ni ni-box-2 text-warning text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New request</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">14 DEC</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                            <span class="badge badge-sm bg-gradient-warning">Request</span>
                            <span class="badge badge-sm bg-gradient-warning">Priority</span>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <span class="timeline-step">
                            <i class="ni ni-controller text-dark text-gradient"></i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Controller issues</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">13 DEC</p>
                            <p class="text-sm mt-3 mb-2">
                                People care about how you see the world, how you think, what motivates you, what you’re
                                struggling with or afraid of.
                            </p>
                            <span class="badge badge-sm bg-gradient-dark">Controller</span>
                        </div>
                    </div> --}}
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
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Tasks</p>
                        <h5 class="font-weight-bolder mb-0">
                            480
                        </h5>
                    </div>
                    <div class="progress-wrapper ms-auto w-25">
                        <div class="progress-info">
                            <div class="progress-percentage">
                                <span class="text-xs font-weight-bold">60%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body mt-3 p-0">
                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="100" width="351"
                        style="display: block; box-sizing: border-box; height: 100px; width: 351px;"></canvas>
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
                            <canvas id="chart-bar" class="chart-canvas" height="150" width="176"
                                style="display: block; box-sizing: border-box; height: 150px; width: 176.1px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection