@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Exercício'])

<div class="container-fluid py-4">

    <div class="row mt-4">
        <div class="card">
            <div class="card-body p-3 position-relative">
                <div class="d-lg-flex">
                    <h6 class="mb-0">Finalizar Exercício</h6>
                </div>
            </div>
            <form method="POST" action="{{ route('desempenho.finalizarexercicio', $dados_exercicios->id) }}">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="form-group">
                    {{ $dados_exercicios->id }}
                    {{ $dados_exercicios->exer_quantidade }}
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
                                        <input type="number" min="0" max="{{ $dados_exercicios->exer_quantidade }}"
                                            oninput="this.value = Math.abs(this.value)"
                                            class="form-control form-control-sm quantidade_questoes"
                                            name="quantidade_questoes">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="500"
                                            oninput="this.value = Math.abs(this.value)"
                                            class="form-control form-control-sm questoes_certas" name="questoes_certas">
                                    </td>
                                    <td>
                                        <input type="text" readonly
                                            class="form-control form-control-sm questoes_erradas"
                                            name="questoes_erradas">
                                    </td>
                                    <td>
                                        <input type="text" readonly class="form-control form-control-sm desempenho"
                                            name="desempenho">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm bg-gradient-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>



    </div>
</div>
<script type="text/javascript">
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

@endsection