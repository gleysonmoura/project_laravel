@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Conteudo'])

<div class="container-fluid py-4">
    <div class="row mb-5">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0">Novo Assunto</h6>
                <hr class="horizontal dark my-3">
                <form method="POST" action="{{ route('conteudo.store') }}">
                    {{ csrf_field() }}
                    <label class="mt-4"> Disciplina</label>
                    <div class="form-group">
                        @foreach ($disciplina as $item)
                        <select class="form-control" id="exampleFormControlSelect1" name="nome_disciplina">
                            <option value="{{ $item->id }}">{{ $item->disciplina_none }}</option>
                        </select>
                        @endforeach
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="name" class="form-label">Assunto</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" name="nome_assunto" value=""
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Prioridade</label>
                            <div class="form-group">
                                <select class="form-control" id="prioridade_assunto" name="prioridade_assunto">
                                    <option value="Baixa">Baixa</option>
                                    <option value="Média">Média</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Altissima">Altissima</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection