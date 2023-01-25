<div class="modal fade" id="Modaldesempenho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-default" id="exampleModalLabel">Meta questões</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="{{ route('desempenho.finalizarexercicio', $item->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <p class="text-sm font-weight-bold text-secondary mb-0"> Meta de Questões
                                <span class="text-success">{{ $item->exer_quantidade }}</span>
                            </p>
                            <p>
                                {{ $item->id }}
                            </p>
                            <span class="mb-0 font-weight-bold text-sm">
                                <h6 class="text-danger"></h6>
                            </span>
                            <input style="display:none;" type="text" value="{{$item->id}}" name="id_meta"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            quantidade</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            certas</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            erradas</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            desempenho</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="number" min="0" max="500"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    class="form-control form-control-sm quantidade_questoes"
                                                    name="quantidade_questoes">
                                            </td>
                                            <td>
                                                <input type="number" min="0" max="500"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    class="form-control form-control-sm questoes_certas"
                                                    name="questoes_certas">
                                            </td>
                                            <td>
                                                <input type="text" readonly
                                                    class="form-control form-control-sm questoes_erradas"
                                                    name="questoes_erradas">
                                            </td>
                                            <td>
                                                <input type="text" readonly
                                                    class="form-control form-control-sm desempenho" name="desempenho">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm bg-gradient-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('tbody').delegate('.quantidade_questoes, .questoes_certas', 'keyup', function() {
    var tr = $(this).parent().parent();
    var qq = tr.find('.quantidade_questoes').val();
    var qc = tr.find('.questoes_certas').val();
    var qe = (qq - qc);
    var de = ((qc / qq) * 100.00);
    /* var sinal = "%"; */
    tr.find('.desempenho').val(de + " " /* + sinal */);
    tr.find('.questoes_erradas').val(qe);
    });
</script>