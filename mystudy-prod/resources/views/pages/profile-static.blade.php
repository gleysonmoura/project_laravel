@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Profile'])

<div class="container-fluid py-4">
    <div class="row">
        <ul class="list-group">
            <li class="list-group-item"><b>Alterar index da page atividade.</b>
                <br /> - mostrar as atividades em tabela
                <br> - incluir opção de delete e edtitar
            </li>
            <li class="list-group-item">pegar o codigo timeline e incluir na index dashboard</li>
            <li class="list-group-item"><b>Tag Revisão</b>
                <br /> - criar crud para revisão
            </li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
    @include('layouts.footers.auth.footer')
</div>
@endsection