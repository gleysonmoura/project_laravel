@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Anotações'])

<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                @foreach ( $anotacao as $anotacao)
                <div class="card-header p-3 pb-0">
                    <h6 class="mb-1">
                        {{ $anotacao->assunto_nome }}
                    </h6>
                    <p class="text-sm mb-0">
                        {{ $anotacao->titulo_anotacao }}
                    </p>
                </div>
                <div class="card-body p-3">
                    <ul class="text-muted ps-4 mb-0">
                        <li>
                            <span class="text-sm">{{ $anotacao->texto_anotacao }}</span>
                        </li>

                    </ul>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection