@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Anotações'])

<div class="container-fluid py-4">
    {{-- DIV ALERT --}}
    <div class="row mt-2 mx-4 col-12">
        @include('alert-notification')
    </div>

    <form action="{{ route('anotacao.index') }}" method="get">
        <input type="text" name="search" placeholder="pesquisar">
        <button>Pesquisar</button>
    </form>

    <ul>
        @foreach ($notas as $item)
        <li>
            {{ $item->assunto_nome }}
            {{ $item->titulo_anotacao }}
            {{ $item->texto_anotacao }}
        </li>

        @endforeach
    </ul>

</div>

@endsection