@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Atividades'])

<div class="row mt-4 mx-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card card-body mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h6>Atividades</h6>
                </div>
                <form method="POST" action="{{ route('atividade.update', $atividades_edit->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        @foreach ($assunto as $item)
                        <div class="col-6">
                            <label class="form-label">Disciplinas</label>
                            <div class="form-group">
                                <input type="text" placeholder="{{ucfirst($item->disciplina_none)}}"
                                    class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Assuntos</label>
                                <input type="text" style="text-ucfirst" placeholder="{{ucfirst($item->assunto_nome)}}"
                                    class="text-ucfirst form-control campo_assunto" name="campo_assunto"
                                    id="campo_assunto" disabled />
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Data</label>
                            <div class="form-group">
                                <input class="form-control" type="date" value="{{ $atividades_edit->atividade_data}}"
                                    id="data_atividade" name="data_atividade">
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Prioridade</label>
                            <select class="form-control" id="prioridade_atividade" name="prioridade_atividade">
                                <option value="{{$atividades_edit->atividade_prioridade}}">
                                    {{$atividades_edit->atividade_prioridade}}
                                </option>
                                <option value="baixa">Baixa</option>
                                <option value="média">Média</option>
                                <option value="alta">Alta</option>
                                <option value="altissima">Altissima</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="status_atividade" name="status_atividade">
                                <option value="{{ $atividades_edit->atividade_status}}">
                                    {{ $atividades_edit->atividade_status}}
                                </option>
                                <option value="em estudo">Em estudo</option>
                                <option value="planejado">Planejado</option>
                                <option value="para estudar">Para estudar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Observação</label>
                        <textarea class="form-control" id="observacao_atividade" placeholder=""
                            name="observacao_atividade" rows="3">{{ $atividades_edit->atividade_observacao }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Tags</label>
                        <select name="tags[]" class="form-select form-select-sm" id="multiple-select-field"
                            data-placeholder="Selecione Tag(s)" multiple="multiple">
                            <option value="fazer questões">Fazer Questões</option>
                            <option value="revisar">Revisar</option>
                            <option value="fazer resumo">Fazer Resumo</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" name="button" class="btn btn-light m-0">Cancel</button>
                        <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Editar
                            Atividade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
    
                $(document).on('change', '.nome_disciplina', function() {
                     //console.log("hmm its change");
    
                    var cat_id = $(this).val();
                    // console.log(cat_id);
                    var div = $(this).parent();
                    var op = " ";
    
                    $.ajax({
                        type: 'get',
                        url: '{!!URL::to("atividade/show")!!}',
                        data: {
                            'id': cat_id
                        },
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                $("#campo_assunto").empty();
                                $.each(data, function(key, value) {
                                    $("#campo_assunto").append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        }
                    });
                });
            });
            $( '#multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
            } );
    </script>
</div>
@endsection