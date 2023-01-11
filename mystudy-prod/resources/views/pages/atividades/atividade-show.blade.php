@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Atividades'])

<div class="container-fluid py-4">
    <div class="d-flex justify-content-center mb-5">
        <div class="col-lg-9 mt-lg-0 mt-4">
            <div class="card mt-4">
                @foreach ($atividadeshow as $item)
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h5>{{ ucwords($item->disciplina_none)  }} -
                                {{ Str::ucfirst($item->assunto_nome)  }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Public Relations
                            </p>
                        </div>
                        <div class="col-md-4 text-end">
                            <span class="badge badge-sm bg-gradient-danger">Prioridade
                                {{ $item->atividade_prioridade }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <p class="text-sm">
                        @foreach (explode(';', $item->atividade_observacao) as $info)
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <i class="fa-solid fa-terminal fa-2xs"></i>
                            {{ ucwords($info)}}
                        </li>
                    </ul>
                    @endforeach
                    </p>
                    <hr class="horizontal gray-light my-4">
                    <p>
                        @foreach (explode(',', $item->tags_nome) as $info)
                        <span class="badge bg-gradient-info text-white badge-sm">{{ $info }}</span>
                        @endforeach
                    </p>
                    <a type="submit" href="{{ URL::previous() }}"
                        class="btn bg-gradient-primary btn-sm float-end mt-6 mb-0">Voltar</a>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>



@endsection