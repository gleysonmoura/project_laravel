<div class="modal fade" id="Modaladdmeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-default" id="exampleModalLabel">Add Exercícios</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="{{ route('exercicio.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Disciplinas</label>
                                <div class="form-group">
                                    <select name="nome_disciplina" class="form-control nome_disciplina"
                                        value="{{old('nome_disciplina')}}">
                                        <option value="" hidden>Selecione uma disciplina</option>
                                        @foreach ( $lista_disciplina as $assunto)
                                        <option value="{{$assunto->id}}">{{ucfirst($assunto->disciplina_none)}}</option>
                                        @endforeach
                                    </select>
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
                            <div class="col-6">
                                <label class="form-label">Data</label>
                                <div class="form-group">
                                    <input class="form-control" type="date" id="data_atividade" name="data_atividade">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Quantidade de Questões</label>
                            <input class="form-control" type="number" id="quantidade_meta" name="quantidade_meta">
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm bg-gradient-secondary" data-bs-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-sm bg-gradient-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
                    $(document).on('change', '.nome_disciplina', function() {
                        var cat_id = $(this).val();
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