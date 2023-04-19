@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Anotações'])

<div class="container-fluid py-4">
    {{-- DIV ALERT --}}
    <div class="row mt-2 mx-4 col-12">
        @include('alert-notification')
    </div>


    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Anotações</h5>
                    <a href="https://argon-dashboard-pro-laravel.creative-tim.com/category-management/new"
                        class="btn bg-gradient-dark btn-sm float-end mb-0">Add Category</a>
                </div>
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
                            <div class="dataTable-search">
                                <form action="{{ route('anotacao.index') }}" method="get">
                                    <input class="dataTable-input" type="text" name="search" placeholder="Pesquisar...">
                                </form>
                            </div>
                        </div>
                        <div class="dataTable-container" style="height: 178.641px;">
                            <table class="table table-flush dataTable-table" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            data-sortable=""><a href="#" class="dataTable-sorter">
                                                Assunto
                                            </a></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            data-sortable=""><a href="#" class="dataTable-sorter">
                                                Titulo
                                            </a></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            data-sortable="" style="width: 26.3103%;"><a href="#"
                                                class="dataTable-sorter">
                                                Descrição
                                            </a></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            data-sortable="false" style="width: 15.3392%;">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notas as $nota)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $nota->assunto_nome }}</td>
                                        <td class="text-sm font-weight-normal">{{ $nota->titulo_anotacao }}</td>
                                        <td class="text-sm font-weight-normal">
                                            {{ Str::substr($nota->texto_anotacao, 0, 20)  }}
                                        </td>
                                        <td class="text-sm">
                                            <span class="d-flex">
                                                <a href="{{ route('anotacao.show', $nota->id) }}" class="me-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Show item">
                                                    <i class="fas fa-eye text-secondary" aria-hidden="true"></i>
                                                </a>
                                                <a href="https://argon-dashboard-pro-laravel.creative-tim.com/category-management/edit/1"
                                                    class="me-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit category">
                                                    <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                                </a>
                                                <form
                                                    action="https://argon-dashboard-pro-laravel.creative-tim.com/category-delete/1"
                                                    method="post">
                                                    <input type="hidden" name="_token"
                                                        value="yjUDaMuhN6fGwB01NuR4qnUwsX3pL9fjj03hGHV3"> <button
                                                        onclick="confirm('Are you sure you want to remove the category?') || event.stopImmediatePropagation()"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="Delete category"
                                                        class="border-0 bg-white">
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



    <ul>

    </ul>

</div>

@endsection