@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Atividades'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-body mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h6>Plano de Estudos</h6>
                </div>
                <form method="POST" action="{{ route('planoestudo.store') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Nome do plano</label>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" name="nome_plano" class="form-control" id="nome_plano"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Data</label>
                            <div class="form-group">
                                <input class="form-control" type="date" id="data_plano" name="data_plano">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="status_plano" name="status_plano">
                                <option value="em estudo">Em Andamento</option>
                                <option value="em planejado">Em Planejado</option>
                                <option value="Aguardando">Aguardando</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" name="button" class="btn btn-light m-0">Cancel</button>
                        <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Criar
                            Atividade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection