@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Conteudo'])

<div class="row mt-4 mx-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h6>Disciplinas/Assuntos</h6>
                    <a href="{{ route('conteudo.create') }}" class="btn bg-gradient-primary btn-sm float-end mb-0">Add
                        Tag</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @foreach ($conteudos as $item)
                    {{ $item->disciplina_none }}
                    {{ $item->assunto_nome }}

                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@endsection