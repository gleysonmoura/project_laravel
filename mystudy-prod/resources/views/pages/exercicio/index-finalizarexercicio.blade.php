@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Questões'])

<div class="container-fluid py-4">

    <div class="row mt-4">

        <form method="POST" action="{{ route('desempenho.finalizarexercicio') }}">
            {{ csrf_field() }}

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
                                    <input type="number" min="0" max="500" oninput="this.value = Math.abs(this.value)"
                                        class="form-control form-control-sm quantidade_questoes"
                                        name="quantidade_questoes">
                                </td>
                                <td>
                                    <input type="number" min="0" max="500" oninput="this.value = Math.abs(this.value)"
                                        class="form-control form-control-sm questoes_certas" name="questoes_certas">
                                </td>
                                <td>
                                    <input type="text" readonly class="form-control form-control-sm questoes_erradas"
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

        </form>

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

@endsection