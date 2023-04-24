@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])

<div class="container-fluid my-5 py-2">
    <div class="row mt-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Atividades</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    @foreach ( $dados_assunto as $dado_assunto)
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 border-radius-lg bg-gray-600">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">{{ $dado_assunto->assunto_nome }}</h6>
                                <span class="mb-2 text-xs">Data: <span
                                        class="font-weight-bold ms-sm-2 text-white">{{ $dado_assunto->atividade_data }}
                                        - {{ $dado_assunto->atividade_tempo }}</span></span>
                                <span class="mb-2 text-xs">Status: <span
                                        class="ms-sm-2 font-weight-bold text-white">{{ $dado_assunto->atividade_status }}</span></span>
                                <span class="text-xs">TAGS: <span
                                        class="ms-sm-2 font-weight-bold text-white">{{ $dado_assunto->atividade_tags }}</span></span>
                            </div>
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                        class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                                <a class="btn btn-link px-3 mb-0 text-white" href="javascript:;"><i
                                        class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                            </div>
                        </li>
                    </ul>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-md-5 mt-md-0 mt-4">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Your Transaction's</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2" aria-hidden="true"></i>
                            <small>23 - 30 March 2020</small>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-down" aria-hidden="true"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                                    <span class="text-xs">27 March 2020, at 12:30 PM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                - $ 2,500
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-up" aria-hidden="true"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                    <span class="text-xs">27 March 2020, at 04:30 AM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                + $ 2,000
                            </div>
                        </li>
                    </ul>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-up" aria-hidden="true"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                                    <span class="text-xs">26 March 2020, at 13:45 PM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                + $ 750
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-up" aria-hidden="true"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                                    <span class="text-xs">26 March 2020, at 12:30 PM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                + $ 1,000
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-arrow-up" aria-hidden="true"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                                    <span class="text-xs">26 March 2020, at 08:30 AM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                + $ 2,500
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button
                                    class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                        class="fas fa-exclamation" aria-hidden="true"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                                    <span class="text-xs">26 March 2020, at 05:00 AM</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                                Pending
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection