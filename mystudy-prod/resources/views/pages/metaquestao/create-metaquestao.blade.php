@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Questões'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-body mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h6>Meta de Questões</h6>
                </div>
                <form method="POST" action="{{ route('atividade.store') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Disciplinas</label>
                            <div class="form-group">
                             
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Assuntos</label>
                            <select style="text-ucfirst" class="text-ucfirst form-control campo_assunto"
                                value="{{old('campo_assunto')}}" name="campo_assunto" id="campo_assunto">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label class="form-label">Data</label>
                            <div class="form-group">
                                <input class="form-control" type="date" id="data_atividade" name="data_atividade">
                            </div>
                        </div>
                        <div class="col-3">
                            <label class="form-label">Tempo</label>
                            <select class="form-control" id="tempo_atividade" name="tempo_atividade">
                                <option value="1">1 dia</option>
                                <option value="3">3 dias</option>
                                <option value="5">5 dias</option>
                                <option value="7">7 dias</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label class="form-label">Prioridade</label>
                            <select class="form-control" id="prioridade_atividade" name="prioridade_atividade">
                                <option value="baixa">Baixa</option>
                                <option value="média">Média</option>
                                <option value="alta">Alta</option>
                                <option value="altissima">Altissima</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="status_atividade" name="status_atividade">
                                <option value="em estudo">Em estudo</option>
                                <option value="planejado">Planejado</option>
                                <option value="para estudar">Para estudar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Observação</label>
                        <textarea class="form-control" id="observacao_atividade" name="observacao_atividade"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Tags</label>
                        <select name="tags[]" class="form-select text-sm" id="multiple-select-field"
                            data-placeholder="Tags" multiple="multiple">
                            <option>Realizar a leitura do PDF</option>
                            <option>Elaborar um resumo</option>
                            <option>Realizar resolução de questões</option>
                        </select>
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