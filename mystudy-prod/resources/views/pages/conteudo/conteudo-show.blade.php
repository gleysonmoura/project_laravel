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

                    @foreach ($disciplinas as $key => $disciplina)
                    <ul>
                        {{ $disciplina->disciplina_none}}
                        @foreach ($conteudos as $assunto)
                        @if ($disciplina->id == $assunto->disciplina_id)
                        <li>{{ $assunto->assunto_nome }}</li>
                        @endif

                        @endforeach
                    </ul>



                    @endforeach



                </div>
            </div>
        </div>
    </div>

</div>

@endsection